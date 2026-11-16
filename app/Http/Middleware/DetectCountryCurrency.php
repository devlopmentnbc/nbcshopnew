<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DetectCountryCurrency
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow manual currency switching via query parameter ?currency=USD or ?currency=LKR
        if ($request->has('currency')) {
            $currencyParam = strtoupper($request->query('currency'));
            if (in_array($currencyParam, ['LKR', 'USD'])) {
                Session::put('currency', $currencyParam);
            }
        }

        // Search engines and SEO crawlers always get the store's home currency (LKR),
        // so indexed prices match what Sri Lankan shoppers see - wherever the crawler runs.
        if (self::isCrawler($request)) {
            Session::put('country_code', 'LK');
            Session::put('currency', 'LKR');

            return $next($request);
        }

        if (!Session::has('country_code') || !Session::has('currency')) {
            $country = $request->header('CF-IPCountry');

            if (!$country) {
                try {
                    $ip = $request->ip();
                    // Skip local/dev IPs
                    if (!in_array($ip, ['127.0.0.1', '::1'])) {
                        $res = Http::timeout(2)->retry(1)->get("https://ipapi.co/{$ip}/json/");
                        if ($res->ok() && $res->json('country_code')) {
                            $country = $res->json('country_code');
                        }
                    }
                } catch (\Throwable $e) {
                    // Fallback on error
                }
            }

            // If IP is Sri Lanka ('LK'), show LKR. Otherwise show USD.
            $country = $country ? strtoupper($country) : 'LK';
            $currency = ($country === 'LK') ? 'LKR' : 'USD';

            Session::put('country_code', $country);
            Session::put('currency', $currency);
        }

        return $next($request);
    }

    /**
     * Known search engine / SEO / social preview crawlers (by User-Agent).
     */
    public static function isCrawler(Request $request): bool
    {
        $agent = (string) $request->userAgent();

        return $agent !== '' && preg_match(
            '/googlebot|google-inspectiontool|adsbot-google|mediapartners-google|bingbot|bingpreview|'
            . 'slurp|duckduckbot|baiduspider|yandex|applebot|petalbot|seznambot|'
            . 'ahrefsbot|semrushbot|mj12bot|dotbot|screaming frog|sitebulb|rogerbot|'
            . 'facebookexternalhit|facebot|twitterbot|linkedinbot|whatsapp|telegrambot|pinterest/i',
            $agent
        ) === 1;
    }
}
