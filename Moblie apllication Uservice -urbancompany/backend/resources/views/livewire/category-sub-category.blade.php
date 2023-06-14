<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 sm:col-span-3">
        <label for="category" class="block font-medium text-xs text-gray-700">Category
            Name<span class="text-red-500">&#42;</span></label>
        <select id="category" name="category" wire:model="selectedCategory"
            class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
            <option value="" selected>Choose Category</option>
            @foreach ($category as $cat)
                <option value="{{ $cat->category }}">{{ $cat->category }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-xs text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="col-span-12 sm:col-span-3">
        @if (!is_null($selectedCategory))

            <label for="sub_category" class="block font-medium text-xs text-gray-700"> Sub Category
                Name<span class="text-red-500">&#42;</span></label>
            <select id="sub_category" name="sub_category" wire:model="selectedSubCategory"
                class="bg-gray-200 appearance-none border-1 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white">
                <option value="" selected>Choose Sub Category</option>
                @foreach ($subCategory as $subCat)
                    <option value="{{ $subCat->sub_category }}">{{ $subCat->sub_category }}</option>
                @endforeach
            </select>
            @error('sub_category')
                <p class="text-xs text-red-600">{{ $message }}</p>
            @enderror

        @endif
    </div>
</div>
