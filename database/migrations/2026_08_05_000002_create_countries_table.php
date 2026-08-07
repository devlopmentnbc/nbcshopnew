<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 3);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // Insert initial standard countries
        DB::table('countries')->insert([
            ['name' => 'Sri Lanka', 'code' => 'LK', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'United States', 'code' => 'US', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'United Kingdom', 'code' => 'GB', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Australia', 'code' => 'AU', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Canada', 'code' => 'CA', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'India', 'code' => 'IN', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'United Arab Emirates', 'code' => 'AE', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Singapore', 'code' => 'SG', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Malaysia', 'code' => 'MY', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Germany', 'code' => 'DE', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
