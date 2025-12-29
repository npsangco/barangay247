<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Projects') }}
            </h2>
            <a href="{{ route('projects.create') }}"
                class="btn btn-primary d-inline-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i>
                Add Project
            </a>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success mb-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger mb-3" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/projects" method="get" class="mb-4">
                        <div class="d-flex gap-2">
                            <input type="search" name="search" class="form-control"
                                   placeholder="Search Projects..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--bg-secondary); color: var(--text);">
                                <tr>
                                    <th class="fw-medium text-uppercase">Project ID</th>
                                    <th class="fw-medium text-uppercase">Project Name</th>
                                    <th class="fw-medium text-uppercase">Description</th>
                                    <th class="fw-medium text-uppercase">Start Date</th>
                                    <th class="fw-medium text-uppercase">End Date</th>
                                    <th class="fw-medium text-uppercase">Status</th>
                                    <th class="fw-medium text-uppercase">Image</th>
                                    <th class="fw-medium text-uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dgtProjects as $project)
                                <tr>
                                    <td style="color: var(--text);">{{ $project->project_id }}</td>
                                    <td class="fw-semibold" style="color: var(--text);">{{ $project->project_name }}</td>
                                    <td style="color: var(--text);">
                                        <span title="{{ $project->project_description }}">
                                            {{ Str::limit($project->project_description, 80) }}
                                        </span>
                                    </td>
                                    <td style="color: var(--text);">{{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }}</td>
                                    <td style="color: var(--text);">{{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge rounded-pill
                                            @if($project->project_status == 'Completed')" style="background-color: var(--accent); color: #fff;"
                                            @elseif($project->project_status == 'In Progress')" style="background-color: var(--primary); color: #fff;"
                                            @elseif($project->project_status == 'Planning')" style="background-color: var(--bg-secondary); color: var(--primary);"
                                            @elseif($project->project_status == 'On Hold')" style="background-color: #e9c46a; color: var(--text);"
                                            @else" style="background-color: #e76f51; color: #fff;"
                                            @endif>
                                            {{ $project->project_status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($project->image_path)
                                            <img src="{{ $project->image_url }}" alt="Project Image"
                                                 class="rounded" style="height: 64px; width: 64px; object-fit: cover;">
                                        @else
                                            <span style="color: var(--text);">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button
                                                onclick="openModal('projectModal', 'edit', {
                                                    id: {{ $project->project_id }},
                                                    project_name: '{{ $project->project_name }}',
                                                    project_description: '{{ addslashes($project->project_description) }}',
                                                    start_date: '{{ $project->start_date }}',
                                                    end_date: '{{ $project->end_date }}',
                                                    project_status: '{{ $project->project_status }}'
                                                })"
                                                class="btn btn-sm d-inline-flex align-items-center" style="color: var(--primary);">
                                                <i class="bi bi-pencil-square me-1"></i>
                                                Edit
                                            </button>
                                            <form action="{{ route('projects.delete', $project->project_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');">
                                                @csrf
                                                <button type="submit" class="btn btn-sm d-inline-flex align-items-center" style="color: #e76f51;">
                                                    <i class="bi bi-trash me-1"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center" style="color: var(--text);">No projects found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Modal -->
    <x-data-form-modal
        title="Project"
        route="{{ route('projects.store') }}"
        modalId="projectModal"
        :fields="[
            [
                'name' => 'project_name',
                'label' => 'Project Name',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Enter project name'
            ],
            [
                'name' => 'project_description',
                'label' => 'Project Description',
                'type' => 'textarea',
                'required' => true,
                'placeholder' => 'Enter project description'
            ],
            [
                'name' => 'start_date',
                'label' => 'Start Date',
                'type' => 'date',
                'required' => true
            ],
            [
                'name' => 'end_date',
                'label' => 'End Date',
                'type' => 'date',
                'required' => true
            ],
            [
                'name' => 'project_status',
                'label' => 'Project Status',
                'type' => 'select',
                'required' => true,
                'options' => [
                    'Planning' => 'Planning',
                    'In Progress' => 'In Progress',
                    'Completed' => 'Completed',
                    'On Hold' => 'On Hold',
                    'Cancelled' => 'Cancelled'
                ]
            ],
            [
                'name' => 'project_image',
                'label' => 'Project Image',
                'type' => 'file',
                'required' => false,
                'accept' => 'image/jpeg,image/png,image/jpg'
            ]
        ]"
    />
</x-app-layout>
