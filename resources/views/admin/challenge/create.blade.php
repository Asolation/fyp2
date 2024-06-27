@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Create Simulation') }}</h1>
                <a href="{{ route('admin.challenges.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.challenges.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title') }}" required />
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" placeholder="{{ __('Description') }}" name="description">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="complexityLevel">{{ __('Difficulty Level') }}</label>
                    <input type="text" class="form-control" id="difficultyLevel" placeholder="{{ __('Difficulty Level') }}" name="difficultyLevel" value="{{ old('difficultyLevel') }}" required />
                </div>
                <div class="form-group">
                    <label for="points">{{ __('Points') }}</label>
                    <input type="number" class="form-control" id="points" placeholder="{{ __('Points') }}" name="points" value="{{ old('points') }}" required />
                </div>
                <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
            </form>
        </div>
    </div>

<!-- Content Row -->

</div>
@endsection
