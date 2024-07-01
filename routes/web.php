<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    // student only
    Route::get('dashboard', [App\Http\Controllers\Student\DashboardController::class, 'showDashboard'])->name('student.dashboard');
        //Simulations
        Route::get('simulation', [App\Http\Controllers\Student\SimulationController::class, 'index'])->name('student.simulation');

        //Quizzes
        Route::get('quiz', [App\Http\Controllers\Student\QuizController::class, 'index'])->name('student.quiz.list');
        Route::resource('user_progress', App\Http\Controllers\Student\UserProgressController::class);
        Route::get('quizzes/{quiz}', [App\Http\Controllers\Student\QuizController::class, 'show'])->name('quizzes.show');
        Route::post('/quiz/{id}/submit', [App\Http\Controllers\Student\QuizController::class, 'calculateScore'])->name('quiz.calculateScore');
        Route::get('quizzes/{quiz}/questions/{question}', [App\Http\Controllers\Student\QuestionController::class, 'show'])->name('questions.show');
        Route::get('questions/{question}/answers/{answer}', [App\Http\Controllers\Student\AnswerController::class, 'show'])->name('answers.show');

        //Challenges
        Route::get('challenges', [App\Http\Controllers\Student\ChallengeController::class, 'index'])->name('student.challenges');
        Route::get('password-game', [App\Http\Controllers\Student\PasswordGameController::class, 'index'])->name('student.challenges.password-game');
        Route::post('password-game/check', [App\Http\Controllers\Student\PasswordGameController::class, 'check']);
        Route::get('password-game/success', [App\Http\Controllers\Student\PasswordGameController::class, 'success'])->name('student.challenges.password-game.success');

        //Quests
        Route::get('quests', [App\Http\Controllers\Student\QuestController::class, 'index'])->name('quests.index');
        Route::get('quests/{quest}', [App\Http\Controllers\Student\QuestController::class, 'show'])->name('quests.show');
        Route::post('quests/{quest}/complete', [App\Http\Controllers\Student\QuestController::class, 'complete'])->name('quests.complete');

        //Feedback
        Route::get('feedback', [App\Http\Controllers\Student\FeedbackController::class, 'index'])->name('feedback');
        Route::post('feedback', [App\Http\Controllers\Student\FeedbackController::class, 'store'])->name('feedback.store');

        //Leaderboard
        Route::get('leaderboard', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard');

    // admin only
    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

        // users
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

        // Quizzes
        Route::resource('quizzess', \App\Http\Controllers\Admin\QuizController::class);
        Route::delete('quizzess_mass_destroy', [\App\Http\Controllers\Admin\QuizController::class, 'massDestroy'])->name('quizzess.mass_destroy');

        // Questions
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::delete('questions_mass_destroy', [\App\Http\Controllers\Admin\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');

        // Answers
        Route::resource('answers', \App\Http\Controllers\Admin\AnswerController::class);
        Route::delete('answers_mass_destroy', [\App\Http\Controllers\Admin\AnswerController::class, 'massDestroy'])->name('answers.mass_destroy');

        // Results
        Route::resource('results', \App\Http\Controllers\Admin\ResultController::class);
        Route::delete('results_mass_destroy', [\App\Http\Controllers\Admin\ResultController::class, 'massDestroy'])->name('results.mass_destroy');

        //simulations
        Route::resource('simulations', \App\Http\Controllers\Admin\SimulationController::class);
        Route::delete('simulation_mass_destroy', [\App\Http\Controllers\Admin\SimulationController::class, 'massDestroy'])->name('simulation.mass_destroy');

        //challenges
        Route::resource('challenges', \App\Http\Controllers\Admin\ChallengeController::class);
        Route::delete('challenges_mass_destroy', [\App\Http\Controllers\Admin\ChallengeController::class, 'massDestroy'])->name('challenges.mass_destroy');
    });

});

Auth::routes();
