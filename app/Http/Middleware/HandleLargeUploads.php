<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleLargeUploads
{
    public function handle(Request $request, Closure $next): Response
    {
        $contentLength = $request->server('CONTENT_LENGTH');
        if ($contentLength > 100 * 1024 * 1024) { // 100MB in bytes
            return response()->json([
                'error' => 'Le fichier est trop volumineux. La taille maximum est de 100MB.'
            ], 413);
        }

        return $next($request);
    }
}
