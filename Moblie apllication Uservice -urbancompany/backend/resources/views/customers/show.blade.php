<x-app-layout>
    <nav class="container">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-2"><a href="{{ url('/dashboard') }}" class="no-underline text-indigo">Dashboard</a></li>
            <li>/</li>
            <li class="px-2"><a href="{{ route('customers.index') }}" class="no-underline text-indigo">Customer List</a>
            </li>
            <li>/</li>
            <li class="px-2 text-gray-500">Show Customer List</li>
        </ol>
    </nav>
    <div>
        <div class="max-w-10xl mx-auto sm:px-4 lg:px-6 justify-center">
            <div class="mb-2">
                @livewire('id-card',['params' => $customer])
            </div>
        </div>
        <div class="max-w-10xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Register Number') }} : <span
                                                class="text-pink-600">{{$customer->register_number}}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Customer Name') }} : <span
                                                class="text-pink-600">{{$customer->customer_name}}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Phone Number') }} : <span
                                                class="text-pink-600">{{$customer->phone_number}}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Email') }} : <span
                                                class="text-pink-600">{{$customer->email}}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>

                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Register Type') }} : <span
                                                class="text-pink-600">{{$customer->register_type}}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('MCI Number') }} : <span
                                                class="text-pink-600">{{$customer->mci_number}}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>

                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Remarks') }} : <span
                                                class="text-pink-600">{{$customer->remarks}}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Status') }} : <span
                                                class="text-pink-600">{{ $customer->status == 1 ? "Yes" : "No" }}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Created By') }} : <span
                                                class="text-pink-600">{{ $customer->created_by }}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Updated By') }} : <span
                                                class="text-pink-600">{{ $customer->updated_by }}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                        <dd class="mt-1 text-xs text-gray-900 sm:mt-0 sm:col-span-1">
                            <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Created At') }} : <span
                                                class="text-pink-600">{{ $customer->created_at }}</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-xs">
                                    <div class="ml-4 flex-shrink-0 font-bold">
                                        <p>{{ __('Updated At') }} : <span
                                                class="text-pink-600">{{ $customer->updated_at }}</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                </dl>

                <div class="block mt-8">
                    <a href="{{ route('customers.index') }}"
                       class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
                </div>
            </div>
        </div>
</x-app-layout>
