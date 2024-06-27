<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Quest;
use App\Models\UserProgress;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::all();
        return view('student.quests.index', compact('quests'));
    }

    public function show(Quest $quest)
    {
        $userProgress = UserProgress::where('user_id', Auth::id())
                                      ->where('quest_id', $quest->id)
                                      ->first();
        return view('student.quests.show', compact('quest', 'userProgress'));
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

        return redirect()->route('student.quests.index')->with('alert', 'Quest completed!');
    }
}
