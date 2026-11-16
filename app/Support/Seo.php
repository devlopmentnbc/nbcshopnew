<?php

namespace App\Support;

class Seo
{
    /** Fallback <meta name="description"> for pages without their own. */
    public const DEFAULT_DESCRIPTION = "Shop authentic herbal beauty and personal care products from Nature's Beauty Creations.";

    /**
     * Plain-text description from (possibly HTML) content, cut at a word
     * boundary to fit 160 characters. Empty string when there is no text.
     */
    public static function description(?string $text, int $limit = 160): string
    {
        $text = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags((string) $text), ENT_QUOTES | ENT_HTML5)));

        if (mb_strlen($text) <= $limit) {
            return $text;
        }

        $cut = mb_substr($text, 0, $limit - 1);
        $space = mb_strrpos($cut, ' ');

        return rtrim($space > $limit * 0.6 ? mb_substr($cut, 0, $space) : $cut, " ,;:-") . '…';
    }

    /**
     * Build a canonical URL for the current page (or a given path).
     *
     * Query strings are dropped unless listed in $keep, so tracking params,
     * sorting and similar variations all point at one URL. Empty values and
     * page=1 are removed so the first page canonicalises to the bare URL.
     */
    public static function canonical(?string $path = null, array $keep = []): string
    {
        $path = trim($path ?? request()->path(), '/');
        $url = self::root() . ($path === '' ? '/' : '/' . $path);

        $query = [];
        foreach ($keep as $key) {
            $value = request()->query($key);

            if (! is_scalar($value) || trim((string) $value) === '') {
                continue;
            }
            if ($key === 'page' && (int) $value <= 1) {
                continue;
            }

            $query[$key] = (string) $value;
        }

        return $query ? $url . '?' . http_build_query($query) : $url;
    }

    /**
     * Use the configured APP_URL in production so canonicals always point at the
     * real domain and scheme (not a proxy host or http://); otherwise use the
     * current request host so local/staging links stay clickable.
     */
    private static function root(): string
    {
        $appUrl = rtrim((string) config('app.url'), '/');
        $host = parse_url($appUrl, PHP_URL_HOST);

        if (app()->isProduction() && $host && ! in_array($host, ['localhost', '127.0.0.1'], true)) {
            return $appUrl;
        }

        return request()->getSchemeAndHttpHost();
    }
}
