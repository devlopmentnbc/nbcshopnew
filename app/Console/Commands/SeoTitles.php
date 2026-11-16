<?php

namespace App\Console\Commands;

use App\Support\SeoDescriptionSeed;
use App\Support\SeoH1Seed;
use App\Support\SeoTitleSeed;
use Illuminate\Console\Command;

class SeoTitles extends Command
{
    protected $signature = 'seo:titles {--apply : Write the values (default is a dry run)}';

    protected $description = 'Report (or apply) the SEO audit title tags, meta descriptions and H1 headings for products, categories, sub-categories and brands';

    public function handle(): int
    {
        $apply = (bool) $this->option('apply');

        foreach (['Titles' => SeoTitleSeed::class, 'Descriptions' => SeoDescriptionSeed::class, 'H1 headings' => SeoH1Seed::class] as $label => $seed) {
            $report = $seed::apply(dryRun: ! $apply);

            $this->info("{$label} - " . ($apply ? 'applied' : 'dry run') . ': '
                . count($report['set']) . ' to set, '
                . count($report['kept']) . ' already set, '
                . count($report['missing']) . ' not matched.');

            if ($this->getOutput()->isVerbose()) {
                foreach ($report['set'] as $line) {
                    $this->line('  set:  ' . $line);
                }
                foreach ($report['kept'] as $line) {
                    $this->line('  kept: ' . $line);
                }
            }

            foreach ($report['missing'] as $line) {
                $this->warn('  not matched: ' . $line);
            }
        }

        if (! $apply) {
            $this->line('Run with --apply to write them (use -v to list every value).');
        }

        return self::SUCCESS;
    }
}
