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
        Schema::create('citypak_pickups', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_number')->unique();
            $table->string('citypak_pickup_id')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('pickup_from_time')->nullable();
            $table->string('pickup_to_time')->nullable();
            $table->string('contact_person');
            $table->string('contact_number');
            $table->text('address_line_1');
            $table->text('address_line_2')->nullable();
            $table->string('city')->default('Colombo');
            $table->integer('total_orders')->default(0);
            $table->integer('total_weight_grams')->default(0);
            $table->decimal('total_cod_amount', 12, 2)->default(0);
            $table->string('status')->default('SCHEDULED');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('citypak_pickup_id')->nullable()->after('citypak_tracking_history')->constrained('citypak_pickups')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['citypak_pickup_id']);
            $table->dropColumn('citypak_pickup_id');
        });

        Schema::dropIfExists('citypak_pickups');
    }
};
