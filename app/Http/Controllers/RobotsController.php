<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Http\Response;

class RobotsController extends Controller
{
    /**
     * /robots.txt
     *
     * Staging (SEO_NOINDEX=true): fully open, so crawlers can fetch pages and
     * see the noindex header/meta. Production: block pages with no search
     * value and duplicate (search / sort / multi-filter) URLs.
     *
     * Intentionally NOT blocked: CSS / JS / images, /product-details/ and
     * ?page= pagination. Admin paths are not listed (robots.txt is public);
     * admin pages send their own noindex header instead.
     */
    public function index(): Response
    {
        if (config('seo.noindex')) {
            $lines = [
                '# Staging: indexing is blocked with noindex headers, not robots.txt.',
                'User-agent: *',
                'Disallow:',
            ];
        } else {
            $lines = [
                'User-agent: *',
                'Disallow: /login',
                'Disallow: /auth/',
                'Disallow: /checkout',
                'Disallow: /cart/',
                'Disallow: /profile',
                'Disallow: /wishlist/',
                'Disallow: /search/live',
                'Disallow: /payments/',
                'Disallow: /*?*search=',
                'Disallow: /*?*sort=',
                'Disallow: /shop?*&category=',
                'Disallow: /shop?*&sub_category=',
                'Disallow: /shop?*&brand=',
                '',
                'Sitemap: ' . Seo::canonical('sitemap.xml'),
            ];
        }

        return response(implode("\n", $lines) . "\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
