<div class="d-flex flex-column p-3 justify-content-between" style="background-color: #3C4225; min-height: 100vh; color: white;">
    <div>
        <a href="/" class="d-flex align-items-center mb-3 text-decoration-none" style="color: white;">
            <span class="fs-4 fw-bold">Barangay</span>
        </a>
        <hr style="border-color: #677233;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('incidents.index') }}" class="nav-link @if(request()->routeIs('incidents.*')) active @endif"
                   style="color: white; @if(request()->routeIs('incidents.*')) background-color: #1F2310; @else background-color: transparent; @endif">
                    Incidents
                </a>
            </li>
            <li>
                <a href="{{ route('projects.index') }}" class="nav-link @if(request()->routeIs('projects.*')) active @endif"
                   style="color: white; @if(request()->routeIs('projects.*')) background-color: #1F2310; @else background-color: transparent; @endif">
                    Projects
                </a>
            </li>
            <li>
                <a href="{{ route('officials.index') }}" class="nav-link @if(request()->routeIs('officials.*')) active @endif"
                   style="color: white; @if(request()->routeIs('officials.*')) background-color: #1F2310; @else background-color: transparent; @endif">
                    Officials
                </a>
            </li>
            <li>
                <a href="{{ route('residents.index') }}" class="nav-link @if(request()->routeIs('residents.*')) active @endif"
                   style="color: white; @if(request()->routeIs('residents.*')) background-color: #1F2310; @else background-color: transparent; @endif">
                    Residents
                </a>
            </li>
        </ul>
        <hr style="border-color: #677233;">
    </div>

    <div class="d-flex align-items-center mt-auto p-2 rounded" style="background-color: #1F2310;">
        <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2" width="40" height="40">
        <div>
            <div class="fw-semibold">John Manika</div>
            <small class="text-light">Admin</small>
        </div>
        <a href="#" class="ms-auto" style="color: #677233;" title="">
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</div>
