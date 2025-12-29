<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-semibold fs-4" style="color: var(--text);">
                {{ __('Edit Official') }}
            </h2>
            <a href="{{ route('officials.index') }}" class="btn btn-secondary">
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

                    <form action="{{ route('officials.update', $official->official_id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Official Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $official->official_name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $official->position) }}" required>
                            </div>
                            <div class="col-md-12">
                                <label for="contact" class="form-label">Contact Information <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $official->contact_information) }}" required pattern="^(09\d{9}|\+639\d{9})$">
                            </div>
                            <div class="col-md-6">
                                <label for="term_start" class="form-label">Term Start <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="term_start" name="term_start" value="{{ old('term_start', $official->term_start) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="term_end" class="form-label">Term End <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="term_end" name="term_end" value="{{ old('term_end', $official->term_end) }}" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i> Update Official
                                </button>
                                <a href="{{ route('officials.index') }}" class="btn btn-secondary">
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
