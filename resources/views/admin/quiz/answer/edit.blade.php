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
                    <h1 class="h3 mb-0 text-gray-800">{{ __('Edit Answer')}}</h1>
                    <a href="{{ route('admin.answers.index') }}" class="btn btn-primary btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.answers.update', $answer->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>{{ __('Belongs to Question') }}:</label>
                        <input type="text" class="form-control" value="{{ $answer->question->question_text }}" disabled />
                        <!-- Hidden input for question_id -->
                        <input type="hidden" name="question_id" value="{{ $answer->question_id }}" />
                    </div>
                    <div class="form-group">
                        <label for="answer_text">{{ __('Answer Text') }}</label>
                        <input type="text" class="form-control" id="answer_text" placeholder="{{ __('answer text') }}" name="answer_text" value="{{ old('answer_text', $answer->answer_text) }}" />
                    </div>
                    <div class="form-group">
                        <label for="correct">{{ __('Correct') }}</label>
                        <select class="form-control" name="is_correct" id="correct">
                            <option value="1" {{ old('is_correct', $answer->is_correct) == 1 ? 'selected' : '' }}>{{ __('Yes') }}</option>
                        <option value="0" {{ old('is_correct', $answer->is_correct) == 0 ? 'selected' : '' }}>{{ __('No') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Save')}}</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
