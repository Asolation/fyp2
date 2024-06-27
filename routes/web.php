<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    // student only
    Route::get('dashboard', [App\Http\Controllers\Student\DashboardController::class, 'showDashboard'])->name('student.dashboard');
    Route::get('feedback', [App\Http\Controllers\Student\FeedbackController::class, 'index'])->name('feedback');
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

        //Quests
        Route::get('quests', [App\Http\Controllers\Student\QuestController::class, 'index'])->name('quests.index');
        Route::get('quests/{quest}', [App\Http\Controllers\Student\QuestController::class, 'show'])->name('quests.show');
        Route::post('quests/{quest}/complete', [App\Http\Controllers\Student\QuestController::class, 'complete'])->name('quests.complete');

    // admin only
    Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');

        // users
        Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
        Route::delete('roles_mass_destroy', [\App\Http\Controllers\Admin\RoleController::class, 'massDestroy'])->name('roles.mass_destroy');
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::delete('users_mass_destroy', [\App\Http\Controllers\Admin\UserController::class, 'massDestroy'])->name('users.mass_destroy');

        // categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::delete('categories_mass_destroy', [\App\Http\Controllers\Admin\CategoryController::class, 'massDestroy'])->name('categories.mass_destroy');

        // questions
        Route::resource('questions', \App\Http\Controllers\Admin\QuestionController::class);
        Route::delete('questions_mass_destroy', [\App\Http\Controllers\Admin\QuestionController::class, 'massDestroy'])->name('questions.mass_destroy');

        // options
        Route::resource('options', \App\Http\Controllers\Admin\OptionController::class);
        Route::delete('options_mass_destroy', [\App\Http\Controllers\Admin\OptionController::class, 'massDestroy'])->name('options.mass_destroy');

        // results
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
