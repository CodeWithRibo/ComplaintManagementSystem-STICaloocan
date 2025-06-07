<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Complaint;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Complaint::class;
    public function definition(): array
    {
        return [
            'title'=>fake()->word(),
            'description'=>fake()->realText(),
            'categorySelection'=>fake()->randomElement(['Facilities','Faculty','Admission','Cashier','Registrar']),
            'priorityLevel'=>fake()->randomElement(['Low','Mid','High']),
            'timeIncident'=>fake()->dateTime(),
        ];
    }
}
