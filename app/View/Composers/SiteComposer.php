<?php

namespace App\View\Composers;

use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

/**
 * Injecte les paramètres globaux et les actualités récentes dans les vues du site.
 */
class SiteComposer
{
  /**
   * Partage les données communes avec la vue cible.
   *
   * @param View $view Vue Blade en cours de rendu
   * @return void
   */
  public function compose(View $view): void
  {
    $settings = Cache::remember('site_settings', 3600, function () {
      return Setting::query()->pluck('value', 'key')->toArray();
    });

    $recentPosts = Cache::remember('footer_recent_posts', 600, function () {
      return Post::query()
        ->published()
        ->with('categories')
        ->limit(2)
        ->get();
    });

    $footerServices = Cache::remember('footer_services', 600, function () {
      return Service::query()->visible()->limit(6)->get();
    });

    $view->with([
      'settings' => $settings,
      'recentPosts' => $recentPosts,
      'footerServices' => $footerServices,
    ]);
  }
}
