<div>
    @if (Auth::user()->name == 'Admin')
    <form method="post" action="{{ route('settings.store') }}">
        @csrf
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-12">
                <div class="card-body">
                    <table class="table" id="products_table">
                        <thead>
                            <tr>
                                <th>Days</th>
                                <th>Count</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rulesData as $index => $rule)
                                <tr>
                                    <td>
                                        <input type="number" name="rulesData[{{ $index }}][days]"
                                            class="form-input rounded-md shadow-sm mt-1 ml-2 block w-full focus:ring-green-500 focus:border-green-500"
                                            wire:model="rulesData.{{ $index }}.days" />
                                    </td>
                                    <td>
                                        <input type="number" name="rulesData[{{ $index }}][count]"
                                            class="form-input rounded-md shadow-sm mt-1 ml-2 block w-full focus:ring-green-500 focus:border-green-500"
                                            wire:model="rulesData.{{ $index }}.count" />
                                    </td>
                                    <td>
                                        <a href="#" wire:click.prevent="removeProduct({{ $index }})"
                                            class="bg-red-500 hover:bg-red-600 text-white font-bold rounded-full py-1 mt-2 ml-2 px-1 inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg><span> </span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <button
                                class="bg-green-500 hover:bg-green-600 text-white font-bold rounded py-1 px-1 mt-2 inline-flex items-center"
                                wire:click.prevent="addRules">+ Add Rules
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold rounded py-1 px-1 mt-2 inline-flex items-center"
                                wire:click.prevent="updateSettings">Update Setting
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    @else
    <div class="px-4 py-5 bg-white sm:p-6">
        <p>Contact admin for more info.</p>
    </div>
    @endif
</div>
