<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Contact details
            $table->string('name');
            $table->string('phone');
            $table->string('email');

            // Billing address
            $table->string('billing_address_line1');
            $table->string('billing_address_line2')->nullable();
            $table->string('billing_city');
            $table->string('billing_state')->nullable();
            $table->string('billing_postal_code')->nullable();
            $table->string('billing_country');

            // Delivery address
            $table->boolean('delivery_same_as_billing')->default(true);
            $table->string('delivery_address_line1');
            $table->string('delivery_address_line2')->nullable();
            $table->string('delivery_city');
            $table->string('delivery_state')->nullable();
            $table->string('delivery_postal_code')->nullable();
            $table->string('delivery_country');

            $table->text('notes')->nullable();

            // Totals (snapshotted at order time)
            $table->decimal('subtotal_lkr', 12, 2)->default(0);
            $table->decimal('shipping_fee_lkr', 12, 2)->default(0);
            $table->decimal('total_lkr', 12, 2)->default(0);

            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
