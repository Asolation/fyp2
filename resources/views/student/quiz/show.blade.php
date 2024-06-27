@extends('layouts.app')

@section('content')
<style>
    /* Remove bullet points */
    .no-bullets {
        list-style-type: none;
        padding-left: 0;
    }

    /* Animation for radio buttons */
    .radio-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
        margin-right: 15px;
        user-select: none; /* Prevent text selection */
    }

    .radio-container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .radio-checkmark {
        position: relative;
        height: 20px;
        width: 20px;
        background-color: #eee;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .radio-container:hover .radio-checkmark {
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
        top: 6px;
        left: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    /* Animation for answer text */
    .radio-container .answer-text {
        display: inline-block;
        margin-left: 10px;
        transition: color 0.3s, transform 0.3s;
    }

    .radio-container:hover .answer-text {
        color: #2196F3;
        transform: scale(1.1);
    }


</style>
<div class="container">
    {{-- Display alert message --}}

    <h1>{{ $quiz->title }}</h1>
    <p>{{ $quiz->description }}</p>
    <form action="{{ route('quiz.calculateScore', $quiz->id) }}" method="POST">
        @csrf
        <ul class="list-group mt-4 no-bullets">
            @foreach($quiz->questions as $question)
            <li class="list-group-item">
                <strong>{{ $question->question_text }}</strong> ({{ $question->points }} Points)
                @php
                // Clone the answers collection to avoid modifying the original collection
                $shuffledAnswers = $question->answers->shuffle();
                @endphp
                <ul class="no-bullets">
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
        <button type="submit" class="btn btn-primary mt-4">Submit Answers</button>
    </form>
</div>
@endsection
