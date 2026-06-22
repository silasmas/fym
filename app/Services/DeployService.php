<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

/**
 * Exécute les tâches de déploiement et d'initialisation de l'application.
 */
class DeployService
{
  /**
   * Exécute les tâches sélectionnées et retourne un journal d'exécution.
   *
   * @param array<string, bool> $tasks Tâches activées (migrations, storage_link, etc.)
   * @param array<int, string> $seeders Clés des seeders à exécuter
   * @return array<int, array{task: string, status: string, message: string}> Journal d'exécution
   */
  public function run(array $tasks, array $seeders = []): array
  {
    $log = [];

    if (! empty($tasks['migrations'])) {
      $log[] = $this->runTask('migrations', function (): string {
        Artisan::call('migrate', ['--force' => true]);

        return trim(Artisan::output()) ?: 'Migrations exécutées avec succès.';
      });
    }

    if (! empty($tasks['storage_link'])) {
      $log[] = $this->runTask('storage_link', function (): string {
        Artisan::call('storage:link');

        return trim(Artisan::output()) ?: 'Lien storage créé.';
      });
    }

    foreach ($seeders as $seederKey) {
      $log[] = $this->runSeeder($seederKey);
    }

    if (! empty($tasks['shield_permissions'])) {
      $log[] = $this->runTask('shield_permissions', function (): string {
        Artisan::call('shield:generate', [
          '--all' => true,
          '--panel' => 'admin',
          '--ignore-existing-policies' => true,
          '--no-interaction' => true,
        ]);

        return trim(Artisan::output()) ?: 'Permissions Shield générées.';
      });
    }

    if (! empty($tasks['super_admin'])) {
      $log[] = $this->runTask('super_admin', function (): string {
        return $this->assignSuperAdmin();
      });
    }

    return $log;
  }

  /**
   * Exécute un seeder enregistré dans la configuration.
   *
   * @param string $seederKey Clé du seeder dans config/deploy.php
   * @return array{task: string, status: string, message: string} Résultat de l'exécution
   */
  protected function runSeeder(string $seederKey): array
  {
    $seeders = config('deploy.seeders', []);
    $class = $seeders[$seederKey] ?? null;

    if (! $class || ! class_exists($class)) {
      return [
        'task' => "seeder:{$seederKey}",
        'status' => 'error',
        'message' => "Seeder inconnu : {$seederKey}",
      ];
    }

    return $this->runTask("seeder:{$seederKey}", function () use ($class): string {
      Artisan::call('db:seed', [
        '--class' => $class,
        '--force' => true,
      ]);

      return trim(Artisan::output()) ?: "Seeder {$class} exécuté.";
    });
  }

  /**
   * Attribue le rôle super_admin au compte administrateur configuré.
   *
   * @return string Message de confirmation
   */
  protected function assignSuperAdmin(): string
  {
    $email = config('deploy.admin_email');
    $user = User::query()->where('email', $email)->first();

    if (! $user) {
      throw new \RuntimeException("Aucun utilisateur trouvé avec l'e-mail : {$email}. Exécutez d'abord le seeder admin.");
    }

    Artisan::call('shield:super-admin', [
      '--user' => $user->id,
      '--no-interaction' => true,
    ]);

    return "Rôle super_admin attribué à {$user->email}.";
  }

  /**
   * Exécute une tâche et capture les erreurs éventuelles.
   *
   * @param string $name Nom de la tâche
   * @param callable $callback Fonction à exécuter
   * @return array{task: string, status: string, message: string} Résultat
   */
  protected function runTask(string $name, callable $callback): array
  {
    try {
      $message = $callback();

      Log::info("Deploy task [{$name}] succeeded.");

      return [
        'task' => $name,
        'status' => 'success',
        'message' => $message,
      ];
    } catch (\Throwable $exception) {
      Log::error("Deploy task [{$name}] failed.", ['error' => $exception->getMessage()]);

      return [
        'task' => $name,
        'status' => 'error',
        'message' => $exception->getMessage(),
      ];
    }
  }
}
