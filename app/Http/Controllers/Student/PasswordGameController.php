<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordGameController extends Controller
{
    public function index()
    {
        return view('student.challenge.password-game');
    }

    public function check(Request $request)
    {
        $password = $request->input('password');
        $requirements = $this->validatePassword($password);

        return response()->json(['requirements' => $requirements]);
    }

    private function validatePassword($password)
    {
        $requirements = [];

        $requirements[] = [
            'message' => 'At least 8 characters',
            'valid' => strlen($password) >= 8
        ];

        $requirements[] = [
            'message' => 'Contains an uppercase letter',
            'valid' => preg_match('/[A-Z]/', $password)
        ];

        $requirements[] = [
            'message' => 'Contains a lowercase letter',
            'valid' => preg_match('/[a-z]/', $password)
        ];

        $requirements[] = [
            'message' => 'Contains a number',
            'valid' => preg_match('/[0-9]/', $password)
        ];

        $requirements[] = [
            'message' => 'Contains a special character',
            'valid' => preg_match('/[\W_]/', $password)
        ];

        return $requirements;
    }
}
