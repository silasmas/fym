<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Projet;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Support\Seo;
use Illuminate\View\View;

/**
 * Contrôleur de la page d'accueil du site public.
 */
class HomeController extends Controller
{
  /**
   * Affiche la page d'accueil avec le contenu dynamique.
   *
   * @return View Vue de la page d'accueil
   */
  public function index(): View
  {
    return view('pages.index', [
      'sliders' => Slider::query()->visible()->get(),
      'services' => Service::query()->visible()->limit(6)->get(),
      'projets' => Projet::query()->published()->with('photos')->limit(8)->get(),
      'posts' => Post::query()->published()->with('categories')->limit(3)->get(),
      'partners' => Partner::query()->ordered()->get(),
      'events' => Event::query()->published()->upcoming()->orderBy('start_at')->limit(3)->get(),
      'seo' => Seo::make(
        'Accueil',
        Setting::getValue('seo_home_description')
      ),
    ]);
  }
}
