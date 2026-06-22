<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Support\MediaUrl;
use App\Support\Seo;
use Illuminate\View\View;

/**
 * Contrôleur des réalisations / portfolio du site public.
 */
class ProjetController extends Controller
{
  /**
   * Liste tous les projets publiés.
   *
   * @return View Vue du portfolio
   */
  public function index(): View
  {
    return view('pages.portfolio', [
      'projets' => Projet::query()->published()->with('photos')->get(),
      'pageTitle' => 'Nos Réalisations',
      'seo' => Seo::make('Nos Réalisations', 'Découvrez les projets et réalisations de la Fondation Yves Milan.'),
    ]);
  }

  /**
   * Affiche le détail d'un projet.
   *
   * @param string $slug Slug unique du projet
   * @return View Vue de détail du projet
   */
  public function show(string $slug): View
  {
    $projet = Projet::query()
      ->published()
      ->with('photos')
      ->where('slug', $slug)
      ->firstOrFail();

    return view('pages.portfolio.show', [
      'projet' => $projet,
      'pageTitle' => $projet->title,
      'seo' => Seo::make(
        $projet->title,
        $projet->seo_description ?? strip_tags($projet->description ?? '') ?: null,
        MediaUrl::from($projet->cover_image)
      ),
    ]);
  }
}
