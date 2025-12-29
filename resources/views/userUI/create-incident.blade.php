<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 fw-semibold">Report an Incident</h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle me-2"></i>
                            <p class="mb-0 small">
                                Your report will be reviewed by barangay officials. Please provide as much detail as possible to help us address the issue effectively.
                            </p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('resident.incident.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="incident_type" class="form-label fw-semibold">
                                    Incident Type <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="incident_type" id="incident_type"
                                       value="{{ old('incident_type') }}"
                                       placeholder="e.g., Noise Complaint, Street Light Issue, Road Damage"
                                       class="form-control" required>
                                @error('incident_type')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <div class="mt-2">
                                    <button type="button" onclick="document.getElementById('incident_type').value='Noise Complaint'"
                                            class="btn btn-sm btn-outline-secondary me-2 mb-2">Noise Complaint</button>
                                    <button type="button" onclick="document.getElementById('incident_type').value='Street Light Issue'"
                                            class="btn btn-sm btn-outline-secondary me-2 mb-2">Street Light Issue</button>
                                    <button type="button" onclick="document.getElementById('incident_type').value='Road Damage'"
                                            class="btn btn-sm btn-outline-secondary me-2 mb-2">Road Damage</button>
                                    <button type="button" onclick="document.getElementById('incident_type').value='Waste Management'"
                                            class="btn btn-sm btn-outline-secondary me-2 mb-2">Waste Management</button>
                                    <button type="button" onclick="document.getElementById('incident_type').value='Water Supply Issue'"
                                            class="btn btn-sm btn-outline-secondary me-2 mb-2">Water Supply Issue</button>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="incident_details" class="form-label fw-semibold">
                                    Incident Details <span class="text-danger">*</span>
                                </label>
                                <textarea name="incident_details" id="incident_details" rows="8"
                                          placeholder="Please provide a detailed description of the incident, including location, time, and any other relevant information..."
                                          class="form-control" required>{{ old('incident_details') }}</textarea>
                                @error('incident_details')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Be as specific as possible. Include addresses, times, and any other details that will help us investigate.
                                </small>
                            </div>

                            <div class="alert alert-light border">
                                <h6 class="fw-semibold mb-2">Reporting As:</h6>
                                <p class="mb-1">{{ Auth::user()->resident ? Auth::user()->resident->resident_name : Auth::user()->name }}</p>
                                <small class="text-muted">Report will be submitted at {{ now()->format('M d, Y h:i A') }}</small>
                            </div>

                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <a href="{{ route('resident.incidents') }}" class="btn btn-link text-decoration-none">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send"></i> Submit Report
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
