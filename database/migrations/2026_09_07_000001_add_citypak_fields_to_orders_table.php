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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('citypak_order_id')->nullable()->after('status');
            $table->string('citypak_tracking_number')->nullable()->after('citypak_order_id');
            $table->string('citypak_status')->nullable()->after('citypak_tracking_number');
            $table->string('citypak_delivery_facility_code')->nullable()->after('citypak_status');
            $table->timestamp('citypak_dispatched_at')->nullable()->after('citypak_delivery_facility_code');
            $table->json('citypak_tracking_history')->nullable()->after('citypak_dispatched_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'citypak_order_id',
                'citypak_tracking_number',
                'citypak_status',
                'citypak_delivery_facility_code',
                'citypak_dispatched_at',
                'citypak_tracking_history',
            ]);
        });
    }
};
