@extends('layouts.app')

@section('content')
<div class="container py-5">
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1 class="mb-4 text-white text-center">Quizzes</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($quizzes as $quiz)
        <div class="col">
            <div class="card h-100 shadow-lg border-0">
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
