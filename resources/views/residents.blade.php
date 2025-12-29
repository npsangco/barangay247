<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Residents') }}
            </h2>
            <a href="{{ route('residents.create') }}"
                class="btn btn-primary d-inline-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i>
                Add Resident
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

                    <form action="{{ url('/residents') }}" method="GET" class="mb-4">
                        <div class="d-flex gap-2">
                            <input type="text" name="search" class="form-control flex-fill"
                                   placeholder="Search by Name or ID..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                <i class="bi bi-search me-2"></i>
                                Search
                            </button>
                            @if(request('search'))
                                <a href="{{ route('residents.index') }}" class="btn btn-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--bg-secondary);">
                                <tr style="color: var(--text);">
                                    <th>Resident ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($residents as $resident)
                                <tr style="color: var(--text);">
                                    <td>{{ $resident->resident_id }}</td>
                                    <td class="fw-semibold" style="color: var(--text);">{{ $resident->resident_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($resident->date_of_birth)->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge rounded-pill
                                            @if($resident->gender == 'Male')" style="background-color: var(--primary); color: #fff;"
                                            @elseif($resident->gender == 'Female')" style="background-color: var(--accent); color: #fff;"
                                            @else" style="background-color: var(--bg-secondary); color: var(--primary);"
                                            @endif>
                                            {{ $resident->gender }}
                                        </span>
                                    </td>
                                    <td>{{ $resident->contact_information }}</td>
                                    <td>
                                        <span title="{{ $resident->address }}">
                                            {{ Str::limit($resident->address, 50) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('residents.edit', $resident->resident_id) }}"
                                                class="btn btn-sm d-inline-flex align-items-center" style="color: var(--primary);">
                                                <i class="bi bi-pencil-square me-1"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('residents.delete', $resident->resident_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this resident?');">
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
                                    <td colspan="7" class="text-center" style="color: var(--text);">No residents found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Resident Modal -->
    <x-data-form-modal
        title="Resident"
        route="{{ route('residents.store') }}"
        modalId="residentModal"
        :fields="[
            [
                'name' => 'name',
                'label' => 'Resident Name',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Enter resident name'
            ],
            [
                'name' => 'date_of_birth',
                'label' => 'Date of Birth',
                'type' => 'date',
                'required' => true
            ],
            [
                'name' => 'gender',
                'label' => 'Gender',
                'type' => 'select',
                'required' => true,
                'options' => [
                    'Male' => 'Male',
                    'Female' => 'Female',
                    'Other' => 'Other'
                ]
            ],
            [
                'name' => 'contact',
                'label' => 'Contact Information',
                'type' => 'text',
                'required' => true,
                'placeholder' => '09XXXXXXXXX or +639XXXXXXXXX'
            ],
            [
                'name' => 'address',
                'label' => 'Address',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Enter address'
            ]
        ]"
    />
</x-app-layout>
