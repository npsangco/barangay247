<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h3 fw-bold mb-0">Manage Users</h2>
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            Create Employee Account
                        </a>
                    </div>

                    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                        <div class="row g-2">
                            <div class="col">
                                <input type="text" name="search" placeholder="Search users..."
                                       value="{{ request('search') }}"
                                       class="form-control">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
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
                                    <td>{{ $user->id }}</td>
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
                                            <span class="text-success">Resident #{{ $user->resident_id }}</span>
                                        @elseif($user->official_id)
                                            <span class="text-primary">Official #{{ $user->official_id }}</span>
                                        @else
                                            <span class="text-muted">Not linked</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
