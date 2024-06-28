<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Challenge;
use App\Models\Simulation;
use App\Models\Quiz;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $quizzes = Quiz::all();
        $questions = Question::all();
        $challenges = Challenge::all();
        $simulations = Simulation::all();

        return view('admin.dashboard', ['users' => $users, 'challenges' => $challenges, 'simulations' => $simulations, 'quizzes' => $quizzes, 'questions' => $questions]);
    }
}
