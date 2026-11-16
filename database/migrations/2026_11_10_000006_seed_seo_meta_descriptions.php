<?php

use App\Support\SeoDescriptionSeed;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;

/**
 * Fills the audit's meta descriptions into empty meta_description fields
 * (see SEO_META_DESCRIPTIONS_PLAN.txt). Run `php artisan seo:titles` for the report.
 */
return new class extends Migration
{
    public function up(): void
    {
        $report = SeoDescriptionSeed::apply();

        $summary = sprintf(
            'SEO descriptions: %d set, %d kept (already had one), %d not matched.',
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
        // Descriptions are left in place; the column is dropped by the previous migration's down().
    }
};
