@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1 class="mb-4">Simulations</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($quizzes as $quiz)
        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-header bg-primary text-white text-center">
                    <div>{{ $quiz->title }}</div>
                    <img src="{{ asset('images/CYBER-SECURITY-QUIZ.jpeg') }}" alt="Quiz" class="img-fluid mb-2" style="width: 100px;">
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $quiz->description }}</p>
                    {{-- <p class="card-text">Number of Questions: {{ $quiz->numberOfQuestions }}</p>
                    <p class="card-text">Duration: {{ $quiz->duration }}</p>
                    <p class="card-text">Difficulty Level: {{ $quiz->difficultyLevel }}</p>
                    <p class="card-text">Points: {{ $quiz->points }}</p> --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-sm btn-outline-secondary">Start Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p class="text-center">No quizzes available at the moment. Please check back later.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
