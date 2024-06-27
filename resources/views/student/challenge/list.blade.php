@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Challenges</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($challenges as $challenge)
        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-header bg-primary text-white text-center">
                    <div>{{ $challenge->title }}</div>
                    <img src="{{ asset('images/Cyber-Security-Challenges.jpg') }}" alt="Challenge" class="img-fluid mb-2" style="width: 100px;">
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $challenge->description }}</p>
                    <p class="card-text">{{ $challenge->objective }}</p>
                    <p class="card-text">Difficulty: {{ $challenge->difficultyLevel }}</p>
                    <p class="card-text">Points: {{ $challenge->points }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('student.challenges.password-game') }}" class="btn btn-sm btn-outline-secondary">Start challenge</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p class="text-center">No simulationzes available at the moment. Please check back later.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
