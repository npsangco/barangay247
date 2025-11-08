<!DOCTYPE html>
<html>
<head>
    <title>Incident Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                @include('sidebar')
            </div>
            <div class="col-9">
                <h2 class="mb-4 text-center">Incident Records</h2>
                <form action="{{ url('/display') }}" method="GET" class="row mb-3">
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" placeholder="Search by ID or Resident Name"
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Search</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Incident ID</th>
                                <th>Resident Name</th>
                                <th>Description</th>
                                <th>Date Reported</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($incidents as $incident)
                                <tr>
                                    <td>{{ $incident->report_id }}</td>
                                    <td>{{ $incident->resident_name }}</td>
                                    <td>{{ $incident->incident_details ?? 'N/A' }}</td>
                                    <td>{{ $incident->created_at ? $incident->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No incident records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
