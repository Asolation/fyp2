<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Sec MMU</title>
    <style>
    .news-item {
        padding: 20px;
        background-color: #f9f9f9; /* Light grey background, adjust the color as needed */
        margin-bottom: 20px; /* Adds space between items */
        border-radius: 5px; /* Optional: adds rounded corners */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: adds a shadow for better separation */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for transform and shadow */
    }

    .news-item:hover {
        transform: scale(1.05); /* Slightly increase size */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    }

    .news-list {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Adds spacing between items in the grid */
    }

    .news-item img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        margin-bottom: 10px; /* Adds space between the image and the text */
    }

    .news-item h3 {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .news-item p {
        margin-bottom: 10px;
    }

    .news-item .news-date {
        display: block;
        margin-bottom: 10px;
        color: #777;
    }

    .news-item .read-more {
        display: inline-block;
        color: #007bff;
        text-decoration: none;
    }

    .news-item .read-more:hover {
        text-decoration: underline;
    }

    .fade {
        transition: opacity 2s ease-out;
        opacity: 1;
    }
    </style>

    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Section -->
    <header>
        @if(session('error'))
            <div id="alert" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/MMUlogo.png') }}" alt="MMU Logo">
            </div>
            <nav>
                <ul class="">
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
                        <!-- Dashboard Link -->
                        <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                            Dashboard
                        </a>
                        <!-- Logout Link -->
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

    <!-- Main Content Section -->
    <main>
        <!-- Hero Section -->
        <section class="welcome-section">
            <h1>Welcome to the Cybersecurity Awareness Platform</h1>
            <div class="main-image-placeholder">
                <div class="image-rotator">
                    <img class="rotating-image" src="{{ asset('images/image1.jpeg') }}" alt="Image 1">
                    <img class="rotating-image" src="{{ asset('images/image2.jpeg') }}" alt="Image 2">
                    <img class="rotating-image" src="{{ asset('images/image3.jpeg') }}" alt="Image 3">
                </div>
            </div>
            <button id="nextButton">Next Image</button>
        </section>

        <!-- Product Features Section -->
        <section class="products">
            <div class="container">
                <h2>Our Products</h2>
                <div class="product-list">
                    <div class="product">
                        <img class="image-placeholder" src="{{ asset('images/CYBER-SECURITY-QUIZ.jpeg') }}" alt="Security Quiz Pack">
                        <h3>Security Quiz Pack</h3>
                        <p>Our Security Quiz Pack offers a comprehensive set of 100 quizzes covering a wide range of cybersecurity topics.</p>
                    </div>
                    <div class="product">
                        <img class="image-placeholder" src="{{ asset('images/Cyber-Security-Challenges.jpg') }}" alt="Security Quiz Pack">
                        <h3>Challenges of the Week</h3>
                        <p>Our Challenges of the Week feature offers a variety of weekly exercises to help you enhance your cybersecurity skills.</p>
                    </div>
                    <div class="product">
                        <img class="image-placeholder" src="{{ asset('images/CEOdb-1.png') }}" alt="Security Quiz Pack">
                        <h3>Simulations Suite</h3>
                        <p>Experience real-world scenarios and enhance your cybersecurity skills with our Simulations Suite.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <h2>What Our Customers Say</h2>
                <div class="testimonial-list">
                    <div class="testimonial">
                        <p>"Cyber Sec MMU is much more than a training platform. It's a security tool, a learning platform, and a reporting engine."</p>
                        <cite>Action For Children</cite>
                    </div>
                    <div class="testimonial">
                        <p>"Cyber Sec MMU is the best at helping us secure our data by training our people effectively."</p>
                        <cite>Censia</cite>
                    </div>
                    <!-- Add more testimonials as needed -->
                </div>
            </div>
        </section>

        <!-- News Section -->
        <section class="news">
            <div class="container">
                <h2>Latest Insights</h2>
                <div class="news-list">
                    @foreach ($news as $index => $newsItem)
                        <div class="news-item">
                            <img src="https://picsum.photos/200/300?random={{ $index }}" alt="{{ $newsItem->title }}">
                            <h3>{{ $newsItem->title }}</h3>
                            <p>{{ $newsItem->description }}</p>
                            <span class="news-date">Published on: {{ $newsItem->published_at ? \Carbon\Carbon::parse($newsItem->published_at)->format('Y-m-d') : 'N/A' }}</span>
                            <a href="/news/{{ $newsItem->slug }}" class="read-more">Read More</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
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
                <a href="https://x.com/home"><img src="{{ asset('images/x-logo-png.webp') }}" alt="Twitter"></a>
                <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.jpg') }}" alt="Facebook"></a>
                <a href="https://www.linkedin.com/"><img src="{{ asset('images/linkdin.png') }}" alt="LinkedIn"></a>
                <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var currentImageIndex = 0;
        var images = document.getElementsByClassName('rotating-image');

        document.getElementById('nextButton').addEventListener('click', function() {
            images[currentImageIndex].style.opacity = 0;
            currentImageIndex = (currentImageIndex + 1) % images.length;
            images[currentImageIndex].style.opacity = 1;
        });

        document.addEventListener('DOMContentLoaded', (event) => {
            setTimeout(function() {
                const alert = document.getElementById('alert');
                if (alert) {
                    alert.classList.add('fade');
                    alert.style.opacity = 0;
                    // Wait for the fade effect to finish before hiding the element
                    setTimeout(() => alert.style.display = 'none', 2000); // Match the duration of the fade effect
                }
            }, 3000); // 5000 milliseconds = 5 seconds before starting the fade
        });
    </script>
</body>
</html>
