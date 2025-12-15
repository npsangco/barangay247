<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Officials</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #F8F8ED;">
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            @include('sidebar')
        </div>
        <div class="col-10 py-4">
            <h2 class="mb-4 fw-bold" style="color: #1F2310;">Barangay Officials</h2>
            <form action="{{ url('/officials') }}" method="GET" class="row g-2 mb-4">
                <div class="col-10">
                    <input type="text" name="search" class="form-control" style="border-color: #677233;"
                           placeholder="Search by Name or Position..." value="{{ request('search') }}">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn w-100" style="background-color: #454C28; border-color: #454C28; color: white;">Search</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #677233;">
                    <thead style="background-color: #1F2310;">
                    <tr>
                        <th style="color: black;">Official ID</th>
                        <th style="color: black;">Name</th>
                        <th style="color: black;">Position</th>
                        <th style="color: black;">Contact</th>
                    </tr>
                    </thead>
                    <tbody style="background-color: white;">
                    @forelse($officials as $official)
                        <tr>
                            <td style="color: #1F2310;">{{ $official->official_id }}</td>
                            <td style="color: #1F2310;">{{ $official->official_name }}</td>
                            <td style="color: #1F2310;">{{ $official->position }}</td>
                            <td style="color: #1F2310;">{{ $official->contact_information }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center" style="color: #677233;">No officials found.</td>
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
