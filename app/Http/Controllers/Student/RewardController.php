<?php

namespace App\Http\Controllers\Student;

use App\Models\Reward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    public function index()
    {
        $rewards = Reward::all();
        return view('rewards.index', compact('rewards'));
    }
}
