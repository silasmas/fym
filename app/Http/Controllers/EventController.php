<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRegistrationRequest;
use App\Models\Event;
use App\Support\MediaUrl;
use App\Support\Seo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Contrôleur des événements publics et des inscriptions.
 */
class EventController extends Controller
{
  /**
   * Liste les événements publiés à venir ou en cours.
   *
   * @return View Vue de la liste des événements
   */
  public function index(): View
  {
    $events = Event::query()
      ->published()
      ->orderByDesc('start_at')
      ->paginate(9);

    return view('pages.events.index', [
      'events' => $events,
      'pageTitle' => 'Événements',
      'seo' => Seo::make(
        'Événements',
        'Découvrez les événements et activités organisés par la Fondation Yves Milan.'
      ),
    ]);
  }

  /**
   * Affiche le détail d'un événement et le formulaire d'inscription.
   *
   * @param string $slug Slug unique de l'événement
   * @return View Vue de détail de l'événement
   */
  public function show(string $slug): View
  {
    $event = Event::query()
      ->published()
      ->where('slug', $slug)
      ->firstOrFail();

    return view('pages.events.show', [
      'event' => $event,
      'pageTitle' => $event->title,
      'seo' => Seo::make(
        $event->title,
        strip_tags($event->description) ?: null,
        MediaUrl::from($event->cover_image)
      ),
    ]);
  }

  /**
   * Enregistre une inscription à un événement.
   *
   * @param EventRegistrationRequest $request Données validées
   * @param string $slug Slug de l'événement ciblé
   * @return RedirectResponse Redirection avec message flash
   */
  public function register(EventRegistrationRequest $request, string $slug): RedirectResponse
  {
    $event = Event::query()
      ->published()
      ->where('slug', $slug)
      ->firstOrFail();

    $event->registrations()->create($request->validated());

    return back()->with('success', 'Votre inscription a bien été enregistrée. Merci !');
  }
}
