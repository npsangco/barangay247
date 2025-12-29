<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-semibold">Community Incidents</h2>
            <a href="{{ route('resident.incident.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Report Incident
            </a>
        </div>
    </x-slot>

    <div class="container">
        <form method="GET" action="{{ route('resident.incidents') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search incidents by type, details, or reporter..." class="form-control">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('resident.incidents') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                @forelse($incidents as $incident)
                    <article class="border rounded p-3 mb-3">
                        <div class="d-flex align-items-start mb-2 flex-wrap">
                            <span class="badge bg-danger me-2">INCIDENT</span>
                            <small class="fw-semibold me-2">{{ $incident->resident ? $incident->resident->resident_name : 'Anonymous' }}</small>
                            <small class="text-muted me-2">•</small>
                            <small class="text-muted me-2">{{ $incident->created_at->diffForHumans() }}</small>
                            @if($incident->official)
                                <small class="text-muted me-2">•</small>
                                <small class="text-success">Assigned to {{ $incident->official->official_name }}</small>
                            @endif
                        </div>
                        <h4 class="h5 mb-2">
                            <a href="{{ route('resident.incident.show', $incident->report_id) }}"
                               class="text-decoration-none" style="color: var(--primary);">
                                {{ $incident->incident_type }}
                            </a>
                        </h4>
                        <p class="text-muted mb-3">{{ Str::limit($incident->incident_details, 300) }}</p>
                        <div class="d-flex gap-3 align-items-center">
                            <a href="{{ route('resident.incident.show', $incident->report_id) }}"
                               class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-chat-dots"></i> View Full Report
                            </a>
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i>
                                {{ $incident->date_reported ? \Carbon\Carbon::parse($incident->date_reported)->format('M d, Y') : 'N/A' }}
                            </small>
                        </div>
                    </article>
                @empty
                    <div class="text-center py-5">
                        <i class="bi bi-file-earmark-text display-1 text-muted"></i>
                        <h3 class="mt-3">No incidents reported</h3>
                        <p class="text-muted">Get started by reporting an incident.</p>
                        <a href="{{ route('resident.incident.create') }}" class="btn btn-primary mt-3">
                            <i class="bi bi-plus-circle"></i> Report Incident
                        </a>
                    </div>
                @endforelse
            </div>

            @if($incidents->hasPages())
                <div class="card-footer">
                    {{ $incidents->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
