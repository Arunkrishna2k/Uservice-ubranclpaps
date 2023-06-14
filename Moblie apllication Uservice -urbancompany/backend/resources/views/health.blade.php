<x-app-layout>

    <div class=" p-4 mt-2 mb-2 overflow-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-6 md:grid-cols-6 lg:grid-cols-6 xl:grid-cols-6">

            <!-- Start Card -->
            <div class="bg-red-800 pt-1 px-2 bg-gradient-to-b from-red-600 to-red-800 rounded-xl shadow-md w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-red-300 ring-2 ring-red-100 rounded-lg w-32">
                        <p class="text-white font-semibold">DB Name</p>
                    </div>
                </div>
                <div class="p-4 justify-center">
                    <div class="flex justify-center mt-2">
                        <p class="text-gray-200">{{ $dbName }}</p>
                    </div>
                </div>
            </div>
            <!--End Card -->
            <!-- Start Card -->
            <div class="bg-yellow-800 pt-1 px-2 bg-gradient-to-b from-yellow-400 to-yellow-600 rounded-xl shadow-lg w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-yellow-300 ring-2 ring-yellow-100 rounded-lg w-32">
                        <p class="text-white font-semibold">Memory</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-center mt-2">
                        <p class="text-gray-200">{{ round($mem_usage / (1024 * 1024)) }} %</p>
                    </div>
                </div>
            </div>
            <!--End Card -->
            <!-- Start Card -->
            <div class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-pink-400 to-pink-500 rounded-xl shadow-lg w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-pink-300 ring-2 ring-pink-200 rounded-lg w-32">
                        <p class="text-white font-semibold">Load</p>

                    </div>
                </div>
                <div class="p-4 text-center">
                    <div class="flex justify-center mt-2 ">
                        <p class="text-gray-200">{{ round($load) }} %</p>
                        <!--                    <p class="text-white" >750 MB</p>-->
                    </div>
                </div>
            </div>
            <!--End Card -->
            <!-- Start Card -->
            <div class="bg-blue-600 pt-1 px-2 bg-gradient-to-b from-indigo-400 to-indigo-500 rounded-xl shadow-lg w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-indigo-300 ring-2 ring-indigo-200 rounded-lg w-32">
                        <p class="text-white font-semibold">Disk Usage</p>

                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-center mt-2">
                        <p class="text-gray-200">{{ $diskUse }}</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-green-600 pt-1 px-2 bg-gradient-to-b from-orange-400 to-orange-500 rounded-xl shadow-lg w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-green-300 ring-2 ring-green-200 rounded-lg w-32">
                        <p class="text-white font-semibold">MYSQL</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-center mt-2">
                        <p class="text-gray-200">{{ $dbStatus }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-red-600 pt-1 px-2 bg-gradient-to-b from-red-400 to-red-500 rounded-xl shadow-lg w-52">
                <div class="flex justify-center">
                    <div class="flex justify-center p-4 bg-red-300 ring-2 ring-red-200 rounded-lg w-32">
                        <p class="text-white font-semibold">PHP</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-center mt-2">
                        <p class="text-gray-200">{{ $php_version }}</p>
                    </div>
                </div>
            </div>
            <!--End Card -->
        </div>
    </div>
    <div class="row">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Server Information</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Current Version
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Required
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Version Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                Php versions
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">{{ phpversion() }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">7.3 or 7.4</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (floatval(phpversion()) >= 7.2 && floatval(phpversion()) < 7.5)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                MySQL
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap"> @php
                                            $results = DB::select(DB::raw('select version()'));
                                            $mysql_version = $results[0]->{'version()'};
                                        @endphp
                                            {{ $mysql_version }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">5.6+</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if ($mysql_version >= 5.6)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">{{ 'php.ini Config' }}</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Config Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Current
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Recommended
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                file_uploads
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            @if (ini_get('file_uploads') == 1)
                                                On
                                            @else
                                                Off
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">On</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('file_uploads') == 1)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                max_file_uploads
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">{{ ini_get('max_file_uploads') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">20+</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('max_file_uploads') >= 20)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                upload_max_filesize
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            {{ ini_get('upload_max_filesize') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            128M+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (str_replace(['M', 'G'], '', ini_get('upload_max_filesize')) >= 128)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                post_max_size
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            {{ ini_get('upload_max_filesize') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            128M+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (str_replace(['M', 'G'], '', ini_get('upload_max_filesize')) >= 128)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                allow_url_fopen
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            @if (ini_get('allow_url_fopen') == 1)
                                                On
                                            @else
                                                Off
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            On
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('allow_url_fopen') == 1)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                max_execution_time
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            @if (ini_get('max_execution_time') == '-1')
                                                Unlimited
                                            @else
                                                {{ ini_get('max_execution_time') }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            120+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('max_execution_time') == -1 || ini_get('max_execution_time') >= 120)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                max_input_time
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            @if (ini_get('max_input_time') == '-1')
                                                Unlimited
                                            @else
                                                {{ ini_get('max_input_time') }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            120+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('max_input_time') == -1 || ini_get('max_input_time') >= 120)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                max_input_vars
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            {{ ini_get('max_input_vars') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            1000+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('max_input_vars') >= 1000)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                memory_limit
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            @if (ini_get('memory_limit') == '-1')
                                                Unlimited
                                            @else
                                                {{ ini_get('memory_limit') }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-600 whitespace-no-wrap">
                                            256M+
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if (ini_get('memory_limit') == -1 || str_replace(['M', 'G'], '', ini_get('memory_limit')) >= 256)
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Success</span>
                                            </span>
                                        @else
                                            <span
                                                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden
                                                    class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Failed</span>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">{{ 'Extensions information' }}</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Extension Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            @php
                                $loaded_extensions = get_loaded_extensions();
                                $required_extensions = ['bcmath', 'ctype', 'json', 'mbstring', 'zip', 'zlib', 'openssl', 'tokenizer', 'xml', 'dom', 'curl', 'fileinfo', 'gd', 'pdo_mysql'];
                            @endphp
                            <tbody>
                                @foreach ($required_extensions as $extension)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $extension }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if (in_array($extension, $loaded_extensions))
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Success</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Failed</span>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">{{ 'Filesystem Permissions' }}</h2>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Extension Name
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            @php
                                $required_paths = ['.env', 'public', 'app/Providers', 'app/Http/Controllers', 'storage', 'resources/views'];
                            @endphp
                            <tbody>
                                @foreach ($required_paths as $path)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{ $path }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if (is_writable(base_path($path)))
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Success</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Failed</span>
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
