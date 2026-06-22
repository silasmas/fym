<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Support\Seo;
use Illuminate\View\View;

/**
 * Contrôleur des pages services du site public.
 */
class ServiceController extends Controller
{
  /**
   * Liste tous les services visibles.
   *
   * @return View Vue de la liste des services
   */
  public function index(): View
  {
    return view('pages.services', [
      'services' => Service::query()->visible()->get(),
      'pageTitle' => 'Nos Services',
      'seo' => Seo::make('Nos Services', 'Découvrez les services et actions de la Fondation Yves Milan.'),
    ]);
  }

  /**
   * Affiche le détail d'un service.
   *
   * @param string $slug Slug unique du service
   * @return View Vue de détail du service
   */
  public function show(string $slug): View
  {
    $service = Service::query()
      ->visible()
      ->where('slug', $slug)
      ->firstOrFail();

    return view('pages.services.show', [
      'service' => $service,
      'pageTitle' => $service->title,
      'seo' => Seo::make($service->title, $service->summary),
    ]);
  }
}
