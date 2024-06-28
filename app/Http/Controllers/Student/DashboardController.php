<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Badge;
use App\Models\Leaderboard;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $data = [
            'username' => 'Username',
            'studentName' => 'Student Name',
            'studentDescription' => 'Brief description about the student',
            'badges' => Badge::all(),
            'skills' => ['Skill 1', 'Skill 2', 'Skill 3'],
            'leaderboard' => Leaderboard::all()
        ];

        // Assuming you have the authenticated user's points. This might come from the database.
        $userPoints = auth()->user()->points; // Example: Getting points from the authenticated user
        $maxPoints = 100; // Define the maximum points possible
        $progressPercentage = ($userPoints / $maxPoints) * 100; // Calculate the progress percentage
        return view('student.dashboard', $data, compact('progressPercentage'));
    }
}
