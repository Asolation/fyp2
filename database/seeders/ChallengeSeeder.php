<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Challenge;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $challenges = [
            [
                'title' => 'Password Game',
                'description' => 'In this challenge, players learn to create strong, secure passwords to protect their accounts. The game emphasizes password complexity and teaches techniques to avoid common vulnerabilities.',
                'difficultyLevel' => 'Easy',
                'points' => 50,
                'available' => 1,
            ],
            [
                'title' => 'SQL Injection Game',
                'description' => 'Learn how to identify and mitigate SQL injection attacks.',
                'difficultyLevel' => 'Medium',
                'points' => 50,
                'available' => 0,
            ],
            [
                'title' => 'XSS Challenge',
                'description' => 'Understand and prevent cross-site scripting (XSS) attacks.',
                'difficultyLevel' => 'Hard',
                'points' => 70,
                'available' => 0,
            ],
            [
                'title' => 'Password Cracking',
                'description' => 'Simulate and defend against password cracking techniques.',
                'difficultyLevel' => 'Easy',
                'points' => 30,
                'available' => 0,
            ],
            [
                'title' => 'Network Forensics',
                'description' => 'Analyze network traffic to detect malicious activities.',
                'difficultyLevel' => 'Medium',
                'points' => 60,
                'available' => 0,
            ],
            [
                'title' => 'Malware Analysis',
                'description' => 'Dissect and analyze malware to understand its behavior.',
                'difficultyLevel' => 'Very Hard',
                'points' => 100,
                'available' => 0,
            ],
        ];

        foreach ($challenges as $challenge) {
            $challenge['created_at'] = now();
            $challenge['updated_at'] = now();
            Challenge::create($challenge);
        }
    }
}
