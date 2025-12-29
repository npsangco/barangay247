<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Barangay Officials') }}
            </h2>
            <a href="{{ route('officials.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i>
                Add Official
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

                    <form action="{{ url('/officials') }}" method="GET" class="mb-4">
                        <div class="d-flex gap-2">
                            <input type="text" name="search" class="form-control"
                                   placeholder="Search by Name or Position..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="{{ route('officials.index') }}" class="btn btn-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--bg-secondary); color: var(--text);">
                            <tr>
                                <th class="fw-medium text-uppercase">Official ID</th>
                                <th class="fw-medium text-uppercase">Name</th>
                                <th class="fw-medium text-uppercase">Position</th>
                                <th class="fw-medium text-uppercase">Contact</th>
                                <th class="fw-medium text-uppercase">Term Period</th>
                                <th class="fw-medium text-uppercase">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($officials as $official)
                                <tr>
                                    <td style="color: var(--text);">{{ $official->official_id }}</td>
                                    <td class="fw-semibold" style="color: var(--text);">{{ $official->official_name }}</td>
                                    <td style="color: var(--text);">{{ $official->position }}</td>
                                    <td style="color: var(--text);">{{ $official->contact_information }}</td>
                                    <td style="color: var(--text);">
                                        {{ \Carbon\Carbon::parse($official->term_start)->format('M d, Y') }} -
                                        {{ \Carbon\Carbon::parse($official->term_end)->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('officials.edit', $official->official_id) }}"
                                               class="btn btn-sm d-inline-flex align-items-center"
                                               style="color: var(--primary);">
                                                <i class="bi bi-pencil-square me-1"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('officials.delete', $official->official_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this official?');">
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
                                    <td colspan="6" class="text-center" style="color: var(--text);">No officials found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
