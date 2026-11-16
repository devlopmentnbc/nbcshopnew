<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * 301 "/shop/" -> "/shop" (query string kept) so each page has one URL.
 * Works on any web server; Apache's .htaccess rule only covers Apache.
 */
class RedirectTrailingSlash
{
    public function handle(Request $request, Closure $next): Response
    {
        // Raw request path (includes any sub-directory base path).
        $path = parse_url($request->getRequestUri(), PHP_URL_PATH) ?: '/';

        if ($request->isMethodSafe() && $path !== '/' && str_ends_with($path, '/')) {
            $query = $request->getQueryString();

            return redirect()->to(
                $request->getSchemeAndHttpHost() . (rtrim($path, '/') ?: '/') . ($query ? '?' . $query : ''),
                301
            );
        }

        return $next($request);
    }
}
