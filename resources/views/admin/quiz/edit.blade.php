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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Quizzess')}}</h1>
                    <a href="{{ route('admin.quizzess.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.quizzess.update', $quiz) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('Title') }}" name="title" value="{{ old('title', $quiz->title) }}" />
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <input type="text" class="form-control" id="description" placeholder="{{ __('Description') }}" name="description" value="{{ old('description', $quiz->description) }}" />
                    </div>
                    <div class="form-group">
                        <label for="time">{{ __('Time') }}</label>
                        <input type="number" class="form-control" id="time" placeholder="{{ __('Time') }}" name="time" value="{{ old('time', $quiz->time) }}" />
                    </div>
                    <div class="form-group">
                        <label for="available">{{ __('Available') }}</label>
                        <select class="form-control" name="is_available" id="available" value="{{ old('is_available+-', $quiz->is_available) }}">
                            <option value="1">{{ __('Yes') }}</option>
                            <option value="0">{{ __('No') }}</option>
                        </select>
                    </div>
                    <!-- Continue with the rest of the form -->
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
