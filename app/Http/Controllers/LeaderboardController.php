<?php

namespace App\Http\Controllers;

use App\Models\Leaderboard;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $leaderboard = Leaderboard::with('user') // Ensure you're loading the user relationship
                                    ->orderBy('points', 'DESC')
                                    ->get();
        return view('student.leaderboard', compact('leaderboard'));
    }
}
