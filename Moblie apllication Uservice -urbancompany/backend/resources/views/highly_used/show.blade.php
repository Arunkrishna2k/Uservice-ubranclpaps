<x-app-layout>
    <nav class="container">
        <ol class="list-reset py-4 pl-4 rounded flex bg-grey-light text-grey">
            <li class="px-2"><a href="{{ url('/dashboard') }}" class="no-underline text-indigo">Dashboard</a></li>
            <li>/</li>
            <li class="px-2"><a href="{{ route('blocklist.index') }}" class="no-underline text-indigo">Block List</a></li>
            <li>/</li>
            <li class="px-2 text-gray-500">Show Block List</li>
        </ol>
    </nav>
    <div>
        <div class="max-w-10xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->id }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Phone
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->phone }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Remarks
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->remarks }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        status
                                    </th>
                                    <td
                                        class="px-6 py-4 {{ $blocklist->status == 1 ? 'bg-green-100' : 'bg-red-100' }} whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->status == 1 ? 'Active' : 'In-Active' }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated By
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->updated_by }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Updated At
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->updated_at }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created By
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->created_by }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col"
                                        class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At
                                    </th>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-xs text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $blocklist->created_at }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block mt-8">
                <a href="{{ route('blocklist.index') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
        </div>
    </div>
</x-app-layout>
