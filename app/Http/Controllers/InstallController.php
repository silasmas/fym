<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Services\DeployService;
use App\Support\Installation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Assistant d'installation affiché avant le lancement du site en production.
 */
class InstallController extends Controller
{
  /**
   * Affiche la page d'installation avec les options disponibles.
   *
   * @return View Vue de l'assistant d'installation
   */
  public function index(): View
  {
    $seederOptions = collect(config('deploy.seeders', []))
      ->mapWithKeys(fn (string $class, string $key): array => [
        $key => match ($key) {
          'settings' => 'Paramètres du site',
          'admin' => 'Compte administrateur',
          default => $key,
        },
      ])
      ->toArray();

    return view('install.index', [
      'tasks' => config('deploy.tasks', []),
      'seeders' => $seederOptions,
      'hasSecret' => ! empty(config('deploy.secret')),
    ]);
  }

  /**
   * Exécute les tâches sélectionnées et lance le site si tout réussit.
   *
   * @param InstallRequest $request Requête validée
   * @param DeployService $deployService Service d'exécution
   * @return RedirectResponse Redirection avec résultat
   */
  public function store(InstallRequest $request, DeployService $deployService): RedirectResponse
  {
    if (empty(config('deploy.secret'))) {
      return back()->with('error', 'DEPLOY_SECRET n\'est pas configuré dans le fichier .env du serveur.');
    }

    $tasks = $request->selectedTasks();
    $seeders = $request->input('seeders', []);

    if (! collect($tasks)->contains(true) && empty($seeders)) {
      return back()->with('error', 'Sélectionnez au moins une tâche à exécuter.');
    }

    $log = $deployService->run($tasks, $seeders);

    $hasError = collect($log)->contains(
      fn (array $entry): bool => $entry['status'] === 'error'
    );

    if ($hasError) {
      return back()
        ->withInput($request->except('secret'))
        ->with('log', $log)
        ->with('error', 'Certaines tâches ont échoué. Corrigez les erreurs puis réessayez.');
    }

    Installation::markAsInstalled();

    return redirect()
      ->route('filament.admin.auth.login')
      ->with('status', 'Installation terminée avec succès. Connectez-vous avec vos identifiants administrateur.');
  }
}
