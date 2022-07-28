<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeedDefaultUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::firstOrCreate([
            'username' => 'admin',
        ], [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'password' => 'secret',
            'role' => UserRole::ADMIN(),
        ]);
        User::firstOrCreate([
            'username' => 'tester',
        ], [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'password' => 'secret',
            'role' => UserRole::USER(),
        ]);
    }
}
