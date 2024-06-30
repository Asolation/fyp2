@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-white text-center">Challenges</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($challenges as $challenge)
        <div class="col">
            <div class="card h-100 shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">{{ $challenge->title }}</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <img src="{{ asset('images/Cyber-Security-Challenges.jpg') }}" alt="Challenge" class="img-fluid rounded mb-3">
                    <p class="card-text text-muted">{{ $challenge->description }}</p>
                    <p class="card-text"><strong>Difficulty:</strong> {{ $challenge->difficultyLevel }}</p>
                    <p class="card-text"><strong>Points:</strong> {{ $challenge->points }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('student.challenges.password-game') }}" class="btn btn-primary w-100">Start Challenge</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p class="text-center">No challenges available at the moment. Please check back later.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
