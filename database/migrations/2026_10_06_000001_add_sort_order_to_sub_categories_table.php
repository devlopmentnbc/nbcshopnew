<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('status');
        });

        // Seed each category's order from the current A-Z listing so the menu looks the same until reordered.
        DB::table('sub_categories')
            ->orderBy('category_id')
            ->orderBy('name')
            ->orderBy('id')
            ->get(['id', 'category_id'])
            ->groupBy('category_id')
            ->each(fn ($rows) => $rows->values()->each(fn ($row, $index) => DB::table('sub_categories')
                ->where('id', $row->id)
                ->update(['sort_order' => $index + 1])));
    }

    public function down(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
