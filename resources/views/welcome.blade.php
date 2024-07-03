<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Sec MMU</title>
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.webp') }}" alt="Logo">
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
                <hr>
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
                <h2 class="text-white">Latest Insights</h2>
                <div class="news-list">
                    @foreach ($news as $index => $newsItem)
                        <div class="news-item">
                            <img src="https://picsum.photos/200/300?random={{ $index }}" alt="{{ $newsItem->title }}">
                            <h3>{{ $newsItem->title }}</h3>
                            <p>{{ $newsItem->description }}</p>
                            <span class="news-date">Published on: {{ $newsItem->published_at ? \Carbon\Carbon::parse($newsItem->published_at)->format('Y-m-d') : 'N/A' }}</span>
                            <a href="{{ $newsItem->slug }}" class="read-more">Read More</a>
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
                <a href="feedback">Feedback</a>
            </div>
            <div class="social-media">
                <a href="https://x.com/home"><img src="{{ asset('images/x-logo-png.webp') }}" alt="Twitter"></a>
                <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.jpg') }}" alt="Facebook"></a>
                <a href="https://www.linkedin.com/"><img src="{{ asset('images/linkdin.png') }}" alt="LinkedIn"></a>
                <a href="#"><img src="{{ asset('images/youtube.png') }}" alt="YouTube"></a>
            </div>
        </div>
    </footer>
    <style>
        section::after {
            content: "";
            display: block;
            height: 1px;
            background-color: #ccc; /* Light grey line */
            margin: 20px auto; /* Centers the line and adds space above and below */
            width: 80%; /* Adjusts the width of the line */
        }
        hr{
            margin: 20px auto;
            width: 30%;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
    </style>
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

        document.addEventListener("DOMContentLoaded", function() {
        // Select all links with hashes
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                // Find the target element
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                // Scroll to the target element
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
    </script>
</body>
</html>
