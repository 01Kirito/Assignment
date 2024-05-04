<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    private static string $password;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Employee::factory(5)->create();
        Employee::factory(10)->create();
        Employee::factory(20)->create();
        Employee::factory(25)->create();
        Employee::factory(40)->create();


    }
}
