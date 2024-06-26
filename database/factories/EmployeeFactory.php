<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    private static string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $manager = Employee::all()->random(); // Get a random manager

        return [
            'full_name' => fake()->name(),
            'age' => fake()->numberBetween(20,124),
            'salary' => fake()->numberBetween(500,2000),
            'date_of_employment' => fake()->date("Y-m-d","now"),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password,
            'manager_id'=> $manager ? $manager->id : null,
        ];
    }
}
