<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Households') }}
            </h2>
            <a href="{{ route('households.create') }}"
                class="btn btn-primary d-inline-flex align-items-center">
                <i class="bi bi-plus-lg me-2"></i>
                Add Household
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

                    <form action="/households" method="get" class="mb-4">
                        <div class="d-flex gap-2">
                            <input type="search" name="search" class="form-control flex-fill"
                                   placeholder="Search Households..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary d-inline-flex align-items-center">
                                <i class="bi bi-search me-2"></i>
                                Search
                            </button>
                            @if(request('search'))
                                <a href="{{ route('households.index') }}" class="btn btn-secondary">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--bg-secondary);">
                                <tr style="color: var(--text);">
                                    <th>Household ID</th>
                                    <th>Household Head</th>
                                    <th>Address</th>
                                    <th>Contact Information</th>
                                    <th>Number of Members</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($households as $household)
                                <tr style="color: var(--text);">
                                    <td>{{ $household->household_id }}</td>
                                    <td class="fw-semibold" style="color: var(--text);">{{ $household->household_head }}</td>
                                    <td>
                                        <span title="{{ $household->address }}">
                                            {{ Str::limit($household->address, 50) }}
                                        </span>
                                    </td>
                                    <td>{{ $household->contact_information }}</td>
                                    <td>{{ $household->number_of_members }}</td>
                                    <td>
                                        @if($household->image_path)
                                            <img src="{{ asset('storage/'.$household->image_path) }}" alt="Household Image"
                                                 class="rounded" style="height: 64px; width: 64px; object-fit: cover;">
                                        @else
                                            <span style="color: var(--text);">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('households.edit', $household->household_id) }}"
                                                class="btn btn-sm d-inline-flex align-items-center" style="color: var(--primary);">
                                                <i class="bi bi-pencil-square me-1"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('households.delete', $household->household_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                                    <td colspan="7" class="text-center" style="color: var(--text);">No households found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Household Modal -->
    <x-data-form-modal
        title="Household"
        route="{{ route('households.store') }}"
        modalId="householdModal"
        :fields="[
            [
                'name' => 'head',
                'label' => 'Household Head',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Enter household head name'
            ],
            [
                'name' => 'address',
                'label' => 'Address',
                'type' => 'text',
                'required' => true,
                'placeholder' => 'Enter household address'
            ],
            [
                'name' => 'contact',
                'label' => 'Contact Information',
                'type' => 'text',
                'required' => true,
                'placeholder' => '09XXXXXXXXX or +639XXXXXXXXX'
            ],
            [
                'name' => 'members',
                'label' => 'Number of Members',
                'type' => 'number',
                'required' => true,
                'min' => '1',
                'max' => '50',
                'placeholder' => 'Enter number of members'
            ],
            [
                'name' => 'pic',
                'label' => 'Household Image',
                'type' => 'file',
                'required' => false,
                'accept' => 'image/jpeg,image/png,image/jpg'
            ]
        ]"
    />
</x-app-layout>
