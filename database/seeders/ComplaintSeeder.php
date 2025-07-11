<?php

namespace Database\Seeders;

use App\Models\user\Complaint;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Complaint::factory()->count(50)->create();
    }
}
