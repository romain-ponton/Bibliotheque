<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::query()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.fr',
            'password' => bcrypt('password'),
        ]);

        $user->profile()->create([
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }
}
