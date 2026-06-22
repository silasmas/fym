<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeployInitRequest;
use App\Services\DeployService;
use Illuminate\Http\JsonResponse;

/**
 * Contrôleur d'initialisation distante sécurisée par DEPLOY_SECRET.
 */
class DeployController extends Controller
{
  /**
   * Exécute les tâches de déploiement sélectionnées.
   *
   * @param DeployInitRequest $request Requête validée avec secret
   * @param DeployService $deployService Service d'exécution des tâches
   * @return JsonResponse Résultat JSON avec journal d'exécution
   */
  public function init(DeployInitRequest $request, DeployService $deployService): JsonResponse
  {
    if (empty(config('deploy.secret'))) {
      return response()->json([
        'success' => false,
        'message' => 'DEPLOY_SECRET n\'est pas configuré sur le serveur.',
      ], 503);
    }

    $log = $deployService->run(
      $request->selectedTasks(),
      $request->input('seeders', [])
    );

    $hasError = collect($log)->contains(fn (array $entry): bool => $entry['status'] === 'error');

    return response()->json([
      'success' => ! $hasError,
      'message' => $hasError
        ? 'Certaines tâches ont échoué. Consultez le journal.'
        : 'Déploiement exécuté avec succès.',
      'log' => $log,
    ], $hasError ? 422 : 200);
  }
}
