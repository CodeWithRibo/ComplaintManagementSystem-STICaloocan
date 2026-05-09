<?php

namespace Database\Seeders;

use App\Models\user\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //to initiate the fresh artisan
        $this->call(ComplaintSeeder::class);

        User::query()->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'student_id_number' => '02000411496',
            'grade_level' => '2nd Year',
            'program' => 'IT',
            'section' => 'A',
            'contact_number' => '09123456789',
        ]);
    }
}
