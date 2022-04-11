<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Employee::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'function' => $this->faker->jobTitle(),
        ];
    }
}
