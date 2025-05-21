<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CommentReputation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Averiguamos qué ruta es y, en caso de destroy, guardamos el comentario antes de borrarlo
        $routeName = $request->route()->getName();
        if ($routeName === 'comments.destroy') {
            // Traemos el modelo Comment antes de que el controller lo elimine
            $commentToDelete = $request->route('comment');
        }

        // Ejecutamos el controller
        $response = $next($request);

        // Tras la acción, ajustamos reputaciones
        $user = Auth::user();

        if ($routeName === 'comments.store') {
            // Si ha creado un comentario
            $increment = $user->hasRole('admin') ? 2 : 1;
            $user->increment('reputation', $increment);
        }

        if ($routeName === 'comments.destroy') {
            // Si un admin eliminó un comentario ajeno
            if ($user->hasRole('admin')) {
                $author = $commentToDelete->user;
                // Restamos 10 puntos (sólo si existía el comentario)
                $actualReputation = $author->reputation;
                if ($actualReputation > 10) {
                    $author->decrement('reputation', 10);
                } else {
                    // Si la reputación es menor a 10, la dejamos en 0
                    $author->update(['reputation' => 0]);
                }
            }
        }

        return $response;
    }
}
