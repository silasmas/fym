<?php

namespace App\Filament\Pages;

use App\Services\DeployService;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

/**
 * Page Filament permettant d'exécuter les tâches de déploiement depuis le dashboard.
 */
class DeployTools extends Page implements HasForms
{
  use InteractsWithForms;

  protected static ?string $navigationIcon = 'heroicon-o-server-stack';

  protected static ?string $navigationGroup = 'Système';

  protected static ?int $navigationSort = 99;

  protected static ?string $navigationLabel = 'Déploiement';

  protected static ?string $title = 'Outils de déploiement';

  protected static string $view = 'filament.pages.deploy-tools';

  public ?array $data = [];

  public array $executionLog = [];

  /**
   * Restreint l'accès aux super administrateurs.
   *
   * @return bool True si l'utilisateur est super_admin
   */
  public static function canAccess(): bool
  {
    return auth()->user()?->hasRole('super_admin') ?? false;
  }

  /**
   * Initialise le formulaire avec les valeurs par défaut.
   *
   * @return void
   */
  public function mount(): void
  {
    $this->form->fill([
      'migrations' => false,
      'storage_link' => false,
      'shield_permissions' => false,
      'super_admin' => false,
      'seeders' => [],
    ]);
  }

  /**
   * Définit le formulaire de sélection des tâches.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public function form(Form $form): Form
  {
    $seederOptions = collect(config('deploy.seeders', []))
      ->mapWithKeys(fn (string $class, string $key): array => [
        $key => match ($key) {
          'settings' => 'Paramètres du site (SettingSeeder)',
          'admin' => 'Compte administrateur (AdminSeeder)',
          default => $key,
        },
      ])
      ->toArray();

    return $form
      ->schema([
        Forms\Components\Section::make('Tâches système')
          ->description('Sélectionnez les opérations à exécuter sur le serveur.')
          ->schema([
            Forms\Components\Checkbox::make('migrations')
              ->label('Exécuter les migrations'),
            Forms\Components\Checkbox::make('storage_link')
              ->label('Créer le lien symbolique storage'),
            Forms\Components\Checkbox::make('shield_permissions')
              ->label('Générer les permissions Shield'),
            Forms\Components\Checkbox::make('super_admin')
              ->label('Attribuer le rôle super_admin'),
          ])
          ->columns(2),
        Forms\Components\Section::make('Seeders')
          ->schema([
            Forms\Components\CheckboxList::make('seeders')
              ->label('Seeders à exécuter')
              ->options($seederOptions)
              ->columns(1),
          ]),
      ])
      ->statePath('data');
  }

  /**
   * Exécute les tâches sélectionnées via le service de déploiement.
   *
   * @param DeployService $deployService Service d'exécution
   * @return void
   */
  public function execute(DeployService $deployService): void
  {
    $data = $this->form->getState();

    $tasks = [
      'migrations' => (bool) ($data['migrations'] ?? false),
      'storage_link' => (bool) ($data['storage_link'] ?? false),
      'shield_permissions' => (bool) ($data['shield_permissions'] ?? false),
      'super_admin' => (bool) ($data['super_admin'] ?? false),
    ];

    $seeders = $data['seeders'] ?? [];

    if (! collect($tasks)->contains(true) && empty($seeders)) {
      Notification::make()
        ->title('Aucune tâche sélectionnée')
        ->warning()
        ->send();

      return;
    }

    $this->executionLog = $deployService->run($tasks, $seeders);

    $hasError = collect($this->executionLog)->contains(
      fn (array $entry): bool => $entry['status'] === 'error'
    );

    $notification = Notification::make()
      ->title($hasError ? 'Exécution terminée avec des erreurs' : 'Exécution réussie');

    if ($hasError) {
      $notification->danger();
    } else {
      $notification->success();
    }

    $notification->send();
  }
}
