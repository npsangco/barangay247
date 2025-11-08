<div class="d-inflex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: auto;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Barangay DB</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="nav-item">
            <a href="/" class="nav-link text-white 
                @if(request()->routeIs('dashboard')) active @endif" 
                @if(request()->routeIs('dashboard')) aria-current="page" @endif>
                Dashboard
            </a>
        </li> -->
        <li>
            <a href="{{ route('incidents.index') }}" class="nav-link text-white 
                @if(request()->routeIs('incidents.*')) active @endif">
                Incidents
            </a>
        </li>
        <li>
            <a href="{{ route('projects.index') }}" class="nav-link text-white 
                @if(request()->routeIs('projects.*')) active @endif">
                Projects
            </a>
        </li>
        <li>
            <a href="{{ route('officials.index') }}" class="nav-link text-white 
                @if(request()->routeIs('officials.*')) active @endif">
                Officials
            </a>
        </li>
        <li>
            <a href="{{ route('residents.index') }}" class="nav-link text-white 
                @if(request()->routeIs('residents.*')) active @endif">
                Residents
            </a>
        </li>
    </ul>
    <hr>
</div>