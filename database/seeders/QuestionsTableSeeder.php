<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Questions for Cybersecurity Basics
        Question::create([
            'quiz_id' => 1, // Cybersecurity Basics
            'question_text' => 'What is the most common form of cyber attack?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 1,
            'question_text' => 'What does VPN stand for?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 1,
            'question_text' => 'What is phishing?',
            'points' => 10,
        ]);

        // Questions for Advanced Cybersecurity
        Question::create([
            'quiz_id' => 2, // Advanced Cybersecurity
            'question_text' => 'What is a zero-day vulnerability?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 2,
            'question_text' => 'What is the purpose of a firewall?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 2,
            'question_text' => 'What is penetration testing?',
            'points' => 10,
        ]);

        // Questions for Network Security
        Question::create([
            'quiz_id' => 3, // Network Security
            'question_text' => 'What is a network protocol?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 3,
            'question_text' => 'What is the function of a router?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 3,
            'question_text' => 'What is a DDoS attack?',
            'points' => 10,
        ]);

        // Questions for Ethical Hacking
        Question::create([
            'quiz_id' => 4, // Ethical Hacking
            'question_text' => 'What is ethical hacking?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 4,
            'question_text' => 'What is the difference between black hat and white hat hackers?',
            'points' => 10,
        ]);

        Question::create([
            'quiz_id' => 4,
            'question_text' => 'What is social engineering?',
            'points' => 10,
        ]);
    }
}
