<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('student.dashboard') }}">
        <div class="sidebar-brand-text mx-3">{{ __('Dashboard') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('student/dashboard') || request()->is('student/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('student.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.quiz.list') }}">
            <i class="fas fa-cogs"></i>
            <span>{{ __('Quizzes') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.challenges') }}">
            <i class="fas fa-cogs"></i>
            <span>{{ __('Challenges') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('student.simulation') }}">
            <i class="fas fa-envelope"></i>
            <span>{{ __('Simulations') }}</span></a>
    </li>
</ul>
