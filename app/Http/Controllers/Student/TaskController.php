<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function complete(Request $request, Task $task)
    {
        $task->is_completed = true;
        $task->save();

        return back()->with('success', 'Task completed!');
    }
}
