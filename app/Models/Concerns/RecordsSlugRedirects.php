<?php

namespace App\Models\Concerns;

use App\Models\SlugRedirect;

/**
 * Keeps old URLs working: when a model's slug changes, the old slug is saved
 * so it can 301 to the new URL. Models using this define SLUG_REDIRECT_TYPE.
 */
trait RecordsSlugRedirects
{
    public static function bootRecordsSlugRedirects(): void
    {
        static::saved(function ($model) {
            if (! $model->wasRecentlyCreated && ! $model->wasChanged('slug')) {
                return;
            }

            $type = static::SLUG_REDIRECT_TYPE;

            // A slug that is live again must not redirect anywhere.
            SlugRedirect::where('type', $type)->where('old_slug', $model->slug)->delete();

            $oldSlug = $model->getOriginal('slug');
            if ($model->wasChanged('slug') && filled($oldSlug)) {
                SlugRedirect::updateOrCreate(
                    ['type' => $type, 'old_slug' => $oldSlug],
                    ['target_type' => $type, 'target_id' => $model->getKey()]
                );
            }
        });

        static::deleted(function ($model) {
            SlugRedirect::where('target_type', static::SLUG_REDIRECT_TYPE)
                ->where('target_id', $model->getKey())
                ->delete();
        });
    }
}
