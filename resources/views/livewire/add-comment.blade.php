<div
    x-data="{ isOpen: false }"
    x-init="
        Livewire.on('commentWasAdded', () => {
            isOpen = false
        })
    "
    class="relative">
    <button @click="isOpen = !isOpen " type="button" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in w-32 text-xs h-11 rounded-xl">Reply</button>
    <!-- reply modal -->
    <div x-cloak x-show="isOpen" x-transition.origin.top.left.duration.300ms @click.away="isOpen = false" class="absolute z-10 w-104 text-left font-semibold text-sm bg-white shadow-md rounded-xl mt-2">
        @auth
            <form wire:submit.prevent="addComment" action="#" class="space-y-4 px-4 py-6">
                <div>
                    <textarea required wire:model="comment" name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Have something to say...?"></textarea>

                    @error('comment')
                        <p class="text-red text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-3">
                    <button type="submit" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in w-1/2 text-xs h-11 rounded-xl">Post Comment</button>
                    <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                        <!-- paperclip icon -->
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>
                        <!-- end icon -->
                        <span class="ml-2">Attach</span>
                    </button>
                </div>
            </form>
        @else
            <div class="px-4 py-6">
                <p class="font-weight-normal">Login to post comments.</p>
                <div class="flex items-center space-x-3 mt-8">
                    <a href="{{ route('login') }}" class="w-1/2 h-11 text-xs text-center bg-blue text-white font-semibold rounded-xl
                    hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">Login</a>
                    <a href="{{ route('register') }}" class="w-1/2 h-11 text-center text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200
                    hover:border-gray-400 transition duration-150 ease-in px-6 py-3">Sign up</a>
                </div>
            </div>
        @endauth
    </div> <!-- end reply modal -->
</div>
