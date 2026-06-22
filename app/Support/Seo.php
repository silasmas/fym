<?php

namespace App\Support;

/**
 * Construit les métadonnées SEO pour les pages du site public.
 */
class Seo
{
  /**
   * Crée un tableau de métadonnées SEO pour une page.
   *
   * @param string|null $title Titre de la page
   * @param string|null $description Meta description
   * @param string|null $image URL de l'image Open Graph
   * @return array<string, string|null> Métadonnées SEO
   */
  public static function make(?string $title = null, ?string $description = null, ?string $image = null): array
  {
    $siteName = config('app.name', 'FYM');
    $defaultDescription = 'Fondation Yves Milan Ngangay — association caritative et humanitaire en République Démocratique du Congo.';

    $pageTitle = $title ? "{$title} | {$siteName}" : $siteName;

    return [
      'title' => $pageTitle,
      'description' => $description ?: $defaultDescription,
      'image' => $image ?: asset('assets/images/logo.jpeg'),
      'url' => url()->current(),
    ];
  }
}
