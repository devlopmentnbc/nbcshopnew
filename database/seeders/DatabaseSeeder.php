<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
        ]);

        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'System Admin',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );

        User::firstOrCreate(
            ['email' => 'customer@example.com'],
            [
                'name' => 'John Customer',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ]
        );
    }
}
