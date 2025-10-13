<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item ms-3 me-auto">
                <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                    <img src="{{ asset('admin/icons/png.jpeg') }}" width="95px" height="60px" alt="">
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
                        data-feather="disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content mt-2">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">
                <a class="d-flex align-items-center {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
                    href="{{ route('user.dashboard') }}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate">Dashboards</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Modules <i data-feather="more-horizontal"></i></span>
            </li>

            <li class="nav-item">
                <a class="d-flex align-items-center "
                    href="{{ route ('user.my.contribution')}}">
                    <i data-feather="award"></i>
                    <span class="menu-title text-truncate">My Contribution</span>    
                </a>
            </li>
            <li class="sidebar-list"><a
                class="sidebar-link sidebar-title" href="#">
                <i data-feather="users"></i> {{-- Group icon --}}
                <span>My Group</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('user.group.details') }}">Details</a></li>
                    <li><a href="{{ route('user.group.member') }}">Members</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu -->