<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

/**
 * Utilitaire pour résoudre les URLs des médias (stockage ou assets statiques).
 */
class MediaUrl
{
  /**
   * Retourne l'URL publique d'un fichier média.
   *
   * @param string|null $path Chemin relatif du fichier
   * @return string|null URL accessible ou null si chemin vide
   */
  public static function from(?string $path): ?string
  {
    if (empty($path)) {
      return null;
    }

    if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
      return $path;
    }

    if (str_starts_with($path, 'assets/')) {
      return asset($path);
    }

    return Storage::disk('public')->url($path);
  }
}
