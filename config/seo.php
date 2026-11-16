<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Block search engine indexing (staging only)
    |--------------------------------------------------------------------------
    | true  = every response gets "X-Robots-Tag: noindex, nofollow", every page
    |         gets <meta name="robots" content="noindex, nofollow">, and
    |         robots.txt stays fully open so crawlers can read the noindex.
    | Set SEO_NOINDEX=true in the STAGING .env only. Remove it (or set false)
    | on production - a noindex left on at launch removes the store from Google.
    */
    'noindex' => (bool) env('SEO_NOINDEX', false),

];
