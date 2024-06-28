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

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <span>{{ __('Quiz Management') }}</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/quizzess') || request()->is('admin/quizzess') ? 'active' : '' }}" href="{{ route('admin.quizzess.index') }}">
                    <i class="fa fa-briefcase mr-2"></i>
                    {{ __('Quizzess') }}
                </a>
                <a class="collapse-item {{ request()->is('admin/questions') || request()->is('admin/questions') ? 'active' : '' }}" href="{{ route('admin.questions.index') }}">
                    <i class="fa fa-briefcase mr-2"></i>
                    {{ __('Questions') }}
                </a>
                <a class="collapse-item {{ request()->is('admin/answers') || request()->is('admin/answers') ? 'active' : '' }}" href="{{ route('admin.answers.index') }}">
                    <i class="fa fa-briefcase mr-2"></i>
                    {{ __('Answers') }}
                </a>
                <a class="collapse-item {{ request()->is('admin/results') || request()->is('admin/results') ? 'active' : '' }}" href="{{ route('admin.results.index') }}">
                    <i class="fa fa-briefcase mr-2"></i>
                    {{ __('Result') }}
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item {{ request()->is('admin/challenges') || request()->is('admin/challenges') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.challenges.index') }}">
            <i class="fas fa-cog"></i>
            <span>{{ __('Challenges') }}</span></a>
    </li>
    <li class="nav-item {{ request()->is('admin/simulations') || request()->is('admin/simulations') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.simulations.index') }}">
            <i class="fas fa-envelope"></i>
            <span>{{ __('Simulations') }}</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('User Management') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('Roles') }}</a>
                <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
            </div>
        </div>
    </li>
</ul>
