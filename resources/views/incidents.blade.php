<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Incident Records') }}
            </h2>
            <a href="{{ route('incidents.create') }}"
                class="btn btn-primary d-inline-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i>
                Add Incident
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mb-3" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('incidents.index') }}" method="GET" class="mb-4">
                        <div class="d-flex gap-2">
                            <input type="text" name="search" class="form-control flex-fill"
                                   placeholder="Search by ID or Resident Name..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                <i class="bi bi-search me-2"></i>
                                Search
                            </button>
                            @if(request('search'))
                                <a href="{{ route('incidents.index') }}" class="btn btn-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--bg-secondary);">
                                <tr style="color: var(--text);">
                                    <th>Incident ID</th>
                                    <th>Resident Name</th>
                                    <th>Incident Type</th>
                                    <th>Description</th>
                                    <th>Official Assigned</th>
                                    <th>Date Reported</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($incidents as $incident)
                                    <tr style="color: var(--text);">
                                        <td>{{ $incident->report_id }}</td>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $incident->resident_name }}</td>
                                        <td>{{ $incident->incident_type }}</td>
                                        <td>
                                            <span title="{{ $incident->incident_details ?? 'N/A' }}">
                                                {{ Str::limit($incident->incident_details ?? 'N/A', 60) }}
                                            </span>
                                        </td>
                                        <td>{{ $incident->official_name ?? 'Not Assigned' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($incident->date_reported)->format('M d, Y') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('incidents.edit', $incident->report_id) }}"
                                                    class="btn btn-sm d-inline-flex align-items-center" style="color: var(--primary);">
                                                    <i class="bi bi-pencil-square me-1"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('incidents.delete', $incident->report_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this incident?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm d-inline-flex align-items-center" style="color: #e76f51;">
                                                        <i class="bi bi-trash me-1"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center" style="color: var(--text);">No incident records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incident Modal -->
    <x-data-form-modal
        title="Incident"
        route="{{ route('incidents.store') }}"
        modalId="incidentModal"
        :fields="[
            [
                'name' => 'resident_id',
                'label' => 'Resident',
                'type' => 'select',
                'required' => true,
                'options' => $residents->pluck('resident_name', 'resident_id')->toArray()
            ],
            [
                'name' => 'official_id',
                'label' => 'Assigned Official (Optional)',
                'type' => 'select',
                'required' => false,
                'options' => array_merge(['' => 'Select Official (Optional)'], $officials->pluck('official_name', 'official_id')->toArray())
            ],
            [
                'name' => 'incident_type',
                'label' => 'Incident Type',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'e.g., Noise Complaint, Property Damage, etc.'
            ],
            [
                'name' => 'incident_details',
                'label' => 'Incident Details',
                'type' => 'textarea',
                'required' => true,
                'placeholder' => 'Enter detailed description of the incident'
            ],
            [
                'name' => 'date_reported',
                'label' => 'Date Reported',
                'type' => 'date',
                'required' => true
            ]
        ]"
    />
</x-app-layout>
