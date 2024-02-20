<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'Juneill',
            'last_name' => 'Leonorr',
            'middle_name' => 'Yap',
            'email' => 'leonorjuneil2@gmail.com',
            'password' => 'akopatawa4321',
        ];
    }
}
