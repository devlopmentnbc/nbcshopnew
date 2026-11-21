<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('is_gift')->default(false)->after('notes');
            $table->text('gift_note')->nullable()->after('is_gift');
            $table->boolean('gift_hide_bill')->default(false)->after('gift_note');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['is_gift', 'gift_note', 'gift_hide_bill']);
        });
    }
};
