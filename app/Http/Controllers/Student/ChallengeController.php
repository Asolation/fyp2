<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    public function index()
    {
        return view('student.challenge.list' , ['challenges' => Challenge::all()]);
    }
}
