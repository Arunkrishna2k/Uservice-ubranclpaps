<x-app-layout>
    <nav class="container">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-2"><a href="{{ url('/dashboard') }}" class="no-underline text-indigo">Dashboard</a></li>
            <li>/</li>
            <li class="px-2"><a href="{{ route('product.index') }}" class="no-underline text-indigo">Product List</a>
            </li>
            <li>/</li>
            <li class="px-2 text-gray-500">Create Product</li>
        </ol>
        </ol>
    </nav>
    <div>
        <div class="max-w-10xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 sm:col-span-12">
                                    @livewire('category-sub-category')
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="product" class="block font-medium text-xs text-gray-700">Product
                                        Name<span class="text-red-500">&#42;</span></label>
                                    <input type="text" name="product" id="product"
                                        class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('product', '') }}" />
                                    @error('product')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="photo" class="block font-medium text-xs text-gray-700">Photo
                                    </label>
                                    <input type="file" name="photo" id="photo"
                                        class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('photo', '') }}" />
                                    @error('photo')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="price" class="block font-medium text-xs text-gray-700">Price
                                        <span class="text-red-500">&#42;</span></label>
                                    <input type="number" name="price" id="price"
                                        class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('price', '') }}" />
                                    @error('price')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="remarks"
                                        class="block font-bold text-xs text-gray-700">{{ __('Remarks') }}</label>
                                    <textarea type="text" name="remarks" id="remarks"
                                        class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                        value="{{ old('remarks', '') }}"></textarea>
                                    @error('remarks')
                                        <p class="text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-span-12 sm:col-span-3">
                                    <label for="status" class="block text-xs font-medium text-gray-700">Status<span
                                            class="text-red-500">&#42;</span></label>
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
