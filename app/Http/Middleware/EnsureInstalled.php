<?php

namespace App\Http\Middleware;

use App\Support\Installation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Redirige vers l'assistant d'installation si le site n'est pas encore lancé.
 */
class EnsureInstalled
{
  /**
   * Vérifie que l'application est installée avant d'accéder au site.
   *
   * @param Request $request Requête HTTP entrante
   * @param Closure $next Prochain middleware
   * @return Response Réponse HTTP ou redirection vers /install
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (Installation::isInstalled()) {
      return $next($request);
    }

    return redirect()->route('install.index');
  }
}
