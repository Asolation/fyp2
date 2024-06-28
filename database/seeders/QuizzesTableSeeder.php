<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Quiz::create([
            'title' => 'Cybersecurity Basics',
            'description' => 'A quiz covering the basics of cybersecurity.',
            'time' => 30,
            'is_available' => true,
        ]);

        Quiz::create([
            'title' => 'Advanced Cybersecurity',
            'description' => 'A quiz covering advanced topics in cybersecurity.',
            'time' => 60,
            'is_available' => true,
        ]);

        Quiz::create([
            'title' => 'Network Security',
            'description' => 'A quiz focusing on network security principles and practices.',
            'time' => 45,
            'is_available' => true,
        ]);

        Quiz::create([
            'title' => 'Ethical Hacking',
            'description' => 'A quiz about ethical hacking techniques and methodologies.',
            'time' => 60,
            'is_available' => true,
        ]);
    }
}
