<div x-data="{isOpen: false}" class="comment_container relative mt-4 bg-white rounded-xl flex">
    <!-- avatar -->
    <div class="flex flex-1 px-2 py-6 pl-4">
        <div class="flex-none">
            <a href="#">
                <img src="{{ \App\Models\User::getAvatar() }}" alt="go to profile" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full mx-4">
            {{-- <h4 class="text-xl font-semibold">
                <a href="#" class="hover:underline">Just a random idea that popped up</a>
            </h4> --}}
            <div class="text-gray-600">
                {{ $comment->body }}
            </div>

            <!-- idea details -->
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 space-x-2">
                    @if($comment->user->id === $ideaUserId)
                        <div class="rounded-full border bg-gray-100 px-3 py-1 font-semibold text-blue">OP</div>
                        <div>&bull;</div>
                    @endif
                    <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                @auth
                    <div class="relative flex items-center space-x-2">
                        <button @click="isOpen = !isOpen" class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                        </button>
                        <ul x-cloak x-show="isOpen" x-transition.duration.300ms @click.away="isOpen = false" class="absolute z-10 top-4 -right-40 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left">
                            @can('update', $comment)
                                <li>
                                    <a href="#" @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setEditComment', {{ $comment->id }})
                                        {{-- $dispatch('custom-show-edit-modal') --}}
                                    "
                                    class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Edit Comment</a>
                                </li>
                            @endcan
                            @can('delete', $comment)
                                <li>
                                    <a href="#" @click.prevent="
                                        isOpen = false
                                        Livewire.emit('setDeleteComment', {{ $comment->id }})
                                        {{-- $dispatch('custom-show-edit-modal') --}}
                                        "
                                       class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Delete Comment</a>
                                </li>
                            @endcan
                                <li>
                                    <a href="#" @click.prevent="
                                    isOpen = false
                                    Livewire.emit('setMarkAsSpamComment', {{ $comment->id }})
                                    {{-- $dispatch('custom-show-edit-modal') --}}
                                        "
                                       class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-2">Mark as Spam</a>
                                </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
