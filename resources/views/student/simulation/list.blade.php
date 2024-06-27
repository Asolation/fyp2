@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Simulations</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($simulations as $simulation)
        <div class="col">
            <div class="card h-100 shadow">
                <div class="card-header bg-primary text-white text-center">
                    <div>{{ $simulation->title }}</div>
                    <img src="{{ asset('images/CEOdb-1.png') }}" alt="Simulation" class="img-fluid mb-2" style="width: 100px;">
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $simulation->description }}</p>
                    <p class="card-text">{{ $simulation->objective }}</p>
                    <p class="card-text">Duration: {{ $simulation->duration }}</p>
                    <p class="card-text">Complexity Level: {{ $simulation->complexityLevel }}</p>
                    <p class="card-text">Points: {{ $simulation->points }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="" class="btn btn-sm btn-outline-secondary">Start Simulation</a>
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
