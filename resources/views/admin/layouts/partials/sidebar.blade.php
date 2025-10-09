

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <img src="{{ asset('web/logo.png') }}" width="90px" alt="">
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a class="d-flex align-items-center {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate">Dashboards</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Modules <i data-feather="more-horizontal"></i></span>
            </li>

           <li class="nav-item">
    <a class="d-flex align-items-center {{ request()->routeIs('groups.*') ? 'active' : '' }}"
       href="{{ route('groups.index') }}">
        <i data-feather="layers"></i> {{-- Group icon --}}
        <span class="menu-title text-truncate">Group</span>
    </a>
</li>

<li class="nav-item">
    <a class="d-flex align-items-center {{ request()->routeIs('leader.*') ? 'active' : '' }}"
       href="{{ route('leader.index') }}">
        <i data-feather="user-check"></i> {{-- Leader icon --}}
        <span class="menu-title text-truncate">Leader</span>
    </a>
</li>

<li class="nav-item">
    <a class="d-flex align-items-center {{ request()->routeIs('member.*') ? 'active' : '' }}"
       href="{{ route('member.index') }}">
        <i data-feather="users"></i> {{-- Member icon --}}
        <span class="menu-title text-truncate">Member</span>
    </a>
</li>

              
           

        </ul>
    </div>
</div>
<!-- END: Main Menu -->
