@extends('layouts.student')

@section('content')
<style>

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .student-info h1 {
        font-size: 2.5em;
        color: #4e73df;
    }

    .student-info p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .progress-bar {
        background-color: #e9ecef;
        border-radius: 50px;
        overflow: hidden;
    }

    .progress-bar .progress {
        background-color: #4e73df;
        height: 20px;
        border-radius: 50px;
    }

    .badges {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 40px;
    }

    .badge {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        flex: 1 1 calc(33.333% - 20px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .badge h2 {
        font-size: 1.5em;
        color: #4e73df;
    }

    .badge p {
        font-size: 1em;
        margin-bottom: 20px;
    }

    .btnCont {
        background-color: #4e73df;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btnCont:hover {
        background-color: #2e59d9;
    }

    .leaderboard {
        margin-top: 60px;
    }

    .leaderboard h2 {
        font-size: 2em;
        color: #4e73df;
        margin-bottom: 20px;
    }

    .leaderboard table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .leaderboard table th, .leaderboard table td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .leaderboard table th {
        background-color: #f8f9fc;
        color: #4e73df;
        font-size: 1.1em;
    }

    .leaderboard table td {
        font-size: 1em;
    }

    .leaderboard .btnCont {
        display: inline-block;
        margin-top: 20px;
    }
</style>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container">
                <main>
                    <section class="student-info">
                        <h1>{{ $studentName }}</h1>
                        <p>{{ $studentDescription }}</p>
                        <div class="progress-bar">
                            <div class="progress" style="width: {{ $progressPercentage }}%;"></div>
                        </div>
                    </section>

                    {{-- <section class="badges">
                        @foreach ($badges as $badge)
                            <div class="badge">
                                <h2>{{ $badge->title }}</h2>
                                <p>{{ $badge->description }}</p>
                                <a href="" class="btnCont">View Badge</a>
                            </div>
                        @endforeach
                    </section> --}}

                    <section class="leaderboard">
                        <h2>Leaderboard</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard as $index => $entry)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $entry->user->name }}</td>
                                        <td>{{ $entry->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('leaderboard') }}" class="btnCont">View Full Leaderboard</a>
                    </section>
                </main>
            </div>
        </div>
    </div>

@endsection
