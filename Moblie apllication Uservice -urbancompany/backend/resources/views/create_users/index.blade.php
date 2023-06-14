<style>
    .form-input {
        padding: 10px;
        --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }
</style>
<x-guest-layout>
    <div class="py-6">
        <div class="max-w-10xl mx-auto sm:px-4 lg:px-6 py-6">
            <div class="block mb-4 ">
            <div class="flex-shrink-0 flex items-center font-weight-800 bg-gray-800 px-2  p-4">
                <p><strong><span class="text-gray-50">MADURAI</span> <span class="text-red-500">PEDICON 2022</span></strong>
                </p>
            </div>
            </div>
            <div class="block mb-4">
                <a href="{{ route('create_users.create') }}"
                    class="bg-blue-800 hover:bg-blue-600 text-white font-bold rounded-full py-2 px-4 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg><span> {{ __('Create New User') }}</span>
                </a>
            </div>
            <div class="mb-2 p-5">
                <h1>{{ $message }}</h1>
            </div>
        </div>
    </div>
</x-guest-layout>
