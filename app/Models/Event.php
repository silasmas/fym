<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Représente un événement organisé par la fondation.
 */
class Event extends Model
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
    'start_at',
    'end_at',
    'cover_image',
    'description',
    'status',
  ];

  /**
   * Conversions de types pour les attributs du modèle.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'start_at' => 'datetime',
      'end_at' => 'datetime',
    ];
  }

  /**
   * Retourne les inscriptions liées à l'événement.
   *
   * @return HasMany<EventRegistration, $this>
   */
  public function registrations(): HasMany
  {
    return $this->hasMany(EventRegistration::class);
  }

  /**
   * Filtre les événements publiés sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Event> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Event> Requête filtrée
   */
  public function scopePublished($query)
  {
    return $query->where('status', 'published');
  }

  /**
   * Filtre les événements à venir.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Event> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Event> Requête filtrée
   */
  public function scopeUpcoming($query)
  {
    return $query->where('start_at', '>=', now());
  }
}
