<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $tokenRecibido = $request->header('X-Admin-Token');
        $tokenCorrecto = env('ADMIN_TOKEN', 'secreto-admin-123');

        if ($tokenRecibido !== $tokenCorrecto) {
            return response()->json([
                'error'   => 'Acceso denegado',
                'message' => 'Necesitas ser administrador para hacer esto.',
            ], 403);
        }

        return $next($request);
    }
}
