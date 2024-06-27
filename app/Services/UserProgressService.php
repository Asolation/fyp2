<?php
namespace App\Services;

use App\Models\Quiz;
use App\Models\User;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class UserProgressService
{
    public function storeProgress($quizId, $score)
    {
        $userProgress = UserProgress::updateOrCreate(
            ['user_id' => Auth::id(), 'quiz_id' => $quizId],
            ['score' => $score]
        );

        return $userProgress;
    }
}
