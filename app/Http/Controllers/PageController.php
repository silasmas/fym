<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Partner;
use App\Models\TeamMember;
use App\Support\MediaUrl;
use App\Support\Seo;
use Illuminate\View\View;

/**
 * Contrôleur des pages de contenu CMS (À propos, etc.).
 */
class PageController extends Controller
{
  /**
   * Affiche la page À propos.
   *
   * @return View Vue de la page à propos
   */
  public function about(): View
  {
    $page = Page::query()
      ->published()
      ->whereIn('slug', ['a-propos', 'about', 'apropos'])
      ->first();

    $title = $page?->title ?? 'À propos';

    return view('pages.about', [
      'page' => $page,
      'partners' => Partner::query()->ordered()->get(),
      'teamMembers' => TeamMember::query()->ordered()->get(),
      'pageTitle' => $title,
      'seo' => Seo::make(
        $title,
        $page?->seo_description ?? strip_tags($page?->content ?? '') ?: null,
        MediaUrl::from($page?->cover_image)
      ),
    ]);
  }
}
