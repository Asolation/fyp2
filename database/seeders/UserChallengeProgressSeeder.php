<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserChallengeProgress;
use App\Models\User;
use App\Models\Challenge;

class UserChallengeProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all users
        $users = User::all();
        $challenges = Challenge::all();

        foreach ($users as $user) {
            foreach ($challenges as $challenge) {
                UserChallengeProgress::create([
                    'user_id' => $user->id, // Use the dynamically fetched user ID
                    'challenge_id' => $challenge->id,
                    'score' => 0, // Assuming the user scored 100 on the first quest of the first quiz
                ]);
            }
        }

        if ($users->isEmpty()) {
            // Handle the case where no users exist
            echo "No users found. UserChallengeProgress seeds cannot be created.\n";
        }
    }
}
