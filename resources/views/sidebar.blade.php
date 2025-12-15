<div class="d-flex flex-column flex-shrink-0 p-3 text-white vh-100" style="background-color: #3C4225; width: 280px; max-width: 100%;">
    <!-- Header -->
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 text-white text-decoration-none">
        <span class="fs-4 fw-bold">Barangay</span>
    </a>

    <hr class="mb-3" style="border-color: #677233; opacity: 1;">

    <!-- Navigation -->
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('incidents.index') }}"
               class="nav-link text-white @if(request()->routeIs('incidents.*')) active @endif"
               @if(request()->routeIs('incidents.*'))
                   style="background-color: #1F2310;"
                   aria-current="page"
               @endif>
                Incidents
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('projects.index') }}"
               class="nav-link text-white @if(request()->routeIs('projects.*')) active @endif"
               @if(request()->routeIs('projects.*'))
                   style="background-color: #1F2310;"
                   aria-current="page"
               @endif>
                Projects
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('officials.index') }}"
               class="nav-link text-white @if(request()->routeIs('officials.*')) active @endif"
               @if(request()->routeIs('officials.*'))
                   style="background-color: #1F2310;"
                   aria-current="page"
               @endif>
                Officials
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('residents.index') }}"
               class="nav-link text-white @if(request()->routeIs('residents.*')) active @endif"
               @if(request()->routeIs('residents.*'))
                   style="background-color: #1F2310;"
                   aria-current="page"
               @endif>
                Residents
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('households.index') }}"
               class="nav-link text-white @if(request()->routeIs('households.*')) active @endif"
               @if(request()->routeIs('households.*'))
                   style="background-color: #1F2310;"
                   aria-current="page"
               @endif>
                Households
            </a>
        </li>
    </ul>

    <hr class="mb-3" style="border-color: #677233; opacity: 1;">

    <!-- User Profile -->
    <div class="d-flex align-items-center p-2 rounded" style="background-color: #1F2310;">
        <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
        <div class="flex-grow-1">
            <div class="fw-semibold">John Manika</div>
            <small class="text-white-50">Admin</small>
        </div>
        <a href="#" class="text-decoration-none ms-2" style="color: #677233;" title="Logout">
            <i class="bi bi-box-arrow-right fs-5"></i>
        </a>
    </div>
</div>
