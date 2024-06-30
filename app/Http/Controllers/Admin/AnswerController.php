<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AnswerRequest;

class AnswerController extends Controller
{

    public function index(): View
    {
        $answers = Answer::all();
        return view('admin.quiz.answer.index', compact('answers'));
    }

    public function create(): View
    {
        $questions = Question::pluck('question_text', 'id');
        return view('admin.quiz.answer.create' , compact('questions'));
    }

    public function store(AnswerRequest $request): RedirectResponse
    {
        Answer::create($request->validated());

        return redirect()->route('admin.answers.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Answer $answer): View
    {
        return view('admin.quiz.answer.show', compact('answer'));
    }

    public function edit(Answer $answer): View
    {
        $questions = Question::all()->pluck('question_text', 'id');
        return view('admin.quiz.answer.edit', compact('answer' , 'questions'));
    }

    public function update(AnswerRequest $request, Answer $answer): RedirectResponse
    {
        $answer->update($request->validated());

        return redirect()->route('admin.answers.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Answer $answer): RedirectResponse
    {
        $answer->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function massDestroy()
    {
        Answer::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
