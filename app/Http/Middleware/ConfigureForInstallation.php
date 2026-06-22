<?php

namespace App\Http\Middleware;

use App\Support\Installation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Force session et cache fichier tant que l'application n'est pas installée.
 */
class ConfigureForInstallation
{
  /**
   * Adapte la configuration pour permettre l'installation sans base migrée.
   *
   * @param Request $request Requête HTTP entrante
   * @param Closure $next Prochain middleware
   * @return Response Réponse HTTP
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (! Installation::isInstalled()) {
      config([
        'session.driver' => 'file',
        'cache.default' => 'file',
        'queue.default' => 'sync',
      ]);
    }

    return $next($request);
  }
}
