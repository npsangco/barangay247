<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="p-5 bg-light">
    <div class="container bg-white w-75 p-4 border border-success border-5 rounded">
      <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="text-center mb-4">
          <h1 class="display-5 fw-bold">Create New Project</h1>
          <p class="lead">Fill out the form below to register a new project in the system.</p>
        </div>

        <div class="mb-3">
          <label for="project_name" class="form-label fw-semibold">Project Name</label>
          <input type="text" name="project_name" id="project_name" maxlength="100"
                 class="form-control @error('project_name') is-invalid @enderror" placeholder="Enter project name">
          @error('project_name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="project_description" class="form-label fw-semibold">Project Description</label>
          <textarea name="project_description" id="project_description" rows="5"
                    class="form-control @error('project_description') is-invalid @enderror"
                    placeholder="Describe the project..."></textarea>
          @error('project_description')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="start_date" class="form-label fw-semibold">Start Date</label>
          <input type="date" name="start_date" id="start_date"
                 class="form-control @error('start_date') is-invalid @enderror">
          @error('start_date')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="end_date" class="form-label fw-semibold">End Date</label>
          <input type="date" name="end_date" id="end_date"
                 class="form-control @error('end_date') is-invalid @enderror">
          @error('end_date')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="project_status" class="form-label fw-semibold">Project Status</label>
          <textarea name="project_status" id="project_status" rows="3"
                    class="form-control @error('project_status') is-invalid @enderror"
                    placeholder="Enter project status, e.g., 'Pending: Project has not been started'"></textarea>
          @error('project_status')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
            <label for="project_image" class="form-label fw-semibold">Project Image</label>
            <input type="file" name="project_image" id="project_image"
                    class="form-control @error('project_image') is-invalid @enderror">
            @error('project_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="text-center">
          <input type="submit" value="Submit Project" class="btn btn-success w-50">
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
