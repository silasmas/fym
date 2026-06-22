<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Partner;
use App\Support\Seo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Contrôleur du formulaire de contact public.
 */
class ContactController extends Controller
{
  /**
   * Affiche la page de contact.
   *
   * @return View Vue de la page contact
   */
  public function index(): View
  {
    return view('pages.contact', [
      'partners' => Partner::query()->ordered()->get(),
      'pageTitle' => 'Contact',
      'seo' => Seo::make('Contact', 'Contactez la Fondation Yves Milan pour toute question ou collaboration.'),
    ]);
  }

  /**
   * Enregistre un message de contact soumis depuis le site.
   *
   * @param ContactRequest $request Données validées du formulaire
   * @return RedirectResponse Redirection avec message flash
   */
  public function store(ContactRequest $request): RedirectResponse
  {
    Contact::query()->create($request->validated());

    return back()->with('success', 'Votre message a bien été envoyé. Nous vous répondrons dans les plus brefs délais.');
  }
}
