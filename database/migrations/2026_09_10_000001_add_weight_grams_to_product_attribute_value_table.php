<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_attribute_value', function (Blueprint $table) {
            if (!Schema::hasColumn('product_attribute_value', 'weight_grams')) {
                $table->integer('weight_grams')->nullable()->after('sap_code');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_attribute_value', function (Blueprint $table) {
            if (Schema::hasColumn('product_attribute_value', 'weight_grams')) {
                $table->dropColumn('weight_grams');
            }
        });
    }
};
