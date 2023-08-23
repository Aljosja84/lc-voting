<div x-data="{isOpen: false}" x-init="window.livewire.on('statusChanged', () => {
isOpen = false })" class="relative">
    <button @click="isOpen = !isOpen" type="button" class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
        <span>Set status</span>
        <!-- paperclip icon -->
        <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-4">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>

        <!-- end icon -->
    </button>
    <div x-cloak x-show="isOpen" x-transition.origin.top.left.duration.300ms @click.away="isOpen = false" class="absolute z-20 w-76 text-left text-sm bg-white shadow-md rounded-xl mt-2">
        <form wire:submit.prevent="setStatus" action="#" class="space-y-4 px-4 py-6">
            <div class="space-y-2 font-semibold">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="bg-slate-200 text-black border-none" name="radio-direct" value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="bg-slate-200 text-purple border-none" name="radio-direct" value="2">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="bg-slate-200 text-yellow border-none" name="radio-direct" value="3">
                        <span class="ml-2">In Progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="bg-slate-200 text-green border-none" name="radio-direct" value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="bg-slate-200 text-red border-none" name="radio-direct" value="5">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>
            <div>
                <textarea name="update_comment" id="update_comment" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment"></textarea>
            </div>
            <div class="flex items-center justify-between space-x-3">
                <button type="button" class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                    <!-- paperclip icon -->
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>
                    <!-- end icon -->
                    <span class="ml-2">Attach</span>
                </button>
                <button type="submit" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in text-xs w-1/2 h-11 rounded-xl">Update</button>
            </div>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="notify_voters" class="rounded bg-gray-200" checked="checked">
                    <span class="ml-2">Notify all voters</span>
                </label>
            </div>
        </form>
    </div>
</div>
