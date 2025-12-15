<!DOCTYPE html>
<html>
<head>
    <title>Incident Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #F8F8ED;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 p-0">
                @include('sidebar')
            </div>
            <div class="col-10 py-4">
                <h2 class="mb-4 fw-bold" style="color: #1F2310;">Incident Records</h2>
                <form action="{{ route('incidents.index') }}" method="GET" class="row g-2 mb-4">
                    <div class="col-10">
                        <input type="text" name="search" class="form-control" style="border-color: #677233;"
                               placeholder="Search by ID or Resident Name..." value="{{ request('search') }}">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn w-100" style="background-color: #454C28; border-color: #454C28; color: white;">Search</button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #677233;">
                        <thead style="background-color: #1F2310;">
                            <tr>
                                <th style="color: black;">Incident ID</th>
                                <th style="color: black;">Resident Name</th>
                                <th style="color: black;">Description</th>
                                <th style="color: black;">Date Reported</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: white;">
                            @forelse($incidents as $incident)
                                <tr>
                                    <td style="color: #1F2310;">{{ $incident->report_id }}</td>
                                    <td style="color: #1F2310;">{{ $incident->resident_name }}</td>
                                    <td style="color: #1F2310;">{{ $incident->incident_details ?? 'N/A' }}</td>
                                    <td style="color: #1F2310;">{{ $incident->created_at ? $incident->created_at->format('M d, Y h:i A') : 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center" style="color: #677233;">No incident records found.</td>
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
