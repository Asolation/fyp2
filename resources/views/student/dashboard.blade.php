@extends('layouts.student')

@section('content')
<body>
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

                    <section class="badges">
                        @foreach ($badges as $badge)
                            <div class="badge">
                                <h2>{{ $badge->title }}</h2>
                                <p>{{ $badge->description }}</p>
                                <a href="" class="btnCont">View Badge</a>
                            </div>
                        @endforeach
                    </section>

                    <section class="skills">
                        <h2>Skills</h2>
                        <ul>
                            @foreach ($skills as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                        <a href="#" class="btnCont">Edit Skills</a>
                    </section>

                    <section class="leaderboard">
                        <h2>Leaderboard</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaderboard as $player)
                                    <tr>
                                        <td>{{ $player->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="" class="btnCont">View Leaderboard</a>
                    </section>
                </main>
            </div>
        </div>
    </div>
</body>
@endsection
