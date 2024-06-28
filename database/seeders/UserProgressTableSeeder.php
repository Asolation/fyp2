<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProgress;
use App\Models\User;

class UserProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Fetch all users
        $users = User::all();

        foreach ($users as $user) {
            UserProgress::create([
                'user_id' => $user->id, // Use the dynamically fetched user ID
                'quiz_id' => 1, // Assuming the ID of the first quiz is 1
                // 'quest_id' => 1, // Assuming the ID of the first quest is 1
                'score' => 100, // Assuming the user scored 100 on the first quest of the first quiz
            ]);

            UserProgress::create([
                'user_id' => $user->id, // Use the same user ID for consistency
                'quiz_id' => 2, // Assuming the ID of the second quiz is 2
                // 'quest_id' => 1, // Assuming the ID of the first quest is 1
                'score' => 100, // Assuming the user scored 100 on the first quest of the second quiz
            ]);
        }

        if ($users->isEmpty()) {
            // Handle the case where no users exist
            echo "No users found. UserProgress seeds cannot be created.\n";
        }
    }
}
