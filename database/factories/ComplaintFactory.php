<?php

namespace Database\Factories;

use App\Models\user\Complaint;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user\Complaint>
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
            'category'=>fake()->randomElement(['Facilities','Faculty','Admission','Cashier','Registrar']),
            'location'=>fake()->address(),
            'title'=>fake()->sentence(6),
            'description'=>fake()->paragraph(),
            'incident_time'=>fake()->dateTimeBetween('-1 year', 'now'),
            'priority'=>fake()->randomElement(['Low', 'Medium', 'High']),
            'image_path'=>fake()->imageUrl(),
            'is_anonymous'=>fake()->boolean(),
            'type_submit'=>fake()->randomElement(['Online', 'In Person']),
            'full_name'=>fake()->name(),
            'student_id_number'=>fake()->numerify('20#######'),
            'email'=>fake()->safeEmail(),
            'phone_number'=>fake()->phoneNumber(),
            'year_section'=>fake()->randomElement(['1st Year BSIT BT-107', '2nd Year BSIT BT-307', '3rd 1st Year BSIT BT-607']),
            'consent_given'=>fake()->boolean(),
            'status'=>fake()->randomElement(['Pending', 'In Progress', 'Resolved']),
            'complaint_tracker'=>fake()->uuid(),
        ];
    }
}
