<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a href="{{ route('resident.projects') }}" class="btn btn-link text-decoration-none me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2 class="h4 mb-0 fw-semibold">Project Details</h2>
        </div>
    </x-slot>

    <div class="container">
        @if($project->image_path)
            <div class="mb-4">
                <img src="{{ $project->image_url }}"
                     alt="{{ $project->project_name }}"
                     class="img-fluid rounded shadow" style="max-height: 400px; width: 100%; object-fit: cover;">
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <div class="mb-2">
                            <span class="badge badge-primary me-2">BARANGAY PROJECT</span>
                            @php
                                $statusClass = match($project->project_status) {
                                    'completed' => 'bg-success',
                                    'ongoing' => 'bg-info',
                                    'planning' => 'bg-warning',
                                    default => 'bg-secondary'
                                };
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ ucfirst($project->project_status) }}</span>
                        </div>
                        <h1 class="h3 mb-0">{{ $project->project_name }}</h1>
                    </div>
                    <div class="text-end">
                        <small class="text-muted d-block">Project #{{ $project->project_id }}</small>
                        <small class="text-muted">Posted {{ $project->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

            <div class="card-body" style="background-color: var(--bg-secondary);">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="text-uppercase small text-muted mb-2">Start Date</h6>
                        <p class="mb-0">
                            <i class="bi bi-calendar-event text-success me-2"></i>
                            <strong>{{ \Carbon\Carbon::parse($project->start_date)->format('F d, Y') }}</strong>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-uppercase small text-muted mb-2">Target Completion</h6>
                        <p class="mb-0">
                            <i class="bi bi-calendar-check text-primary me-2"></i>
                            <strong>{{ \Carbon\Carbon::parse($project->end_date)->format('F d, Y') }}</strong>
                        </p>
                    </div>
                </div>

                @php
                    $start = \Carbon\Carbon::parse($project->start_date);
                    $end = \Carbon\Carbon::parse($project->end_date);
                    $now = \Carbon\Carbon::now();
                @endphp
            </div>

            <div class="card-body">
                <h6 class="text-uppercase small fw-semibold mb-3">Project Description</h6>
                <p class="mb-0" style="white-space: pre-wrap;">{{ $project->project_description }}</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('resident.projects') }}" class="btn btn-link text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Back to Projects
                </a>
            </div>
        </div>

        <div class="row g-3 mt-4">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px; background-color: var(--bg-secondary);">
                            <i class="bi bi-calendar3 fs-3" style="color: var(--primary);"></i>
                        </div>
                        <p class="text-muted small mb-1">Duration</p>
                        <h5 class="fw-bold">{{ $start->diffInDays($end) }} days</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px; background-color: var(--bg-secondary);">
                            <i class="bi bi-check-circle fs-3" style="color: var(--primary);"></i>
                        </div>
                        <p class="text-muted small mb-1">Status</p>
                        <h5 class="fw-bold">{{ ucfirst($project->project_status) }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px; background-color: var(--bg-secondary);">
                            <i class="bi bi-hourglass-split fs-3" style="color: var(--primary);"></i>
                        </div>
                        <p class="text-muted small mb-1">Days Remaining</p>
                        <h5 class="fw-bold">{{ $project->project_status === 'completed' ? '0' : max(0, $now->diffInDays($end)) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
