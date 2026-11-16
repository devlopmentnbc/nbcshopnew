<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Optional SEO meta description, editable in admin.
     */
    public function up(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('meta_description', 160)->nullable()->after('meta_title');
            });
        }
    }

    public function down(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('meta_description');
            });
        }
    }
};
