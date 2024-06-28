@extends('layouts.app') {{-- Assuming you have a main layout file --}}

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    .no-bullets {
        list-style-type: none;
        padding: 0;
    }
    .radio-container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 18px;
        user-select: none;
    }
    .radio-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .radio-checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
        border-radius: 50%;
        transition: background-color 0.3s;
    }
    .radio-container:hover input ~ .radio-checkmark {
        background-color: #ccc;
    }
    .radio-container input:checked ~ .radio-checkmark {
        background-color: #2196F3;
    }
    .radio-checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    .radio-container input:checked ~ .radio-checkmark:after {
        display: block;
    }
    .radio-container .radio-checkmark:after {
        top: 9px;
        left: 9px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
    .answer-text {
        margin-left: 10px;
    }
    .question-card {
        background: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        padding: 20px;
    }
    .card-header, .btn-primary {
        background-color: #2196F3;
        color: white;
    }
    .card-header {
        border-radius: 10px 10px 0 0;
    }
    .btn-primary {
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-primary:hover {
        background-color: #1976d2;
        transform: translateY(-2px);
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card question-card">
                <div class="card-header text-center">
                    <h2>{{ $quiz->title }}</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $quiz->description }}</p>
                    <form action="{{ route('quiz.calculateScore', $quiz->id) }}" method="POST" id="quizForm">
                        @csrf
                        <ul class="list-group mt-4 no-bullets">
                            @foreach($quiz->questions as $question)
                            <li class="list-group-item">
                                <strong>{{ $question->question_text }}</strong> ({{ $question->points }} Points)
                                <ul class="no-bullets question-group" id="question-{{ $question->id }}">
                                    @php
                                    $shuffledAnswers = $question->answers->shuffle();
                                    @endphp
                                    @foreach($shuffledAnswers as $answer)
                                    <li>
                                        <label class="radio-container">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}">
                                            <span class="radio-checkmark"></span>
                                            <span class="answer-text">{{ $answer->answer_text }}</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">Submit Answers</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('quizForm');
        form.addEventListener('submit', function (e) {
            const questionGroups = document.querySelectorAll('.question-group');
            let allAnswered = true;

            questionGroups.forEach(group => {
                if (!group.querySelector('input[type="radio"]:checked')) {
                    allAnswered = false;
                }
            });

            if (!allAnswered) {
                e.preventDefault(); // Prevent form submission
                alert('Please answer all questions before submitting.');
            }
        });
    });
</script>
@endsection
