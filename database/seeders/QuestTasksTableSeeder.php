<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class QuestTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tasks for Basic Cybersecurity Quest
        Task::create([
            'quest_id' => 1, // Assuming the ID of the first quest is 1
            'title' => 'Complete the Cybersecurity Basics Quiz',
            'description' => 'Test your knowledge on cybersecurity basics by taking this quiz.',
            'is_completed' => false,
        ]);

        Task::create([
            'quest_id' => 1,
            'title' => 'Read the article on phishing attacks',
            'description' => 'Learn about phishing attacks and how to protect yourself from them.',
            'is_completed' => false,
        ]);

        Task::create([
            'quest_id' => 1,
            'title' => 'Watch the video on password security',
            'description' => 'Understand the importance of strong passwords and how to create them.',
            'is_completed' => false,
        ]);

        Task::create([
            'quest_id' => 1,
            'title' => 'Take the network security course',
            'description' => 'Learn about network security and common threats to networks.',
            'is_completed' => false,
        ]);

        // Tasks for Advanced Cybersecurity Quest
        Task::create([
            'quest_id' => 2, // Assuming the ID of the second quest is 2
            'title' => 'Complete the Advanced Cybersecurity Quiz',
            'description' => 'Test your knowledge on advanced cybersecurity topics by taking this quiz.',
            'is_completed' => false,
        ]);

        Task::create([
            'quest_id' => 2,
            'title' => 'Perform a penetration test on a test network',
            'description' => 'Test the security of a network by simulating a cyber attack.',
            'is_completed' => false,
        ]);

        Task::create([
            'quest_id' => 2,
            'title' => 'Submit a report on firewall configuration',
            'description' => 'Analyze and optimize the firewall configuration of a network.',
        ]);

        Task::create([
            'quest_id' => 2,
            'title' => 'Develop a cybersecurity incident response plan',
            'description' => 'Create a plan to respond to cybersecurity incidents effectively.',
            'is_completed' => false,
        ]);
    }
}
