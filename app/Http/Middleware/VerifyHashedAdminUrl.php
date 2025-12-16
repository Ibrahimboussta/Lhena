<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyHashedAdminUrl
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hashedSegment = $request->segment(1); // Get the first URL segment

        // Verify the hashed segment against a known value
        // You can change 'your-secret-admin-key' to any secret string you want
        if (!Hash::check('your-secret-admin-key', $hashedSegment)) {
            abort(404); // Or redirect to home page
        }

        return $next($request);
    }
}
