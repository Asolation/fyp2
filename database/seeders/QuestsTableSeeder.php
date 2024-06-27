<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quest;

class QuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quest::create([
            'title' => 'Basic Cybersecurity',
            'description' => 'Complete basic cybersecurity tasks to earn points.',
            'points' => 50,
        ]);

        Quest::create([
            'title' => 'Advanced Cybersecurity',
            'description' => 'Complete advanced cybersecurity tasks to earn more points.',
            'points' => 100,
        ]);
    }
}
