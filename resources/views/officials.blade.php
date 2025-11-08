<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light py-4">
<div class="container-fluid">
    <div class="row">

        <div class="col-3">
            @include('sidebar')
        </div>

        <div class="col-9">
            <h2 class="mb-4 text-center">Barangay Officials</h2>

            <form action="{{ url('/officials') }}" method="GET" class="row mb-3">
                <div class="col-md-10">
                    <input type="text" name="search" class="form-control" placeholder="Search by Name or Position..."
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
                        <th>Official ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Contact</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse($officials as $official)
                        <tr>
                            <td>{{ $official->official_id }}</td>
                            <td>{{ $official->official_name }}</td>
                            <td>{{ $official->position }}</td>
                            <td>{{ $official->contact_information }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No officials found.</td>
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
