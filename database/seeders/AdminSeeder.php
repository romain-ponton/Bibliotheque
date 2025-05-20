<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->create([
            'name' => 'admin admin',
            'email' => 'admin@admin.fr',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $admin->profile()->create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }
}
