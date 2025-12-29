<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4" style="color: var(--text);">
            {{ __('Archives') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success mb-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Projects Archive -->
            <div class="card mb-4">
                <div class="card-header" style="background-color: var(--bg-secondary);">
                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">
                        <i class="bi bi-folder-fill me-2"></i>Archived Projects
                    </h3>
                </div>
                <div class="card-body">
                    @if($projects->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                    <tr>
                                        <th class="fw-medium text-uppercase">Project Name</th>
                                        <th class="fw-medium text-uppercase">Status</th>
                                        <th class="fw-medium text-uppercase">Deleted At</th>
                                        <th class="fw-medium text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $project->project_name }}</td>
                                        <td style="color: var(--text);">{{ $project->project_status }}</td>
                                        <td style="color: var(--text);">{{ $project->deleted_at->format('M d, Y') }}</td>
                                        <td>
                                            <form action="{{ route('archives.restore.project', $project->project_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this project?')">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Restore
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No archived projects.</p>
                    @endif
                </div>
            </div>

            <!-- Officials Archive -->
            <div class="card mb-4">
                <div class="card-header" style="background-color: var(--bg-secondary);">
                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">
                        <i class="bi bi-person-badge-fill me-2"></i>Archived Officials
                    </h3>
                </div>
                <div class="card-body">
                    @if($officials->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                    <tr>
                                        <th class="fw-medium text-uppercase">Name</th>
                                        <th class="fw-medium text-uppercase">Position</th>
                                        <th class="fw-medium text-uppercase">Deleted At</th>
                                        <th class="fw-medium text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($officials as $official)
                                    <tr>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $official->official_name }}</td>
                                        <td style="color: var(--text);">{{ $official->position }}</td>
                                        <td style="color: var(--text);">{{ $official->deleted_at->format('M d, Y') }}</td>
                                        <td>
                                            <form action="{{ route('archives.restore.official', $official->official_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this official?')">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Restore
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No archived officials.</p>
                    @endif
                </div>
            </div>

            <!-- Residents Archive -->
            <div class="card mb-4">
                <div class="card-header" style="background-color: var(--bg-secondary);">
                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">
                        <i class="bi bi-person-fill me-2"></i>Archived Residents
                    </h3>
                </div>
                <div class="card-body">
                    @if($residents->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                    <tr>
                                        <th class="fw-medium text-uppercase">Name</th>
                                        <th class="fw-medium text-uppercase">Contact</th>
                                        <th class="fw-medium text-uppercase">Deleted At</th>
                                        <th class="fw-medium text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($residents as $resident)
                                    <tr>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $resident->resident_name }}</td>
                                        <td style="color: var(--text);">{{ $resident->contact_information }}</td>
                                        <td style="color: var(--text);">{{ $resident->deleted_at->format('M d, Y') }}</td>
                                        <td>
                                            <form action="{{ route('archives.restore.resident', $resident->resident_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this resident?')">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Restore
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No archived residents.</p>
                    @endif
                </div>
            </div>

            <!-- Households Archive -->
            <div class="card mb-4">
                <div class="card-header" style="background-color: var(--bg-secondary);">
                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">
                        <i class="bi bi-house-fill me-2"></i>Archived Households
                    </h3>
                </div>
                <div class="card-body">
                    @if($households->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                    <tr>
                                        <th class="fw-medium text-uppercase">Household Head</th>
                                        <th class="fw-medium text-uppercase">Members</th>
                                        <th class="fw-medium text-uppercase">Deleted At</th>
                                        <th class="fw-medium text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($households as $household)
                                    <tr>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $household->household_head }}</td>
                                        <td style="color: var(--text);">{{ $household->number_of_members }}</td>
                                        <td style="color: var(--text);">{{ $household->deleted_at->format('M d, Y') }}</td>
                                        <td>
                                            <form action="{{ route('archives.restore.household', $household->household_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this household?')">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Restore
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No archived households.</p>
                    @endif
                </div>
            </div>

            <!-- Incidents Archive -->
            <div class="card mb-4">
                <div class="card-header" style="background-color: var(--bg-secondary);">
                    <h3 class="fs-5 fw-semibold mb-0" style="color: var(--text);">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>Archived Incidents
                    </h3>
                </div>
                <div class="card-body">
                    @if($incidents->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                    <tr>
                                        <th class="fw-medium text-uppercase">Incident Type</th>
                                        <th class="fw-medium text-uppercase">Reporter</th>
                                        <th class="fw-medium text-uppercase">Deleted At</th>
                                        <th class="fw-medium text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($incidents as $incident)
                                    <tr>
                                        <td class="fw-semibold" style="color: var(--text);">{{ $incident->incident_type }}</td>
                                        <td style="color: var(--text);">{{ $incident->resident ? $incident->resident->resident_name : 'N/A' }}</td>
                                        <td style="color: var(--text);">{{ $incident->deleted_at->format('M d, Y') }}</td>
                                        <td>
                                            <form action="{{ route('archives.restore.incident', $incident->report_id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to restore this incident?')">
                                                    <i class="bi bi-arrow-counterclockwise me-1"></i>Restore
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">No archived incidents.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
