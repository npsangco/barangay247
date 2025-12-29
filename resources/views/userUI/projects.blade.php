<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 fw-semibold">Barangay Projects</h2>
    </x-slot>

    <div class="container">
        <form method="GET" action="{{ route('resident.projects') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Search projects by name, description, or status..." class="form-control">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
                @if(request('search'))
                    <a href="{{ route('resident.projects') }}" class="btn btn-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($projects as $project)
                <div class="col">
                    <div class="card h-100">
                        @if($project->image_path)
                            <img src="{{ asset('storage/' . $project->image_path) }}"
                                 class="card-img-top" alt="{{ $project->project_name }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-gradient"
                                 style="height: 200px; background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);"></div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                @php
                                    $statusClass = match($project->project_status) {
                                        'completed' => 'bg-success',
                                        'ongoing' => 'bg-info',
                                        'planning' => 'bg-warning',
                                        default => 'bg-secondary'
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ ucfirst($project->project_status) }}</span>
                                <small class="text-muted">{{ $project->created_at->diffForHumans() }}</small>
                            </div>
                            <h5 class="card-title">
                                <a href="{{ route('resident.project.show', $project->project_id) }}"
                                   class="text-decoration-none" style="color: var(--primary);">
                                    {{ $project->project_name }}
                                </a>
                            </h5>
                            <p class="card-text text-muted">{{ Str::limit($project->project_description, 120) }}</p>
                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($project->start_date)->format('M d, Y') }} -
                                    {{ \Carbon\Carbon::parse($project->end_date)->format('M d, Y') }}
                                </small>
                            </div>
                            <a href="{{ route('resident.project.show', $project->project_id) }}"
                               class="btn btn-sm btn-primary">
                                View Details <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-folder2-open display-1 text-muted"></i>
                    <h3 class="mt-3">No projects available</h3>
                    <p class="text-muted">Check back later for new barangay projects.</p>
                </div>
            @endforelse
        </div>

        @if($projects->hasPages())
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
