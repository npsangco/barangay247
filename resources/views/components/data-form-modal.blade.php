@props(['title', 'route', 'method' => 'POST', 'fields' => [], 'data' => null, 'modalId' => 'dataModal'])

<div id="{{ $modalId }}" class="modal hidden fixed inset-0 z-50">
    <!-- Modal Backdrop -->
    <div class="modal-backdrop fixed inset-0 bg-gray-900 bg-opacity-75" onclick="closeModal('{{ $modalId }}')"></div>

    <!-- Modal Panel -->
    <div class="fixed inset-0 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="modal-content relative w-full max-w-2xl bg-white dark:bg-gray-800 rounded-lg shadow-xl" onclick="event.stopPropagation()">

                <!-- Modal Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="modal-title text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Add {{ $title }}
                    </h3>
                    <button type="button" onclick="closeModal('{{ $modalId }}')" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <form id="{{ $modalId }}Form" action="{{ $route }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    <input type="hidden" id="{{ $modalId }}Method" name="_method" value="">

                    <div class="space-y-4">
                        @foreach($fields as $field)
                            <div>
                                <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    {{ $field['label'] }}
                                    @if($field['required'] ?? true)
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>

                                @if($field['type'] === 'textarea')
                                    <textarea
                                        name="{{ $field['name'] }}"
                                        id="{{ $modalId }}_{{ $field['name'] }}"
                                        rows="4"
                                        {{ ($field['required'] ?? true) ? 'required' : '' }}
                                        placeholder="{{ $field['placeholder'] ?? '' }}"
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    ></textarea>

                                @elseif($field['type'] === 'select')
                                    <select
                                        name="{{ $field['name'] }}"
                                        id="{{ $modalId }}_{{ $field['name'] }}"
                                        {{ ($field['required'] ?? true) ? 'required' : '' }}
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                        <option value="">Select {{ $field['label'] }}</option>
                                        @foreach($field['options'] as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>

                                @elseif($field['type'] === 'file')
                                    <input
                                        type="file"
                                        name="{{ $field['name'] }}"
                                        id="{{ $modalId }}_{{ $field['name'] }}"
                                        accept="{{ $field['accept'] ?? 'image/*' }}"
                                        class="w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-900 focus:outline-none">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 edit-only" style="display:none;">
                                        Leave empty to keep current file
                                    </p>

                                @else
                                    <input
                                        type="{{ $field['type'] ?? 'text' }}"
                                        name="{{ $field['name'] }}"
                                        id="{{ $modalId }}_{{ $field['name'] }}"
                                        {{ ($field['required'] ?? true) ? 'required' : '' }}
                                        placeholder="{{ $field['placeholder'] ?? '' }}"
                                        min="{{ $field['min'] ?? '' }}"
                                        max="{{ $field['max'] ?? '' }}"
                                        step="{{ $field['step'] ?? '' }}"
                                        class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                @endif

                                @error($field['name'])
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <button
                            type="button"
                            onclick="closeModal('{{ $modalId }}')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="modal-submit-btn px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(modalId, mode = 'create', data = null) {
    const modal = document.getElementById(modalId);
    const form = document.getElementById(modalId + 'Form');
    const methodInput = document.getElementById(modalId + 'Method');
    const title = modal.querySelector('.modal-title');
    const submitBtn = modal.querySelector('.modal-submit-btn');
    const editOnlyElements = modal.querySelectorAll('.edit-only');

    // Reset form
    form.reset();

    if (mode === 'edit' && data) {
        // Set title and button text
        title.textContent = 'Edit {{ $title }}';
        submitBtn.textContent = 'Update';

        // Set form action and method
        form.action = '{{ $route }}/' + data.id;
        methodInput.value = 'PUT';

        // Fill form fields with data
        @foreach($fields as $field)
            @if($field['type'] !== 'file')
                if (data.{{ $field['name'] }}) {
                    const field_{{ $field['name'] }} = document.getElementById(modalId + '_{{ $field['name'] }}');
                    if (field_{{ $field['name'] }}) {
                        field_{{ $field['name'] }}.value = data.{{ $field['name'] }};
                    }
                }
            @endif
        @endforeach

        // Show edit-only elements
        editOnlyElements.forEach(el => el.style.display = 'block');
    } else {
        // Set title and button text
        title.textContent = 'Add {{ $title }}';
        submitBtn.textContent = 'Create';

        // Set form action and method
        form.action = '{{ $route }}';
        methodInput.value = '';

        // Hide edit-only elements
        editOnlyElements.forEach(el => el.style.display = 'none');
    }

    // Show modal
    modal.classList.remove('hidden');
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

// Close modal on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (!modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
            }
        });
    }
});
</script>
