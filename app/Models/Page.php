<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Représente une page de contenu CMS (À propos, mentions légales, etc.).
 */
class Page extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'title',
    'slug',
    'subtitle',
    'content',
    'cover_image',
    'seo_title',
    'seo_description',
    'status',
    'published_at',
    'created_by',
  ];

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
   * Retourne l'utilisateur ayant créé la page.
   *
   * @return BelongsTo<User, $this>
   */
  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  /**
   * Filtre les pages publiées sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Page> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Page> Requête filtrée
   */
  public function scopePublished($query)
  {
    return $query
      ->where('status', 'published')
      ->whereNotNull('published_at')
      ->where('published_at', '<=', now());
  }
}
