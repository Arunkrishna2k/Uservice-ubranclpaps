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
            <div class="mb-2">
                <livewire:highly-used-livewire hideable="select" searchable="phone, name" per-page="20" exportable />
            </div>
        </div>
    </div>
</x-app-layout>
