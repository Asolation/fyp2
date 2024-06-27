<?php

namespace App\Http\Controllers\Student;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        $question->answers()->create($request->all());
        return redirect()->route('quizzes.show', $question->quiz);
    }
}
