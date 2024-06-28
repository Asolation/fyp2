<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\QuizRequest;

class QuizController extends Controller
{

    public function index(): View
    {
        $quizzess = Quiz::all();

        return view('admin.quiz.index', compact('quizzess'));
    }

    public function create(): View
    {
        return view('admin.quiz.create');
    }

    public function store(QuizRequest $request): RedirectResponse
    {
        Quiz::create($request->validated());

        return redirect()->route('admin.quizzess.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Quiz $quiz): View
    {
        return view('admin.quizzess.show', compact('quiz'));
    }

    public function edit($id): View
    {
        $quiz = Quiz::findOrFail($id);
        return view('admin.quiz.edit', compact('quiz'));
    }

    public function update(QuizRequest $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());
        return redirect()->route('admin.quizzess.index')->with('success', 'Quiz updated successfully');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('admin.quizzess.index')->with('success', 'Quiz deleted successfully.');
    }

    public function massDestroy()
    {
        Quiz::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
