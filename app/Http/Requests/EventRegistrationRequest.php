<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Valide les données d'inscription à un événement public.
 */
class EventRegistrationRequest extends FormRequest
{
  /**
   * Détermine si l'utilisateur est autorisé à faire cette requête.
   *
   * @return bool Toujours true pour le formulaire public
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Retourne les règles de validation du formulaire.
   *
   * @return array<string, mixed> Règles de validation Laravel
   */
  public function rules(): array
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255'],
      'phone' => ['nullable', 'string', 'max:255'],
      'message' => ['nullable', 'string', 'max:2000'],
    ];
  }

  /**
   * Retourne les messages d'erreur en français.
   *
   * @return array<string, string> Messages personnalisés
   */
  public function messages(): array
  {
    return [
      'name.required' => 'Veuillez entrer votre nom.',
      'email.required' => 'Veuillez entrer votre adresse e-mail.',
      'email.email' => 'L\'adresse e-mail n\'est pas valide.',
    ];
  }
}
