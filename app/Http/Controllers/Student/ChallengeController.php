<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Models\Challenge;
use App\Http\Controllers\Controller;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::where('available', true)->get();
        return view('student.challenge.list', compact('challenges'));
    }

    public function complete(Request $request, $id)
    {
        $challenge = Challenge::findOrFail($id);
        $user = Auth::user();

        $userChallenge = UserChallenge::firstOrCreate([
            'user_id' => $user->id,
            'challenge_id' => $challenge->id
        ]);

        $userChallenge->completed = true;
        $userChallenge->save();

        return redirect()->route('student.challenge.list')->with('status', 'Challenge completed! You earned ' . $challenge->points . ' points.');
    }
}
