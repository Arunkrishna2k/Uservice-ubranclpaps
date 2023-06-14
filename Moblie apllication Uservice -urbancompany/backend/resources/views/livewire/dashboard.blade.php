<div class="px-2 py-2">
    <div class="w-full my-2">
        <div x-data={show:true} class="rounded-sm">
            <div class="border border-b-0 bg-gray-100 px-2 py-2" id="headingOne">
                <button @click="show=!show" class="underline text-green-500 hover:text-green-700 focus:outline-none"
                        type="button">
                    <strong>{{ __('Total Product and Service') }}</strong>
                </button>
            </div>
            <div class="grid grid-cols-12 gap-6 px-4 py-4">
                <div class="col-span-12 md:col-span-4 sm:col-span-4">
                    <div
                        class="text-center flex flex-col p-4 md:text-left md:flex-row md:items-center md:justify-between md:p-4 bg-yellow-50 rounded-full">
                        <div class="text-md font-semibold">
                            <div class="text-gray-900">{{ __('Total Category') }}</div>
                        </div>

                        <div class="mt-3 md:mt-0 md:ml-2">
                            <div
                                class="inline-block rounded-full text-md font-semibold py-2 px-4 text-black bg-yellow-300">
                                {{$category}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 sm:col-span-4">
                    <div
                        class="text-center flex flex-col p-4 md:text-left md:flex-row md:items-center md:justify-between md:p-4 bg-yellow-50 rounded-full">
                        <div class="text-md font-semibold">
                            <div class="text-gray-900">{{ __('Total Sub Category') }}</div>
                        </div>
                        <div class="mt-3 md:mt-0 md:ml-2">
                            <div
                                class="inline-block rounded-full text-md font-semibold py-2 px-4 text-black bg-yellow-300">
                                {{$subCategory}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 sm:col-span-4">
                    <div
                        class="text-center flex flex-col p-4 md:text-left md:flex-row md:items-center md:justify-between md:p-4 bg-yellow-50 rounded-full">
                        <div class="text-md font-semibold">
                            <div class="text-gray-900">{{ __('Total Product') }}</div>
                        </div>

                        <div class="mt-3 md:mt-0 md:ml-2">
                            <div
                                class="inline-block rounded-full text-md font-semibold py-2 px-4 text-black bg-yellow-300">
                                {{$product}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 sm:col-span-4">
                    <div
                        class="text-center flex flex-col p-4 md:text-left md:flex-row md:items-center md:justify-between md:p-4 bg-yellow-50 rounded-full">
                        <div class="text-md font-semibold">
                            <div class="text-gray-900">{{ __('Total Order') }}</div>
                        </div>

                        <div class="mt-3 md:mt-0 md:ml-2">
                            <div
                                class="inline-block rounded-full text-md font-semibold py-2 px-4 text-black bg-yellow-300">
                                {{$order}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

