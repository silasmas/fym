<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

/**
 * Représente un article de blog ou une actualité.
 */
class Post extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'title',
    'slug',
    'excerpt',
    'content',
    'thumbnail',
    'seo_title',
    'seo_description',
    'status',
    'published_at',
    'created_by',
  ];

  /**
   * Invalide le cache des articles récents du footer.
   *
   * @return void
   */
  protected static function booted(): void
  {
    static::saved(function (): void {
      Cache::forget('footer_recent_posts');
    });

    static::deleted(function (): void {
      Cache::forget('footer_recent_posts');
    });
  }

  /**
   * Conversions de types pour les attributs du modèle.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'published_at' => 'datetime',
    ];
  }

  /**
   * Retourne l'utilisateur ayant créé l'article.
   *
   * @return BelongsTo<User, $this>
   */
  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  /**
   * Retourne les catégories associées à l'article.
   *
   * @return BelongsToMany<Category, $this>
   */
  public function categories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class);
  }

  /**
   * Filtre les articles publiés et visibles sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Post> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Post> Requête filtrée
   */
  public function scopePublished($query)
  {
    return $query
      ->where('status', 'published')
      ->whereNotNull('published_at')
      ->where('published_at', '<=', now())
      ->orderByDesc('published_at');
  }
}
