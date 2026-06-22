<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Représente un membre de l'équipe affiché sur le site.
 */
class TeamMember extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'role',
    'photo',
    'email',
    'phone',
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
   * Trie les membres par ordre d'affichage.
   *
   * @param \Illuminate\Database\Eloquent\Builder<TeamMember> $query Requête Eloquent
   * @return \Illuminate\Database\Eloquent\Builder<TeamMember> Requête ordonnée
   */
  public function scopeOrdered($query)
  {
    return $query->orderBy('position');
  }
}
