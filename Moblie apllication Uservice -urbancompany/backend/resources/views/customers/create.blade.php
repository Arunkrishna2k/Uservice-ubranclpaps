<x-app-layout>
    <nav class="container">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-2"><a href="{{ url('/dashboard') }}" class="no-underline text-indigo">Dashboard</a></li>
            <li>/</li>
            <li class="px-2"><a href="{{ route('customers.index') }}" class="no-underline text-indigo">Customer List</a></li>
            <li>/</li>
            <li class="px-2 text-gray-500">Create Customer</li>
        </ol>
        </ol>
    </nav>
    <div>
        <div class="max-w-10xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="phone" class="block font-medium text-xs text-gray-700">Register Number<span class="text-red-500">&#42;</span></label>
                                    <input type="text" name="register_number" id="register_number" maxlength="15"
                                           class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('register_number', '') }}" />
                                    @error('register_number')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="customer_name" class="block font-medium text-xs text-gray-700">Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name"
                                           class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('customer_name', '') }}" />
                                    @error('customer_name')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="phone_number" class="block font-medium text-xs text-gray-700">Phone Number</label>
                                    <input type="number" name="phone_number" id="phone_number"
                                           class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                           value="{{ old('phone_number', '') }}" />
                                    @error('phone_number')
                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="email" class="block font-medium text-xs text-gray-700">Email</label>
                                    <input type="email" name="email" id="email"
                                           class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                           value="{{ old('email', '') }}" />
                                    @error('email')
                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                 <div class="col-span-12 sm:col-span-3">
                                    <label for="register_type" class="block font-medium text-xs text-gray-700">Register type</label>
                                    <select id="register_type" name="register_type" autocomplete="register_type"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                                        <option value="Senior Citizen">Senior Citizen</option>
                                        <option value="Consultant IAP Member">Consultant IAP Member</option>
                                        <option value="Consultant Non- Member">Consultant Non- Member</option>
                                        <option value="PG Non - Member">PG Non - Member</option>
                                        <option value="IAP">IAP</option>
                                        <option value="PG IAP Member">PG IAP Member</option>
                                        <option value="NON IAP MEMBER">NON IAP MEMBER</option>
                                    </select>
                                    @error('register_type')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="mci_number" class="block font-medium text-xs text-gray-700">MCI Number</label>
                                    <input type="text" name="mci_number" id="mci_number"
                                           class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('mci_number', '') }}" />
                                    @error('mci_number')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="remarks" class="block font-bold text-xs text-gray-700">{{ __('Remarks') }}</label>
                                    <textarea type="text" name="remarks" id="remarks"
                                              class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                              value="{{ old('remarks', '') }}"></textarea>
                                    @error('remarks')
                                    <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="status" class="block text-xs font-medium text-gray-700">Status<span class="text-red-500">&#42;</span></label>
                                    <select id="status" name="status" autocomplete="status"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-gray-200 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                    @error('status')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6 hidden">
                            <label for="created_by" class="block font-medium text-xs text-gray-700">Created By
                            </label>
                            <input type="number" name="created_by" id="created_by"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('created_by', Auth::user()->id) }}" />
                            @error('created_by')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6 hidden">
                            <label for="updated_by" class="block font-medium text-xs text-gray-700">Modified By
                            </label>
                            <input type="number" name="updated_by" id="updated_by"
                                class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('updated_by', Auth::user()->id) }}" />
                            @error('updated_by')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
