<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard.index') }}">
        <div class="sidebar-brand-text mx-3">{{ __('Dashboard') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-cogs"></i>
            <span>{{ __('Quizzes') }}</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-cogs"></i>
            <span>{{ __('Challenges') }}</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.categories.index') }}">
            <i class="fas fa-envelope"></i>
            <span>{{ __('Simulations') }}</span></a>
    </li>
</ul>
