<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valide les requêtes d'initialisation distante via DEPLOY_SECRET.
 */
class DeployInitRequest extends FormRequest
{
  /**
   * Détermine si la requête est autorisée (secret valide).
   *
   * @return bool True si le secret correspond
   */
  public function authorize(): bool
  {
    $configuredSecret = config('deploy.secret');

    if (empty($configuredSecret)) {
      return false;
    }

    return hash_equals($configuredSecret, (string) $this->input('secret'));
  }

  /**
   * Retourne les règles de validation.
   *
   * @return array<string, mixed> Règles de validation
   */
  public function rules(): array
  {
    $seederKeys = array_keys(config('deploy.seeders', []));

    return [
      'secret' => ['required', 'string'],
      'migrations' => ['sometimes', 'boolean'],
      'storage_link' => ['sometimes', 'boolean'],
      'shield_permissions' => ['sometimes', 'boolean'],
      'super_admin' => ['sometimes', 'boolean'],
      'seeders' => ['sometimes', 'array'],
      'seeders.*' => ['string', Rule::in($seederKeys)],
    ];
  }

  /**
   * Retourne les tâches activées sous forme de tableau associatif.
   *
   * @return array<string, bool> Tâches sélectionnées
   */
  public function selectedTasks(): array
  {
    return [
      'migrations' => (bool) $this->boolean('migrations'),
      'storage_link' => (bool) $this->boolean('storage_link'),
      'shield_permissions' => (bool) $this->boolean('shield_permissions'),
      'super_admin' => (bool) $this->boolean('super_admin'),
    ];
  }
}
