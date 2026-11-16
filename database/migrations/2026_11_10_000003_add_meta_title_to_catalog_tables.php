<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Optional SEO <title> override, editable in admin.
     */
    public function up(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('meta_title', 70)->nullable()->after('slug');
            });
        }
    }

    public function down(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('meta_title');
            });
        }
    }
};
