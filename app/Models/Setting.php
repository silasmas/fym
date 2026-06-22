<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * Représente un paramètre clé/valeur du site (coordonnées, réseaux sociaux, etc.).
 */
class Setting extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'key',
    'value',
  ];

  /**
   * Enregistre les hooks du modèle pour invalider le cache des paramètres.
   *
   * @return void
   */
  protected static function booted(): void
  {
    static::saved(function (): void {
      Cache::forget('site_settings');
    });

    static::deleted(function (): void {
      Cache::forget('site_settings');
    });
  }

  /**
   * Récupère la valeur d'un paramètre par sa clé.
   *
   * @param string $key Clé du paramètre recherché
   * @param string|null $default Valeur par défaut si la clé n'existe pas
   * @return string|null Valeur du paramètre ou valeur par défaut
   */
  public static function getValue(string $key, ?string $default = null): ?string
  {
    $setting = static::query()->where('key', $key)->first();

    return $setting?->value ?? $default;
  }
}
