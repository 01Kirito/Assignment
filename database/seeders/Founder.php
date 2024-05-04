<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Founder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                Employee::create([
                    'full_name' => 'Bill Gates',
                    'age' => 80,
                    'salary' => 2000,
                    'date_of_employment' => '1960-05-15',
                    'email' => 'Bill_gate@gmail.com',
                    'password' => 'Bill1234',
                    'manager_id' => null,
                ]);
    }
}
