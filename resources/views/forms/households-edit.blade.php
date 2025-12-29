<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Edit Household') }}
            </h2>
            <a href="{{ route('households.index') }}" class="btn btn-secondary">
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

                    <form action="{{ route('households.update', $household->household_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="head" class="form-label">Household Head <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="head" name="head" value="{{ old('head', $household->household_head) }}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $household->address) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="contact" class="form-label">Contact Information <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $household->contact_information) }}" required pattern="^(09\d{9}|\+639\d{9})$">
                            </div>
                            <div class="col-md-6">
                                <label for="members" class="form-label">Number of Members <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="members" name="members" value="{{ old('members', $household->number_of_members) }}" required min="1" max="50">
                            </div>
                            <div class="col-md-12">
                                <label for="pic" class="form-label">Household Image</label>
                                <input type="file" class="form-control" id="pic" name="pic" accept="image/*">
                                @if($household->image_path)
                                    <small class="text-muted">Current: {{ basename($household->image_path) }}</small>
                                @endif
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> Update Household
                                </button>
                                <a href="{{ route('households.index') }}" class="btn btn-secondary">
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
