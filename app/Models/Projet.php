<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Représente un projet ou une réalisation de la fondation.
 */
class Projet extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'title',
    'slug',
    'location',
    'start_date',
    'end_date',
    'budget',
    'cover_image',
    'description',
    'status',
    'seo_title',
    'seo_description',
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
      'start_date' => 'date',
      'end_date' => 'date',
      'budget' => 'decimal:2',
      'published_at' => 'datetime',
    ];
  }

  /**
   * Retourne l'utilisateur ayant créé le projet.
   *
   * @return BelongsTo<User, $this>
   */
  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class, 'created_by');
  }

  /**
   * Retourne les photos associées au projet.
   *
   * @return HasMany<ProjetPhoto, $this>
   */
  public function photos(): HasMany
  {
    return $this->hasMany(ProjetPhoto::class)->orderBy('position');
  }

  /**
   * Filtre les projets publiés sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Projet> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Projet> Requête filtrée
   */
  public function scopePublished($query)
  {
    return $query
      ->whereNotNull('published_at')
      ->where('published_at', '<=', now())
      ->orderByDesc('published_at');
  }
}
