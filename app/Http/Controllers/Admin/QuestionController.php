<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\QuestionRequest;

class QuestionController extends Controller
{

    public function index(): View
    {
        $questions = Question::all();

        return view('admin.quiz.questions.index', compact('questions'));
    }

    public function create(): View
    {
        $quizzess = Quiz::all()->pluck('title', 'id');

        return view('admin.quiz.questions.create', compact('quizzess'));
    }

    public function store(QuestionRequest $request): RedirectResponse
    {
        Question::create($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Question $question): View
    {
        return view('admin.quiz.questions.show', compact('question'));
    }

    public function edit(Question $question): View
    {
        $quizzess = Quiz::all()->pluck('name', 'id');

        return view('admin.quiz.questions.edit', compact('question', 'quizzess'));
    }

    public function update(QuestionRequest $request, Question $question): RedirectResponse
    {
        $question->update($request->validated());

        return redirect()->route('admin.questions.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Question::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
