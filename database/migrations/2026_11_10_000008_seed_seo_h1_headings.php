<?php

use App\Support\SeoH1Seed;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Log;

/**
 * Fills the audit's H1 headings into empty h1_heading fields
 * (see SEO_H1_PLAN.txt). Run `php artisan seo:titles` for the report.
 */
return new class extends Migration
{
    public function up(): void
    {
        $report = SeoH1Seed::apply();

        $summary = sprintf(
            'SEO H1 headings: %d set, %d kept (already had one), %d not matched.',
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
        // H1 headings are left in place; the column is dropped by the previous migration's down().
    }
};
