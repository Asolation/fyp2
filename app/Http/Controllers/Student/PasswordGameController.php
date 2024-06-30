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

        $allValid = collect($requirements)->every(fn($req) => $req['valid']);
        $score = collect($requirements)->filter(fn($req) => $req['valid'])->count();

        $redirectUrl = $allValid ? '/password-game/success' : null; // URL to redirect if all requirements are met

        return response()->json(['requirements' => $requirements, 'allValid' => $allValid, 'score' => $score, 'redirectUrl' => $redirectUrl]);
    }

    private function validatePassword($password)
    {
        $requirements = [];

        $requirements[] = [
            'message' => 'At least 8 characters',
            'valid' => strlen($password) >= 8,
            'hint' => 'Try adding more characters to your password.'
        ];

        $requirements[] = [
            'message' => 'Contains an uppercase letter',
            'valid' => preg_match('/[A-Z]/', $password),
            'hint' => 'Include at least one uppercase letter (A-Z).'
        ];

        $requirements[] = [
            'message' => 'Contains a lowercase letter',
            'valid' => preg_match('/[a-z]/', $password),
            'hint' => 'Include at least one lowercase letter (a-z).'
        ];

        $requirements[] = [
            'message' => 'Contains a number',
            'valid' => preg_match('/[0-9]/', $password),
            'hint' => 'Include at least one number (0-9).'
        ];

        $requirements[] = [
            'message' => 'Contains a special character',
            'valid' => preg_match('/[\W_]/', $password),
            'hint' => 'Include at least one special character (!, @, #, etc.).'
        ];

        $requirements[] = [
            'message' => 'No repeated characters consecutively',
            'valid' => !preg_match('/(.)\\1/', $password),
            'hint' => 'Avoid using repeated characters in a row.'
        ];

        $requirements[] = [
            'message' => 'No sequential characters',
            'valid' => !preg_match('/123|234|345|456|567|678|789|890|abc|bcd|cde|def|efg|fgh|ghi|hij|ijk|jkl|klm|lmn|mno|nop|opq|pqr|qrs|rst|stu|tuv|uvw|vwx|wxy|xyz/i', $password),
            'hint' => 'Avoid using sequential characters like "123" or "abc".'
        ];

        $requirements[] = [
            'message' => 'Mix of at least three different character types',
            'valid' => preg_match('/[a-z]/', $password) + preg_match('/[A-Z]/', $password) + preg_match('/[0-9]/', $password) + preg_match('/[\W_]/', $password) >= 3,
            'hint' => 'Use a mix of at least three different character types (lowercase, uppercase, numbers, special characters).'
        ];

        $commonPasswords = ['123456', 'password', '123456789', '12345678', '12345', '1234567', 'qwerty', 'abc123'];
        $requirements[] = [
            'message' => 'Not a common password',
            'valid' => !in_array($password, $commonPasswords),
            'hint' => 'Avoid using common passwords like "123456" or "password".'
        ];

        $dictionaryWords = ['password', 'welcome', 'dragon', 'monkey'];
        $requirements[] = [
            'message' => 'Does not contain dictionary words',
            'valid' => !preg_match('/' . implode('|', $dictionaryWords) . '/i', $password),
            'hint' => 'Avoid using dictionary words.'
        ];

        $requirements[] = [
            'message' => 'Not a palindrome',
            'valid' => $password !== strrev($password),
            'hint' => 'Avoid using palindromes (same forwards and backwards).'
        ];

        return $requirements;
    }

    public function success()
    {
        return view('student.challenge.success');
    }
}
