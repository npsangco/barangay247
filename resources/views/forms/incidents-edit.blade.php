<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Edit Incident') }}
            </h2>
            <a href="{{ route('incidents.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('incidents.update', $incident->report_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="resident_id" class="form-label">Resident <span class="text-danger">*</span></label>
                                <select class="form-select" id="resident_id" name="resident_id" required>
                                    <option value="">Select Resident</option>
                                    @foreach($residents as $resident)
                                        <option value="{{ $resident->resident_id }}" {{ old('resident_id', $incident->resident_id) == $resident->resident_id ? 'selected' : '' }}>
                                            {{ $resident->resident_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="official_id" class="form-label">Assigned Official</label>
                                <select class="form-select" id="official_id" name="official_id">
                                    <option value="">Not Assigned</option>
                                    @foreach($officials as $official)
                                        <option value="{{ $official->official_id }}" {{ old('official_id', $incident->official_id) == $official->official_id ? 'selected' : '' }}>
                                            {{ $official->official_name }} - {{ $official->position }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="incident_type" class="form-label">Incident Type <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="incident_type" name="incident_type" value="{{ old('incident_type', $incident->incident_type) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="date_reported" class="form-label">Date Reported <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date_reported" name="date_reported" value="{{ old('date_reported', $incident->date_reported) }}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="incident_details" class="form-label">Incident Details <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="incident_details" name="incident_details" rows="4" required>{{ old('incident_details', $incident->incident_details) }}</textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> Update Incident
                                </button>
                                <a href="{{ route('incidents.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
