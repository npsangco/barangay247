<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4" style="color: var(--text);">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fs-4 fw-bold mb-0" style="color: var(--text);">Manage Users</h2>
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            <i class="bi bi-person-plus"></i> Create Employee Account
                        </a>
                    </div>

                    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search users..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Search
                            </button>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Linked To</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><strong>{{ $user->id }}</strong></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge bg-danger">Admin</span>
                                        @elseif($user->role == 'employee')
                                            <span class="badge bg-primary">Employee</span>
                                        @else
                                            <span class="badge bg-success">Resident</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->resident_id)
                                            <span class="text-success"><i class="bi bi-person-check"></i> Resident #{{ $user->resident_id }}</span>
                                        @elseif($user->official_id)
                                            <span class="text-primary"><i class="bi bi-star"></i> Official #{{ $user->official_id }}</span>
                                        @else
                                            <span class="text-muted">Not linked</span>
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
