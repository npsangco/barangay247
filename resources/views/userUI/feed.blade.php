<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 fw-semibold">Community Feed</h2>
    </x-slot>

    <div class="container">
        <form method="GET" action="{{ route('resident.home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search projects and incidents..." class="form-control">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('resident.home') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="h5 mb-0 d-flex align-items-center">
                    <i class="bi bi-clipboard-check me-2" style="color: var(--primary);"></i>
                    Barangay Projects
                </h3>
            </div>
            <div class="card-body">
                @forelse($projects->take(5) as $project)
                    <article class="border rounded p-3 mb-3">
                        <div class="d-flex align-items-start mb-2">
                            <span class="badge badge-primary me-2">PROJECT</span>
                            <small class="text-muted">Posted {{ $project->created_at->diffForHumans() }}</small>
                            <small class="text-muted mx-2">•</small>
                            <small class="fw-semibold">Status: {{ ucfirst($project->project_status) }}</small>
                        </div>
                        <h4 class="h5 mb-2">
                            <a href="{{ route('resident.project.show', $project->project_id) }}"
                               class="text-decoration-none" style="color: var(--primary);">
                                {{ $project->project_name }}
                            </a>
                        </h4>
                        <p class="text-muted mb-2">{{ Str::limit($project->project_description, 200) }}</p>
                        @if($project->image_path)
                            <img src="{{ $project->image_url }}"
                                 alt="{{ $project->project_name }}"
                                 class="img-fluid rounded mt-2" style="max-height: 250px; object-fit: cover;">
                        @endif
                        <div class="mt-2">
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> {{ $project->start_date }} - {{ $project->end_date }}
                            </small>
                        </div>
                    </article>
                @empty
                    <p class="text-center text-muted py-4">No projects to display.</p>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="h5 mb-0 d-flex align-items-center">
                    <i class="bi bi-exclamation-triangle me-2" style="color: var(--text);"></i>
                    Community Incidents
                </h3>
            </div>
            <div class="card-body">
                @forelse($incidents->take(5) as $incident)
                    <article class="border rounded p-3 mb-3">
                        <div class="d-flex align-items-start mb-2">
                            <span class="badge bg-danger me-2">INCIDENT</span>
                            <small class="text-muted">Reported by {{ $incident->resident ? $incident->resident->resident_name : 'Unknown' }}</small>
                            <small class="text-muted mx-2">•</small>
                            <small class="text-muted">{{ $incident->created_at->diffForHumans() }}</small>
                        </div>
                        <h4 class="h5 mb-2">
                            <a href="{{ route('resident.incident.show', $incident->report_id) }}"
                               class="text-decoration-none" style="color: var(--primary);">
                                {{ $incident->incident_type }}
                            </a>
                        </h4>
                        <p class="text-muted mb-2">{{ Str::limit($incident->incident_details, 200) }}</p>
                        <div class="mt-2">
                            <a href="{{ route('resident.incident.show', $incident->report_id) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-chat-dots"></i> View Details
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="text-center text-muted py-4">No incidents reported yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
