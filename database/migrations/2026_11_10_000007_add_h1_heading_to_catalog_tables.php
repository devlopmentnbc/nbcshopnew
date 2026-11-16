<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Optional SEO <h1> heading, editable in admin.
     */
    public function up(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('h1_heading', 120)->nullable()->after('meta_description');
            });
        }
    }

    public function down(): void
    {
        foreach (['products', 'categories', 'sub_categories', 'brands'] as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('h1_heading');
            });
        }
    }
};
