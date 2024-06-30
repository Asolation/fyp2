<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(UserSeedPivot::class);
        $this->call(RoleSeedPivot::class);
        $this->call(NewsSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(LeaderboardsTableSeeder::class);
        $this->call(SimulationSeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(QuizzesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(UserProgressTableSeeder::class);
        $this->call(UserChallengeProgressSeeder::class);
    }
}
