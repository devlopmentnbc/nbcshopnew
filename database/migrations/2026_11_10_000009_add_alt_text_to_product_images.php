<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Optional alt text for the main product image and each gallery image.
     * Empty values fall back to an automatic, descriptive alt (see Product).
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_alt', 150)->nullable()->after('image');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->string('alt_text', 150)->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_alt');
        });

        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('alt_text');
        });
    }
};
