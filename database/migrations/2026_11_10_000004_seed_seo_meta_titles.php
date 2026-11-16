<?php

use App\Support\SeoTitleSeed;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;

/**
 * Fills the audit's title tags into empty meta_title fields
 * (see SEO_TITLE_TAGS_PLAN.txt). Run `php artisan seo:titles` for the report.
 */
return new class extends Migration
{
    public function up(): void
    {
        $report = SeoTitleSeed::apply();

        $summary = sprintf(
            'SEO titles: %d set, %d kept (already had a title), %d not matched.',
            count($report['set']), count($report['kept']), count($report['missing'])
        );

        Log::info($summary, ['not_matched' => $report['missing']]);

        if (app()->runningInConsole()) {
            fwrite(STDOUT, PHP_EOL . '  ' . $summary . PHP_EOL);
            foreach ($report['missing'] as $line) {
                fwrite(STDOUT, '    not matched: ' . $line . PHP_EOL);
            }
        }
    }

    public function down(): void
    {
        // Titles are left in place; the column itself is dropped by the previous migration's down().
    }
};
