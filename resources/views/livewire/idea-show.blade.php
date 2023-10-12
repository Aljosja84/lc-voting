<div class="idea-and-buttons-container">
    <div class="idea-container mt-4 bg-white rounded-xl flex">
        <!-- avatar -->
        <div class="flex flex-1 px-2 py-6 pl-4">
            <div class="flex-none">
                <a href="#">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="go to profile" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    @admin
                        @if($idea->spam_reports > 0)
                            <div class="text-red mb-2">Spam Reports: [{{ $idea->spam_reports }}]</div>
                        @endif
                    @endadmin
                    {{ $idea->description }}
                </div>

                <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">{{ $idea->user->name }}</div>
                            <div>&bull;</div>
                            <div>{{ $idea->created_at->diffForHumans() }}</div>
                            <div>&bull;</div>
                            <div>{{ $idea->category->name }}</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">{{ $idea->commentsAmount() }}</div>
                        </div>

                        <div x-data="{isOpen:false}" class="relative flex items-center space-x-2">
                            <div class="{{ $idea->status->getStatusClasses() }} text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{ $idea->status->name }}</div>
                            @auth
                                <button @click="isOpen = !isOpen" class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                </button>
                            @endauth
                            <ul x-cloak x-show="isOpen" x-transition.origin.top.left.duration.300ms @click.away="isOpen = false" class="absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                                @can('update', $idea)
                                    <li>
                                        <a href="#" @click.prevent="isOpen = false; $dispatch('custom-show-edit-modal')" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Edit Idea</a>
                                    </li>
                                @endcan
                                @can('delete', $idea)
                                    <li>
                                        <a href="#" @click.prevent="isOpen = false; $dispatch('custom-show-delete-modal')" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Delete Idea</a>
                                    </li>
                                @endcan
                                    <li>
                                        <a href="#" @click.prevent="isOpen = false; $dispatch('custom-show-spam-modal')" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a>
                                    </li>
                                 @admin
                                    @if($idea->spam_reports > 0)
                                        <li>
                                            <a href="#" @click.prevent="isOpen = false; $dispatch('custom-show-not-spam-modal')" class="hover:bg-gray-100 px-5 py-2 block">Not spam</a>
                                        </li>
                                    @endif
                                 @endadmin
                            </ul>
                        </div>
                    </div>

            </div>
        </div>
    </div> <!-- end idea container -->
    <div class="buttons_container flex items-center justify-between mt-6 space-x-2 px-2">
        <div x-data="{isOpen: false}" class="flex items-center space-x-4 ml-2">
            <livewire:add-comment :idea="$idea" />
            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
        </div>

        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-tight @if($hasVoted) text-blue @endif">{{ $votesCount }}</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <div>
                @if($hasVoted)
                    <button type="button" wire:click.prevent="vote" class="text-white font-semibold bg-blue border hover:border-gray-400 uppercase transition duration-200 ease-in w-32 text-xs h-11 rounded-xl">Voted</button>
                @else
                    <button type="button" wire:click.prevent="vote" class="font-semibold bg-gray-200 border hover:border-gray-400 uppercase transition duration-200 ease-in w-32 text-xs h-11 rounded-xl">Vote</button>
                @endif
            </div>
        </div>
    </div> <!-- end buttons container -->
</div>
