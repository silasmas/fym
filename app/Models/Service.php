<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Représente un service proposé par la fondation.
 */
class Service extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'title',
    'slug',
    'icon',
    'summary',
    'content',
    'position',
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
      'position' => 'integer',
    ];
  }

  /**
   * Filtre les services visibles sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Service> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Service> Requête filtrée
   */
  public function scopeVisible($query)
  {
    return $query->where('status', 'visible')->orderBy('position');
  }

  /**
   * Invalide le cache des services du footer.
   *
   * @return void
   */
  protected static function booted(): void
  {
    static::saved(function (): void {
      Cache::forget('footer_services');
    });

    static::deleted(function (): void {
      Cache::forget('footer_services');
    });
  }
}
