<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Buat roles terlebih dahulu
        $this->call([
            RolesSeeder::class,
            CategoriesSeeder::class,
            LabelsSeeder::class,
        ]);

        // Buat user admin
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
        ])->assignRole('admin');

        // Buat user agent
        User::factory()->create([
            'name' => 'Agent User',
            'email' => 'agent@agent.com',
            'password' => Hash::make('password123'),
        ])->assignRole('agent');

        // Buat user random dan beri role "user"
        User::factory(10)
            ->create([
                'password' => Hash::make('password123'),
            ])
            ->each(fn ($user) => $user->assignRole('user'));
    }
}
