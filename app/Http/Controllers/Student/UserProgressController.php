<?php

namespace App\Http\Controllers\Student;

use App\Models\Quiz;
use App\Models\UserProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProgressController extends Controller
{
    public function index()
    {
        $quests = Quest::all();
        return view('quests.index', compact('quests'));
    }

    public function show(Quest $quest)
    {
        $userProgress = UserProgress::where('user_id', Auth::id())
                                      ->where('quest_id', $quest->id)
                                      ->first();
        return view('quests.show', compact('quest', 'userProgress'));
    }

    public function complete(Request $request, Quest $quest)
    {
        $userProgress = UserProgress::firstOrCreate(
            ['user_id' => Auth::id(), 'quest_id' => $quest->id],
            ['completed' => false]
        );

        if (!$userProgress->completed) {
            $userProgress->completed = true;
            $userProgress->save();

            // Award points to the user
            $user = Auth::user();
            $user->points += $quest->points;
            $user->save();
        }

        return redirect()->route('quests.index')->with('alert', 'Quest completed!');
    }
}
