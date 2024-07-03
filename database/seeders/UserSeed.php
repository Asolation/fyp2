<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'           => 'Admin',
                'email'          => 'admin@example.com',
                'password'       => bcrypt('123'),
                'remember_token' => null,
                'points'         => 0,
            ],
            [
                'name'           => 'Sol',
                'email'          => 'student@example.com',
                'password'       => bcrypt('12341'),
                'remember_token' => null,
                'points'         => 100,
            ],
            [
                'name'           => 'Solomon',
                'email'          => 'student2@example.com',
                'password'       => bcrypt('12341'),
                'remember_token' => null,
                'points'         => 300,
            ],
            [
                'name'           => 'Adam',
                'email'          => 'adam@example.com',
                'password'       => bcrypt('12341'),
                'remember_token' => null,
                'points'         => 500,
            ],
        ];

        User::insert($users);
    }
}
