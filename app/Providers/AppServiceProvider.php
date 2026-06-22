<?php

namespace App\Providers;

use App\View\Composers\SiteComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    if ($this->app->environment('production')) {
      \Illuminate\Support\Facades\URL::forceScheme('https');
    }

    View::composer([
      'parties.menu',
      'parties.menu2',
      'parties.footer',
      'parties.banniere',
      'parties.contact-form',
      'layouts.template',
    ], SiteComposer::class);
  }
}
