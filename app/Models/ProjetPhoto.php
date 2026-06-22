<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Représente une photo liée à un projet.
 */
class ProjetPhoto extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'projet_id',
    'path',
    'caption',
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
   * Retourne le projet parent de la photo.
   *
   * @return BelongsTo<Projet, $this>
   */
  public function projet(): BelongsTo
  {
    return $this->belongsTo(Projet::class);
  }
}
