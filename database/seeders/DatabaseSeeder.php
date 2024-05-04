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
        // User::factory(10)->create();

       Employee::factory()->create([
             'full_name' => 'Bill Gates',
             'age'=>80,
             'salary'=>4000,
             'date_of_employment' => 1960-05-15,
             'email'=>'Bill_gate@gmail.com',
             'password'=>static::$password ??= Hash::make('password'),
             'employee_manager'=>1,
         ]);




    }
}
