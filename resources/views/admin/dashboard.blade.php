@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Content Row -->
    <div class="row">
        <!-- Users Table -->
        <div class="col-lg-6">
            <h3>Users</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Quizzes Table -->
        <div class="col-lg-6">
            <h3>Quizzes</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Questions</th>
                        <th scope="col">Available</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                        <th scope="row">{{ $quiz->id }}</th>
                        <td>{{ $quiz->name }}</td>
                        <td>
                            @php
                            $quizQuestions = $questions->where('category_id', $quiz->id)->pluck('question_text')->implode(', ');
                            @endphp
                            {{ $quizQuestions }}
                        </td>
                        <td>
                            @php
                            $isAvailable = $questions->where('category_id', $quiz->id)->first()?->available ?? 0;
                            @endphp
                            {{ $isAvailable == 1 ? 'Yes' : 'No' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

         <!-- Challenges Table -->
         <div class="col-lg-6">
            <h3>Challenges</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Difficulty Level</th>
                        <th scope="col">Points</th>
                        <th scope="col">Available</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($challenges as $challenge)
                    <tr>
                        <th scope="row">{{ $challenge->id }}</th>
                        <td>{{ $challenge->title }}</td>
                        <td>{{ $challenge->description }}</td>
                        <td>{{ $challenge->difficultyLevel }}</td>
                        <td>{{ $challenge->points }}</td>
                        <td>{{ $challenge->available ? 'Yes' : 'No' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

         <!-- Simulations Table -->
        <div class="col-lg-6">
            <h3>Simulations</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Objective</th>
                        <th scope="col">Complexity Level</th>
                        <th scope="col">Points</th>
                        <th scope="col">Available</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($simulations as $simulation)
                    <tr>
                        <th scope="row">{{ $simulation->id }}</th>
                        <td>{{ $simulation->title }}</td>
                        <td>{{ $simulation->description }}</td>
                        <td>{{ $simulation->objective }}</td>
                        <td>{{ $simulation->complexityLevel }}</td>
                        <td>{{ $simulation->points }}</td>
                        <td>{{ $simulation->available ? 'Yes' : 'No' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Graph -->
        {{-- <div class="col-lg-6">
            <canvas id="myChart"></canvas>
        </div> --}}

    </div>

</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection
