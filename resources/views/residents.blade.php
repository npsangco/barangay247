<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light py-4">
<div class="container-fluid">
    <div class="row">

        <div class="col-3">
            @include('sidebar')
        </div>

        <div class="col-9">
            <h2 class="mb-4 text-center">Residents List</h2>

            <form action="{{ url('/residents') }}" method="GET" class="row mb-3">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control"
                           placeholder="Search by Name or ID..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Resident ID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Address</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($residents as $resident)
                        <tr>
                            <td>{{ $resident->resident_id }}</td>
                            <td>{{ $resident->resident_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($resident->date_of_birth)->format('M d, Y') }}</td>
                            <td>{{ $resident->gender }}</td>
                            <td>{{ $resident->contact_information }}</td>
                            <td>{{ $resident->address }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No residents found.</td>
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
