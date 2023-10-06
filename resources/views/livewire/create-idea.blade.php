<form wire:submit.prevent="createIdea" action="#" class="space-y-4 px-4 py-6">
    <div>
        <input wire:model.defer="title" type="text" class="w-full text-sm bg-gray-100 rounded-xl border-none placeholder-gray-900 px-4 py-2" placeholder="Your idea?">
    </div>
        @error('title')
            <p class="text-red text-xs mt-1">{{ $message }}</p>
        @enderror
    <div>
        <select wire:model.defer="category" name="category" id="category_add" class="bg-gray-100 w-full text-sm rounded-xl border-none px-4 py-2">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <textarea wire:model.defer="description" name="description" id="idea_desc" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="describe your idea further"></textarea>
    </div>
    @error('description')
        <p class="text-red text-xs mt-1">{{ $message }}</p>
    @enderror
    <div class="flex items-center justify-between space-x-3">
        <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
            <!-- paperclip icon -->
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
            </svg>
            <!-- end icon -->
            <span class="ml-2">Attach</span>
        </button>
        <button type="submit" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in text-xs w-1/2 h-11 rounded-xl">Submit</button>
    </div>
</form>
