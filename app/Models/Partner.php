<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Représente un partenaire affiché sur le site.
 */
class Partner extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'logo',
    'website',
    'position',
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
   * Trie les partenaires par ordre d'affichage.
   *
   * @param \Illuminate\Database\Eloquent\Builder<Partner> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<Partner> Requête ordonnée
   */
  public function scopeOrdered($query)
  {
    return $query->orderBy('position');
  }
}
