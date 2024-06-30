@extends('layouts.app')

@section('content')
    <style>
        .container_success {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #0072ff;
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: bold;
        }
        p {
            font-size: 1.3em;
            margin-bottom: 30px;
            color: #333333;
        }
        .btn {
            font-size: 1.2em;
            padding: 10px 20px;
            background-color: #0072ff;
            border: none;
            border-radius: 8px;
            color: white;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #005bb5;
        }
    </style>
    <div class="container_success">
        <h1>Congratulations!</h1>
        <p>You have successfully met all the password requirements.</p>
        <a href="/password-game" class="btn btn-primary">Play Again</a>
    </div>
@endsection
