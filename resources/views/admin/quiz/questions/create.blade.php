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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('create question') }}</h1>
                    <a href="{{ route('admin.questions.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.questions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quiz">{{ __('Quiz') }}</label>
                        <select class="form-control" name="quiz_id" id="quiz">
                            @foreach($quizzess as $id => $quiz)
                                <option value="{{ $id }}">{{ $quiz }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question_text">{{ __('Question Text') }}</label>
                        <input type="text" class="form-control" id="question_text" placeholder="{{ __('question text') }}" name="question_text" value="{{ old('question_text') }}" />
                    </div>
                    <div class="form-group">
                        <label for="points">{{ __('Points') }}</label>
                        <input type="number" class="form-control" id="points" placeholder="{{ __('Points') }}" name="points" value="{{ old('points') }}" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save') }}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
