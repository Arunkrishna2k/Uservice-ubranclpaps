<style>
    .form-input {
        padding: 10px;
    }

    .shadow-lg {
        --tw-shadow: none !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 rgba(0, 0, 0, 0)), var(--tw-shadow);
    }

</style>
<x-app-layout>
    <div>
        <div class="max-w-10xl mx-auto py-4 sm:px-6 lg:px-8">

            @livewire('rules')
        </div>
    </div>
</x-app-layout>
