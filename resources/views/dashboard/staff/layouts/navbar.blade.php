<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
            <div class="input-group-append">
                <button class="btn" type="button" style="background:#6D071A; border-color:#6D071A; color:white;">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
        </li>

        <!-- Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter">7</span>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User -->
        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">

                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ auth()->user()->name }}
                </span>

                <img class="img-profile rounded-circle"
                     src="{{ asset('dashboard/img/undraw_profile.svg') }}">

            </a>

            <!-- Dropdown -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                <!-- ROLE BADGE -->
                <div class="dropdown-item text-center">
                    <span class="badge badge-primary">
                        {{ auth()->user()->getRoleNames()->first() }}
                    </span>
                </div>

                <div class="dropdown-divider"></div>

                <!-- PROFILE -->
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>

                <!-- ROLE MENU -->
                @role('staff')
                <a class="dropdown-item" href="{{ route('staff.index') }}">
                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard Staff
                </a>
                @endrole


                @role('dosen')
                <a class="dropdown-item" href="{{ route('dosen.index') }}">
                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard Dosen
                </a>
                @endrole


                @role('mahasiswa')
                <a class="dropdown-item" href="{{ route('mahasiswa.index') }}">
                    <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard Mahasiswa
                </a>

                <a class="dropdown-item" href="{{ route('mahasiswa.pendaftaran.index') }}">
                    <i class="fas fa-file-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pendaftaran
                </a>
                @endrole

                <div class="dropdown-divider"></div>

                <!-- LOGOUT -->
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>

<!-- Logout Form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>