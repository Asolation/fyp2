@extends('layouts.student') {{-- Assuming you have a main layout --}}

@section('content')
<style>
    .container-leaderboard {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 2.5em;
        color: #4e73df;
        text-align: center;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table thead th {
        background-color: #4e73df;
        color: white;
        padding: 10px;
        text-align: left;
    }

    .table tbody td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tbody tr:hover {
        background-color: #e9ecef;
    }

    .rank, .points {
        text-align: center;
    }
</style>

<div class="container-leaderboard">
    <h1>Leaderboard</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="rank">Rank</th>
                <th>Name</th>
                <th class="points">Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaderboard as $index => $entry)
                <tr>
                    <td class="rank">{{ $index + 1 }}</td>
                    <td>{{ $entry->user->name }}</td> {{-- Accessing the name through the user relationship --}}
                    <td class="points">{{ $entry->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
