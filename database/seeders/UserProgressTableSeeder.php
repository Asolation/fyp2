<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserProgress;
use App\Models\Quiz;
use App\Models\Challenge;
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
        $quizzes = Quiz::all();

        foreach ($users as $user) {
            foreach ($quizzes as $quiz) {
                UserProgress::create([
                    'user_id' => $user->id, // Use the dynamically fetched user ID
                    'quiz_id' => $quiz->id,
                    'score' => 0, // Assuming the user scored 100 on the first quest of the first quiz
                ]);
            }
        }

        if ($users->isEmpty()) {
            // Handle the case where no users exist
            echo "No users found. UserProgress seeds cannot be created.\n";
        }
    }
}
