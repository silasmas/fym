<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Support\MediaUrl;
use App\Support\Seo;
use Illuminate\View\View;

/**
 * Contrôleur du blog / actualités du site public.
 */
class PostController extends Controller
{
  /**
   * Liste les articles publiés.
   *
   * @return View Vue de la liste des articles
   */
  public function index(): View
  {
    return view('pages.posts.index', [
      'posts' => Post::query()->published()->with('categories')->paginate(9),
      'pageTitle' => 'Actualités',
      'seo' => Seo::make('Actualités', 'Suivez les dernières nouvelles de la Fondation Yves Milan.'),
    ]);
  }

  /**
   * Affiche le détail d'un article.
   *
   * @param string $slug Slug unique de l'article
   * @return View Vue de détail de l'article
   */
  public function show(string $slug): View
  {
    $post = Post::query()
      ->published()
      ->with('categories')
      ->where('slug', $slug)
      ->firstOrFail();

    return view('pages.posts.show', [
      'post' => $post,
      'pageTitle' => $post->title,
      'seo' => Seo::make(
        $post->title,
        $post->seo_description ?? $post->excerpt,
        MediaUrl::from($post->thumbnail)
      ),
    ]);
  }
}
