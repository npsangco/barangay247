<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-4">

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar (Same as 2nd page) -->
        <div class="col-3">
            @include('sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-9">
            <h2 class="mb-4 text-center">Project List</h2>

            <!-- Search form styled like 2nd page -->
            <form action="/projects" method="get" class="row mb-3">
                <div class="col-md-10">
                    <input type="search" name="search" class="form-control" placeholder="Search Projects..."
                        value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Search</button>
                </div>
            </form>

            <!-- Responsive table styled like 2nd page -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($dgtProjects as $project)
                        <tr>
                            <td>{{ $project->project_id }}</td>
                            <td>{{ $project->project_name }}</td>
                            <td>{{ $project->project_description }}</td>
                            <td>{{ $project->start_date }}</td>
                            <td>{{ $project->end_date }}</td>
                            <td>{{ $project->project_status }}</td>
                            <td>
                                @if($project->image_path)
                                    <img src="{{ asset('storage/'.$project->image_path) }}" alt="Project Image"
                                         class="img-thumbnail" style="height: 100px; width: 100px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ '/projects/restore/' . $project->project_id }}" method="post">
                                    @csrf
                                    <button class="btn btn-success" onclick="return confirm('Are you sure you want to restore this project?')">Restore</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No projects found.</td>
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
