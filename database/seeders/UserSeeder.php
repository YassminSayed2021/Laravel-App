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
        User::factory()->count(5)->hasPosts(4)->create();
    }
}


//1. create seeder file: php artisan make:seeder UserSeeder
//2. implement UserSeeder
//3. Add UserSeeder in Database seeder
//4. Run seeder: php artisan db:seed