<style>
    .form-input {
        padding: 10px;
        --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

</style>
<x-app-layout>
    <div class="py-6">
        <div class="max-w-10xl mx-auto sm:px-4 lg:px-6">
            <div class="block mb-4">
                <a href="{{ route('category.create') }}"
                    class="bg-gray-800 hover:bg-gray-600 text-white font-bold rounded-full py-2 px-4 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg><span> {{ __('Add Category') }}</span>
                </a>
            </div>
            <div class="mb-2">
                <livewire:livewire-category hideable="select" searchable="category" per-page="20" exportable />
            </div>
        </div>
    </div>
</x-app-layout>
