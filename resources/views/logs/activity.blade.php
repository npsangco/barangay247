<x-app-layout>
    <x-slot name="header">
        <h2 class="fw-semibold fs-4" style="color: var(--text);">
            {{ __('System Logs') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="fs-4 fw-bold mb-0" style="color: var(--text);">Activity Logs</h2>
                        <form action="{{ route('logs.clear') }}" method="POST" onsubmit="return confirm('Clear all logs? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Clear All Logs
                            </button>
                        </form>
                    </div>

                    <form action="{{ route('logs.index') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" placeholder="Search logs..." value="{{ request('search') }}" class="form-control">
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
                                    <th scope="col">Time</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Module</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td class="text-nowrap">
                                        {{ $log->created_at->format('M d, Y H:i:s') }}
                                    </td>
                                    <td class="text-nowrap">
                                        {{ $log->user ? $log->user->name : 'System' }}
                                    </td>
                                    <td class="text-nowrap">
                                        <span class="badge rounded-pill
                                            @if(str_contains($log->action, 'Create')) bg-success
                                            @elseif(str_contains($log->action, 'Update')) bg-primary
                                            @elseif(str_contains($log->action, 'Delete')) bg-danger
                                            @else bg-secondary
                                            @endif">
                                            {{ $log->action }}
                                        </span>
                                    </td>
                                    <td>{{ $log->module }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td class="text-muted">{{ $log->ip_address }}</td>
                                    <td class="text-nowrap">
                                        <form action="{{ route('logs.destroy', $log->log_id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Delete this log?')">
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
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
