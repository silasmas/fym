<?php

namespace App\Http\Middleware;

use App\Support\Installation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Empêche l'accès à l'assistant d'installation une fois le site lancé.
 */
class RedirectIfInstalled
{
  /**
   * Redirige vers l'accueil si l'installation est déjà terminée.
   *
   * @param Request $request Requête HTTP entrante
   * @param Closure $next Prochain middleware
   * @return Response Réponse HTTP ou redirection vers l'accueil
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (Installation::isInstalled()) {
      return redirect()->route('home');
    }

    return $next($request);
  }
}
