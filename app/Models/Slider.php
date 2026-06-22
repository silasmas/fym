<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Représente une diapositive du carrousel de la page d'accueil.
 */
class Slider extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'title',
    'subtitle',
    'button_text',
    'button_url',
    'image',
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
   * Filtre les diapositives visibles sur le site.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Slider> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Slider> Requête filtrée
   */
  public function scopeVisible($query)
  {
    return $query->where('status', 'visible')->orderBy('position');
  }
}
