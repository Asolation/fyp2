<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $simulations = [
            [
                'title' => 'SQL Injection Simulation',
                'description' => 'Learn how to identify and mitigate SQL injection attacks through an interactive simulation.',
                'objective' => 'Prevent unauthorized access via SQL injection.',
                'duration' => 30,
                'complexityLevel' => 'Medium',
                'points' => 50,
                'available' => 1,
                'created_at' => '2024-06-24 09:00:00',
                'updated_at' => '2024-06-24 09:00:00',
            ],
            [
                'title' => 'XSS Attack Simulation',
                'description' => 'Understand and prevent cross-site scripting (XSS) attacks with practical examples.',
                'objective' => 'Protect web applications from XSS attacks.',
                'duration' => 45,
                'complexityLevel' => 'Hard',
                'points' => 70,
                'available' => 1,
                'created_at' => '2024-06-24 10:00:00',
                'updated_at' => '2024-06-24 10:00:00',
            ],
            [
                'title' => 'Password Cracking Challenge',
                'description' => 'Simulate and defend against various password cracking techniques.',
                'objective' => 'Enhance password policies and security.',
                'duration' => 25,
                'complexityLevel' => 'Easy',
                'points' => 30,
                'available' => 1,
                'created_at' => '2024-06-24 11:00:00',
                'updated_at' => '2024-06-24 11:00:00',
            ],
            [
                'title' => 'Network Forensics Training',
                'description' => 'Analyze network traffic to detect and respond to malicious activities.',
                'objective' => 'Develop skills in network forensics and incident response.',
                'duration' => 60,
                'complexityLevel' => 'Medium',
                'points' => 60,
                'available' => 1,
                'created_at' => '2024-06-24 12:00:00',
                'updated_at' => '2024-06-24 12:00:00',
            ],
            [
                'title' => 'Malware Analysis Workshop',
                'description' => 'Dissect and analyze malware to understand its behavior and mitigate threats.',
                'objective' => 'Improve malware analysis and threat detection skills.',
                'duration' => 90,
                'complexityLevel' => 'Very Hard',
                'points' => 100,
                'available' => 1,
                'created_at' => '2024-06-24 13:00:00',
                'updated_at' => '2024-06-24 13:00:00',
            ]
            // Add more simulations here...
        ];

        foreach ($simulations as $simulation) {
            $simulation['created_at'] = now();
            $simulation['updated_at'] = now();
            DB::table('simulations')->insert($simulation);
        }
    }
}
