<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeeder::class,
        ]);

        $this->call([
            ProductSeeder::class,
        ]);

        \App\Models\User::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => Hash::make('testtest'),
            'email_verified_at' => now(),
        ])->assignRole('admin');

    }
}
