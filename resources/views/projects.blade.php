<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #F8F8ED;">
<div class="container-fluid">
    <div class="row">
        <div class="col-2 p-0">
            @include('sidebar')
        </div>
        <div class="col-10 py-4">
            <h2 class="mb-4 fw-bold" style="color: #1F2310;">Project List</h2>
            <form action="/projects" method="get" class="row g-2 mb-4">
                <div class="col-10">
                    <input type="search" name="search" class="form-control" style="border-color: #677233;"
                           placeholder="Search Projects..." value="{{ request('search') }}">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn w-100" style="background-color: #454C28; border-color: #454C28; color: white;">Search</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #677233;">
                    <thead style="background-color: #1F2310;">
                        <tr>
                            <th style="color: black;">Project ID</th>
                            <th style="color: black;">Project Name</th>
                            <th style="color: black;">Project Description</th>
                            <th style="color: black;">Start Date</th>
                            <th style="color: black;">End Date</th>
                            <th style="color: black;">Status</th>
                            <th style="color: black;">Image</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: white;">
                        @forelse($dgtProjects as $project)
                        <tr>
                            <td style="color: #1F2310;">{{ $project->project_id }}</td>
                            <td style="color: #1F2310;">{{ $project->project_name }}</td>
                            <td style="color: #1F2310;">{{ $project->project_description }}</td>
                            <td style="color: #1F2310;">{{ $project->start_date }}</td>
                            <td style="color: #1F2310;">{{ $project->end_date }}</td>
                            <td style="color: #1F2310;">{{ $project->project_status }}</td>
                            <td>
                                @if($project->image_path)
                                    <img src="{{ asset('storage/'.$project->image_path) }}" alt="Project Image"
                                         class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                                @else
                                    <span style="color: #677233;">No Image</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ '/projects/delete/' . $project->project_id }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center" style="color: #677233;">No projects found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
