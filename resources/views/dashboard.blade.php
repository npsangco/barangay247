<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4" style="color: var(--text);">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="fs-5 fw-semibold mb-2" style="color: var(--primary);">{{ __("Welcome to Barangay Management System") }}</h3>
                            <p class="mb-0" style="color: var(--text);">{{ __("You're logged in as ") }} <span class="fw-semibold" style="color: var(--primary);">{{ Auth::user()->name }}</span></p>
                        </div>
                        <div>
                            @if(Auth::user()->isAdmin())
                                <span class="badge rounded-pill" style="background-color: var(--bg-secondary); color: var(--primary); border: 1.5px solid var(--primary); padding: 0.5rem 1rem; font-size: 0.875rem;">Admin</span>
                            @elseif(Auth::user()->isEmployee())
                                <span class="badge rounded-pill" style="background-color: var(--bg-secondary); color: var(--accent); border: 1.5px solid var(--accent); padding: 0.5rem 1rem; font-size: 0.875rem;">Employee</span>
                            @else
                                <span class="badge rounded-pill" style="background-color: var(--bg-secondary); color: var(--primary); padding: 0.5rem 1rem; font-size: 0.875rem;">Resident</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin() || Auth::user()->isEmployee())
            <div class="row g-4">
                @if(Auth::user()->isAdmin())
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('users.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-people-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Users</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">Manage user accounts and permissions</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('logs.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-file-text-fill me-3" style="font-size: 2rem; color: var(--accent);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Logs</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View system activity logs</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endif

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('projects.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-folder-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Projects</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">Manage barangay projects and initiatives</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('officials.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-person-badge-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Officials</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View barangay officials information</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('residents.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-person-fill me-3" style="font-size: 2rem; color: var(--accent);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Residents</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">Manage resident records and information</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('households.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-house-fill me-3" style="font-size: 2rem; color: var(--accent);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Households</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View household data and statistics</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('incidents.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Incidents</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">Track and manage incident reports</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('archives.index') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-archive-fill me-3" style="font-size: 2rem; color: var(--accent);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Archives</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View and restore deleted records</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @else
            <div class="row g-4">
                <!-- My Information Module -->
                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('resident.my-info') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-person-circle me-3" style="font-size: 2rem; color: #9b59b6;"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">My Information</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View and update your personal information</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('projects.resident') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-folder-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">Barangay Projects</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View ongoing and completed barangay projects</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a href="{{ route('incidents.resident') }}" class="text-decoration-none">
                        <div class="card h-100" style="transition: box-shadow 0.3s;" onmouseover="this.style.boxShadow='0 0.5rem 1rem rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 2px 4px rgba(0,0,0,0.1)'">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 2rem; color: var(--primary);"></i>
                                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">My Incident Reports</h3>
                                </div>
                                <p class="mb-0" style="color: var(--text); font-size: 0.875rem;">View your reports and submit new incidents</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
