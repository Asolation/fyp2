<?php

namespace App\Http\Controllers\Student;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('feedback');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'feedback' => 'required',
        ]);

        // Store the feedback in the database
        Feedback::create($validated);

        // Send a confirmation email or redirect with a success message
        return redirect('feedback')->with('success', 'Feedback submitted successfully!');
    }
}
