<div>
    <div class="max-w-10xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="mt-2 md:mt-0 md:col-span-2">
            <div class="shadow m-2 border border-gray-300 overflow-hidden sm:rounded-md">
                <div class="px-2 py-2 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 sm:col-span-6">
                            <p>{{ __('SCAN QR Code') }}</p>
                        </div>
                    </div>
                </div>
                <div class="px-2 py-2 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-3 sm:col-span-3">
                            <select wire:model="showMethodInfo"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-base
      font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300 rounded transition ease-in-out m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                style="width: 100%">
                                @foreach ($methods as $method)
                                    <option value="{{ $method }}">
                                        {{ $method }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="px-2 py-2 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-3 sm:col-span-3">
                            <input type="text" name="scannedValue" id="scannedValue" wire:model="scannedValue"
                                class="bg-white appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                value="{{ old('tss_number', '') }}" />
                        </div>
                    </div>
                </div>
                <div class="px-2 py-2 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-3 sm:col-span-3">
                            <button wire:click="clearButton"
                                class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-yellow-300 active:bg-yellow-400 focus:outline-none focus:border-600 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Clear') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="px-2 py-2 bg-white sm:p-6">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-12 text">
                            <p wire:model="message" id="message"></p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                        <thead>
                            <tr>
                                <th scope="col" width="50"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col" width="50"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Register_Number
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bag
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Lunch
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Dinner
                                </th>

                                {{-- <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                </th> --}}
                                <th scope="col"
                                    class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Commands
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($scans as $scan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $scan->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap {{ $scan->other_1 == 'One time user.' ? 'text-red-500' : 'text-blue-700' }} text-sm ">
                                        {{ $scan->register_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $scan->date }}
                                    </td>

                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm {{ $scan->bag == 1 ? 'bg-green-200' : 'bg-red-200' }}  text-gray-900">
                                        {{ $scan->bag == 1 ? 'Yes' : 'No' }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm {{ $scan->lunch == 1 ? 'bg-green-200' : 'bg-red-200' }}  text-gray-900">
                                        {{ $scan->lunch == 1 ? 'Yes' : 'No' }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm {{ $scan->dinner == 1 ? 'bg-green-200' : 'bg-red-200' }}  text-gray-900">
                                        {{ $scan->dinner == 1 ? 'Yes' : 'No' }}
                                    </td>
                                    <td
                                    class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $scan->other_1 }}
                                </td>
                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"> --}}
                                    {{-- @foreach ($scan->roles as $role) --}}
                                    {{-- <span --}}
                                    {{-- class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> --}}
                                    {{-- {{ $scan->title }} --}}
                                    {{-- </span> --}}
                                    {{-- @endforeach --}}
                                    {{-- </td> --}}

                                    {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium"> --}}
                                    {{-- <a href="{{ route('users.show', $scan->id) }}" --}}
                                    {{-- class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> --}}
                                    {{-- <a href="{{ route('users.edit', $scan->id) }}" --}}
                                    {{-- class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a> --}}
                                    {{-- <form class="inline-block" --}}
                                    {{-- action="{{ route('users.destroy', $scan->id) }}" method="POST" --}}
                                    {{-- onsubmit="return confirm('Are you sure?');"> --}}
                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                    {{-- <input type="submit" --}}
                                    {{-- class="text-red-600 hover:text-red-900 mb-2 mr-2" --}}
                                    {{-- value="Delete"> --}}
                                    {{-- </form> --}}
                                    {{-- </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
<script>
    window.addEventListener('updatedMessage', event => {
        $('#message').text(event.detail.message);
        document.getElementById("message").style.color = event.detail.color;
        setTimeout(function() {
            document.getElementById("message").style.display = 'none';
        }, 5000);
    });
</script>
