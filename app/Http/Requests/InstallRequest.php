<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Valide le formulaire de l'assistant d'installation.
 */
class InstallRequest extends FormRequest
{
  /**
   * Vérifie que le secret de déploiement est correct.
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
   * Retourne les règles de validation du formulaire.
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
   * Retourne les tâches système sélectionnées.
   *
   * @return array<string, bool> Tâches activées
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

  /**
   * Message affiché en cas de secret invalide.
   *
   * @return void
   */
  protected function failedAuthorization(): void
  {
    abort(403, 'Clé DEPLOY_SECRET invalide.');
  }
}
