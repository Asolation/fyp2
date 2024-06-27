<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Badge;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Badge::create([
            'name' => 'Certificate of Completion',
            'description' => 'Awarded for completing all quizzes.',
            'points_required' => 50,
        ]);

        Badge::create([
            'name' => 'Cybersecurity Badge',
            'description' => 'Awarded for scoring above 80% in all quizzes.',
            'points_required' => 100,
        ]);
    }
}
