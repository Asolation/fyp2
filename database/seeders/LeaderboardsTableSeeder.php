<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the IDs of users with role_id of 2
        $userIds = DB::table('role_user')->where('role_id', 2)->pluck('user_id');

        // Get the users with those IDs
        $users = User::whereIn('id', $userIds)->get();

        // Loop through the users and do your seeding
        foreach ($users as $user) {
            DB::table('leaderboards')->insert([
                'user_id' => $user->id,
                'points' => rand(1, 100), // Replace with your logic for points
            ]);
        }
    }
}
