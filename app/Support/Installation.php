<?php

namespace App\Support;

/**
 * Gère l'état d'installation de l'application (marqueur fichier).
 */
class Installation
{
  /**
   * Retourne le chemin du fichier marqueur d'installation.
   *
   * @return string Chemin absolu du fichier .installed
   */
  public static function markerPath(): string
  {
    return storage_path('app/.installed');
  }

  /**
   * Indique si l'application a été installée et peut être lancée.
   *
   * @return bool True si le marqueur d'installation existe
   */
  public static function isInstalled(): bool
  {
    return file_exists(self::markerPath());
  }

  /**
   * Marque l'application comme installée.
   *
   * @return void
   */
  public static function markAsInstalled(): void
  {
    $directory = dirname(self::markerPath());

    if (! is_dir($directory)) {
      mkdir($directory, 0755, true);
    }

    file_put_contents(self::markerPath(), json_encode([
      'installed_at' => now()->toIso8601String(),
      'app' => config('app.name'),
      'url' => config('app.url'),
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
  }

  /**
   * Supprime le marqueur d'installation (réouvre l'assistant).
   *
   * @return void
   */
  public static function reset(): void
  {
    if (file_exists(self::markerPath())) {
      unlink(self::markerPath());
    }
  }
}
