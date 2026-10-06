<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Additional category placements for a product, on top of its main products.category_id / sub_category_id.
     */
    public function up(): void
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->cascadeOnDelete();
            $table->timestamps();

            $table->index(['category_id', 'product_id']);
            $table->index(['sub_category_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
