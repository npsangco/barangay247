<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Add New Project') }}
            </h2>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="project_name" class="form-label">Project Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="project_name" name="project_name" value="{{ old('project_name') }}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="project_description" class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="project_description" name="project_description" rows="4" required>{{ old('project_description') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="project_status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="project_status" name="project_status" required>
                                    <option value="">Select Status</option>
                                    <option value="Planning" {{ old('project_status') == 'Planning' ? 'selected' : '' }}>Planning</option>
                                    <option value="In Progress" {{ old('project_status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ old('project_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="On Hold" {{ old('project_status') == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                                    <option value="Cancelled" {{ old('project_status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="project_image" class="form-label">Project Image</label>
                                <input type="file" class="form-control" id="project_image" name="project_image" accept="image/*">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> Create Project
                                </button>
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
