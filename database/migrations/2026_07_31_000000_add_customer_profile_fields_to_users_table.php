<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 100)->nullable()->after('name');
            $table->string('last_name', 100)->nullable()->after('first_name');
            $table->string('phone', 30)->nullable()->after('last_name');
            $table->boolean('accepts_privacy')->default(false)->after('password');
            $table->boolean('newsletter')->default(false)->after('accepts_privacy');
            $table->boolean('special_offers')->default(false)->after('newsletter');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'first_name',
                'last_name',
                'phone',
                'accepts_privacy',
                'newsletter',
                'special_offers',
            ]);
        });
    }
};
