@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-white text-center">Simulations</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($simulations as $simulation)
        <div class="col">
            <div class="card h-100 shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">{{ $simulation->title }}</h5>
                </div>
                <div class="card-body d-flex flex-column">
                    <img src="{{ asset('images/CEOdb-1.png') }}" alt="Simulation" class="img-fluid rounded mb-3">
                    <p class="card-text text-muted">{{ $simulation->description }}</p>
                    <p class="card-text"><strong>Objective:</strong> {{ $simulation->objective }}</p>
                    <p class="card-text"><strong>Duration:</strong> {{ $simulation->duration }}</p>
                    <p class="card-text"><strong>Complexity Level:</strong> {{ $simulation->complexityLevel }}</p>
                    <p class="card-text"><strong>Points:</strong> {{ $simulation->points }}</p>
                    <div class="mt-auto">
                        <a href="#" class="btn btn-primary w-100">Start Simulation</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <p class="text-center">No simulations available at the moment. Please check back later.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection


