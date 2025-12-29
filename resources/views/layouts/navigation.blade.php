<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5A7863;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ Auth::user()->isAdmin() || Auth::user()->isEmployee() ? route('dashboard') : route('resident.home') }}">
            Barangay 24/7
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                @if(Auth::user()->isAdmin() || Auth::user()->isEmployee())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('officials.index') ? 'active' : '' }}" href="{{ route('officials.index') }}">Officials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('residents.index') ? 'active' : '' }}" href="{{ route('residents.index') }}">Residents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('households.index') ? 'active' : '' }}" href="{{ route('households.index') }}">Households</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('incidents.index') ? 'active' : '' }}" href="{{ route('incidents.index') }}">Incidents</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('resident.home') ? 'active' : '' }}" href="{{ route('resident.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('resident.projects') ? 'active' : '' }}" href="{{ route('resident.projects') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('resident.incidents') ? 'active' : '' }}" href="{{ route('resident.incidents') }}">Incidents</a>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
