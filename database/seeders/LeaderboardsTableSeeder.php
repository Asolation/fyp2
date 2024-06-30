<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Leaderboard;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class LeaderboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming 'user' role exists
        $userRoleId = Role::where('title', 'user')->first()->id;

        // Fetch users with 'user' role
        $users = User::whereHas('roles', function ($query) use ($userRoleId) {
            $query->where('roles.id', '=', $userRoleId);
        })->get();

        // Create leaderboard entries for users with 'user' role
        $users->each(function ($user) {
            Leaderboard::firstOrCreate(
                ['user_id' => $user->id],
                ['points' => $user->points ?? 0]
            );
        });
    }
}
