<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('status');
        });

        // Start from the current alphabetical order used in the storefront menu.
        DB::table('brands')
            ->orderBy('name')
            ->pluck('id')
            ->each(fn ($id, $index) => DB::table('brands')
                ->where('id', $id)
                ->update(['sort_order' => $index + 1]));
    }

    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
