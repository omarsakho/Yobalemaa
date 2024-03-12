<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Vérifier le rôle de l'utilisateur
        $user = auth()->user();

        // Si l'utilisateur est un administrateur, lui accorder l'accès à toutes les routes
        if ($user->isAdmin()) {
            return $next($request);
        }

        // Vérifier les accès pour les utilisateurs normaux
        $allowedRoutesForUser = ['home', 'vehicules.show', 'locations.create', 'locations.store'];

        if (!in_array($request->route()->getName(), $allowedRoutesForUser)) {
            return redirect('/home')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }

        return $next($request);
    }
}
