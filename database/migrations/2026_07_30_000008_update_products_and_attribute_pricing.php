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
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'price')) {
                $table->dropColumn(['price', 'sale_price', 'stock']);
            }
        });

        Schema::table('product_attribute_value', function (Blueprint $table) {
            $table->decimal('price_lkr', 12, 2)->default(0.00)->after('attribute_value_id');
            $table->decimal('price_usd', 12, 2)->default(0.00)->after('price_lkr');
            $table->decimal('sale_price_lkr', 12, 2)->nullable()->after('price_usd');
            $table->decimal('sale_price_usd', 12, 2)->nullable()->after('sale_price_lkr');
            $table->integer('stock')->default(0)->after('sale_price_usd');
            $table->string('sku')->nullable()->after('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_attribute_value', function (Blueprint $table) {
            $table->dropColumn(['price_lkr', 'price_usd', 'sale_price_lkr', 'sale_price_usd', 'stock', 'sku']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
        });
    }
};
