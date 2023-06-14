<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-xl text-gray-800 leading-tight">
            PDF Download / Viewer
        </h5>
    </x-slot>
    <div>
        <div class="max-w-8xl mx-auto py-2 sm:px-12 lg:px-12">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-12 lg:-mx-12">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <embed src="{{ $pdfUrl }}" style="width:1200px; height:1200px;" frameborder="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
