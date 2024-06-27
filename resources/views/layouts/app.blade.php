<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/MMUlogo.png') }}" alt="KnowBe4 Logo">
            </div>
            <nav>
                <ul>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.quiz.list') }}">Quizzes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.challenges') }}">Challenges</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.simulation') }}">Simulations</a>
                    </li>
                </ul>
            </nav>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @php
                            $user = Auth::user();
                        @endphp
                        <a class="dropdown-item" href="{{ route('student.dashboard')}}">
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a>
                <a href="feedback">Feedback</a>
                <a href="#">Support</a>
            </div>
            <div class="social-media">
                <a href="https://x.com/home"><img src="{{ asset('images/x-logo-png.webp') }}" alt="Twitter">Twitter</a>
                <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.jpg') }}" alt="Facebook">Facebook</a>
                <a href="https://www.linkedin.com/"><img src="{{ asset('images/linkdin.png') }}" alt="LinkedIn">LinkedIn</a>
                <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
            </div>
        </div>
    </footer>
</body>
</html>
