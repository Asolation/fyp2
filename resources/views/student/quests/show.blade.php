@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $quest->title }}</h1>
    <p>{{ $quest->description }}</p>
    <h3>Tasks</h3>
    <ul class="list-group">
        @foreach($quest->tasks as $task)
            <li class="list-group-item">{{ $task->task }}</li>
        @endforeach
    </ul>

    @if($userProgress && $userProgress->completed)
        <div class="alert alert-success mt-4">You have completed this quest!</div>
    @else
        <form action="{{ route('quests.complete', $quest->id) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-primary">Complete Quest</button>
        </form>
    @endif
</div>
@endsection
