<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #F8F8ED;">
<div class="container-fluid">
    <div class="row">

        <div class="col-2 p-0">
            @include('sidebar')
        </div>

        <div class="col-10 py-4">
            <h2 class="mb-4 fw-bold" style="color: #1F2310;">Residents List</h2>

            <form action="{{ url('/residents') }}" method="GET" class="row g-2 mb-4">
                <div class="col-10">
                    <input type="text" name="search" class="form-control" style="border-color: #677233;"
                           placeholder="Search by Name or ID..." value="{{ request('search') }}">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn w-100" style="background-color: #454C28; border-color: #454C28; color: white;">Search</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #677233;">
                    <thead style="background-color: #1F2310;">
                        <tr>
                            <th style="color: black;">Resident ID</th>
                            <th style="color: black;">Name</th>
                            <th style="color: black;">Date of Birth</th>
                            <th style="color: black;">Gender</th>
                            <th style="color: black;">Contact</th>
                            <th style="color: black;">Address</th>
                        </tr>
                    </thead>

                    <tbody style="background-color: white;">
                        @forelse($residents as $resident)
                        <tr>
                            <td style="color: #1F2310;">{{ $resident->resident_id }}</td>
                            <td style="color: #1F2310;">{{ $resident->resident_name }}</td>
                            <td style="color: #1F2310;">{{ \Carbon\Carbon::parse($resident->date_of_birth)->format('M d, Y') }}</td>
                            <td style="color: #1F2310;">{{ $resident->gender }}</td>
                            <td style="color: #1F2310;">{{ $resident->contact_information }}</td>
                            <td style="color: #1F2310;">{{ $resident->address }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center" style="color: #677233;">No residents found.</td>
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
