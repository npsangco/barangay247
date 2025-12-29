<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a href="{{ route('resident.incidents') }}" class="btn btn-link text-decoration-none me-3">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2 class="h4 mb-0 fw-semibold">Incident Report</h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <span class="badge bg-danger mb-2">INCIDENT REPORT</span>
                        <h1 class="h3 mb-0">{{ $incident->incident_type }}</h1>
                    </div>
                    <div class="text-end">
                        <small class="text-muted d-block">Report #{{ $incident->report_id }}</small>
                        <small class="text-muted">{{ $incident->created_at->format('M d, Y h:i A') }}</small>
                    </div>
                </div>
            </div>

            <div class="card-body" style="background-color: var(--bg-secondary);">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="text-uppercase small text-muted mb-2">Reported By</h6>
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                 style="width: 40px; height: 40px; background-color: var(--bg-primary);">
                                <i class="bi bi-person-fill" style="color: var(--primary);"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold">{{ $incident->resident ? $incident->resident->resident_name : 'Anonymous' }}</p>
                                @if($incident->resident && $incident->resident->contact_information)
                                    <small class="text-muted">{{ $incident->resident->contact_information }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h6 class="text-uppercase small text-muted mb-2">Date Reported</h6>
                        <p class="mb-1">
                            <i class="bi bi-calendar-event me-2"></i>
                            {{ $incident->date_reported ? \Carbon\Carbon::parse($incident->date_reported)->format('M d, Y') : 'N/A' }}
                        </p>
                        <small class="text-muted">{{ $incident->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="col-md-4">
                        <h6 class="text-uppercase small text-muted mb-2">Assigned Official</h6>
                        @if($incident->official)
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                     style="width: 40px; height: 40px; background-color: var(--bg-primary);">
                                    <i class="bi bi-check-circle-fill" style="color: var(--primary);"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-semibold">{{ $incident->official->official_name }}</p>
                                    <small class="text-muted">{{ $incident->official->position ?? 'Barangay Official' }}</small>
                                </div>
                            </div>
                        @else
                            <div class="d-flex align-items-center text-muted">
                                <i class="bi bi-clock-history me-2"></i>
                                <span>Pending Assignment</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h6 class="text-uppercase small fw-semibold mb-3">Incident Details</h6>
                <p class="mb-0" style="white-space: pre-wrap;">{{ $incident->incident_details }}</p>
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('resident.incidents') }}" class="btn btn-link text-decoration-none">
                        <i class="bi bi-arrow-left"></i> Back to Incidents
                    </a>
                    @if(Auth::user()->resident_id === $incident->resident_id)
                        <small class="text-muted">You reported this incident</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="alert alert-info mt-4 d-flex align-items-start">
            <i class="bi bi-info-circle me-2"></i>
            <p class="mb-0 small">
                Barangay officials will review this report and take appropriate action. You may be contacted for additional information.
            </p>
        </div>
    </div>
</x-app-layout>
