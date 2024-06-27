<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\UserProgress;


class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('student.quiz.list', compact('quizzes'));
    }

    public function create()
    {
        return view('student.quiz.create');
    }

    public function store(Request $request)
    {
        $quiz = Quiz::create($request->all());
        return redirect()->route('student.quiz.list');
    }

    public function show(Quiz $quiz)
    {
        return view('student.quiz.show', compact('quiz'));
    }

    public function calculateScore(Request $request, $quizId)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($quizId);
        $submittedAnswers = $request->input('answers', []);
        $score = 0;

        foreach ($quiz->questions as $question) {
            $correctAnswer = $question->answers->where('is_correct', 1)->first();
            if ($correctAnswer && array_key_exists($question->id, $submittedAnswers) && $submittedAnswers[$question->id] == $correctAnswer->id) {
                $score += $question->points;
            }
        }

        $userId = auth()->id();

        if ($score > 0) {
            // Update the user's score in the `user` table only if score is greater than 0
            $user = User::find($userId);
            // This is an example of setting the latest score, adjust according to your needs
            $user->points += $score; // Or $user->score += $score; for cumulative
            $user->save();
        }
    ;

        // Check for an existing UserProgress entry
        $userProgress = UserProgress::where('user_id', $userId)->where('quiz_id', $quizId)->first();

        if ($userProgress) {
            // Update the existing entry with the new score
            $userProgress->score = $score;
            $userProgress->save();
        } else {
            // Create a new entry if no existing entry was found
            UserProgress::create([
                'user_id' => $userId,
                'quiz_id' => $quizId,
                'score' => $score,
                // Add any other necessary fields
            ]);
        }

        $quizName = Quiz::where('id', $quizId)->first()->title; // Assuming the quiz name field is 'name'
        return redirect()->route('student.quiz.list')
                ->with('score', $score)
                ->with('quizName', $quizName) // Assuming $quizName contains the name of the quiz
                ->with('alert', 'You completed the quiz of "' . $quizName . '" with a score of: ' . $score);
    }
}
