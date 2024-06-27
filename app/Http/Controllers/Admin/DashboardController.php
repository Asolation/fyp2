<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use App\Models\Question;
use App\Models\Challenge;
use App\Models\Simulation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $quizzes = Category::all();
        $questions = Question::all();
        $challenges = Challenge::all();
        $simulations = Simulation::all();

        return view('admin.dashboard', ['users' => $users, 'quizzes' => $quizzes , 'questions' => $questions, 'challenges' => $challenges, 'simulations' => $simulations]);
    }
}
