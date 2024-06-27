@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif

    <h1>Available Quests</h1>
    <ul class="list-group">
        @foreach($quests as $quest)
            <li class="list-group-item">
                <a href="{{ route('quests.show', $quest->id) }}">{{ $quest->title }}</a>
                <span class="badge badge-primary">{{ $quest->points }} Points</span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
