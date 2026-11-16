<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * X-Robots-Tag header:
 *  - whole site when SEO_NOINDEX=true (staging),
 *  - always on admin pages, so they stay out of search without being
 *    listed in the public robots.txt.
 */
class RobotsHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (config('seo.noindex') || $request->is('admin', 'admin/*')) {
            $response->headers->set('X-Robots-Tag', 'noindex, nofollow');
        }

        return $response;
    }
}
