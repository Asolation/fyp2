@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1 class="mb-4 text-center">Quizzes</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($quizzes as $quiz)
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">{{ $quiz->title }}</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <img src="{{ asset('images/CYBER-SECURITY-QUIZ.jpeg') }}" alt="Quiz" class="img-fluid rounded mb-3">
                    <p class="card-text text-muted">{{ $quiz->description }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('quizzes.show', $quiz->id) }}" class="btn btn-primary w-100">Start Quiz</a>
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

<style>
    .card-header {
        background-color: #007bff;
        color: white;
        border-bottom: none;
        border-top-left-radius: calc(.25rem - 1px);
        border-top-right-radius: calc(.25rem - 1px);
    }
    .card-body {
        background-color: #f8f9fa;
        padding: 1.25rem;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, transform 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>
