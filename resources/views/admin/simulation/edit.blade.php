@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Content Row -->
    <div class="card shadow">
        <div class="card-header">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Simulation')}}</h1>
                <a href="{{ route('admin.simulations.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.simulations.update', $simulation->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title', $simulation->title) }}" />
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea class="form-control" id="description" placeholder="{{ __('Description') }}" name="description">{{ old('description', $simulation->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="objective">{{ __('Objective') }}</label>
                    <input type="text" class="form-control" id="objective" placeholder="{{ __('Objective') }}" name="objective" value="{{ old('objective', $simulation->objective) }}" />
                </div>
                <div class="form-group">
                    <label for="duration">{{ __('Duration') }}</label>
                    <input type="number" class="form-control" id="duration" placeholder="{{ __('Duration') }}" name="duration" value="{{ old('duration', $simulation->duration) }}" />
                </div>
                <div class="form-group">
                    <label for="complexity_level">{{ __('Complexity Level') }}</label>
                    <input type="text" class="form-control" id="complexityLevel" placeholder="{{ __('Complexity Level') }}" name="complexityLevel" value="{{ old('complexityLevel', $simulation->complexityLevel) }}" />
                </div>
                <div class="form-group">
                    <label for="points">{{ __('Points') }}</label>
                    <input type="number" class="form-control" id="points" placeholder="{{ __('Points') }}" name="points" value="{{ old('points', $simulation->points) }}" />
                </div>
                <div class="form-group">
                    <label for="available">{{ __('Available') }}</label>
                    <select class="form-control" name="available" id="available">
                        <option value="1" {{ old('available', $simulation->available) == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                        <option value="0" {{ old('available', $simulation->available) == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
            </form>
        </div>
    </div>

    <!-- Content Row -->

</div>
@endsection
