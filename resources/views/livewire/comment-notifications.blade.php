<div x-data="{ isOpen: false }" class="relative">
    <button @click="isOpen = !isOpen
                    if(isOpen) {
                        Livewire.emit('getNotifications')
                    }">
        <svg viewBox="0 0 24 24" fill="currentColor" class="mt-2 w-8 h-8 text-gray-400">
            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
        </svg>
        @if($notificationCount)
            <div class="absolute rounded-full bg-red text-white text-xxs w-5 h-5 flex justify-center items-center top-1 right-3 border-2">{{ $notificationCount }}</div>
        @endif
    </button>
    <ul x-cloak x-show="isOpen" x-transition.origin.top.duration.300ms @click.away="isOpen = false" class="absolute top-4 w-96 max-h-128 overflow-y-auto bg-white shadow-lg rounded-xl text-left text-xs" style="right:-55px; top: 50px">
        @if($notifications->isNotEmpty() && ! $isLoading)
            @foreach($notifications as $notification)
                @switch($notification->type)
                    @case('App\Notifications\statusChanged')
                    <li>
                        <a href="{{ route('idea.show', $notification->data['idea_slug']) }}" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-2">
                            <div class="status_update_notification_avatar {{ $notification->data['idea_status_avatar_color'] }}">&nbsp;</div>
                            <div class="ml-4">
                                <div class="line-clamp-4">
                                    <span class="font-semibold text-blue">{{ $notification->data['comment_user'] }}</span>
                                    has changed the status of your idea:
                                    <span class="font-semibold">{{ $notification->data['idea_title'] }}</span> to
                                    <span class="font-semibold {{ $notification->data['idea_status_textcolor'] }}">"{{ $notification->data['idea_status'] }}"</span> with the following comment:
                                    <span>"{{ $notification->data['comment_body'] }}"</span>
                                </div>
                                <div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    </li>
                    @break
                    @case('App\Notifications\CommentAdded')
                        <li>
                            <a href="{{ route('idea.show', $notification->data['idea_slug']) }}" class="flex hover:bg-gray-100 transition duration-150 ease-in px-5 py-2">
                                <img width="40px" height="40px" src="{{ $notification->data['user_avatar'] }}"
                                     alt="avatar" class="w-10 h-10 rounded-full">
                                <div class="ml-4">
                                    <div class="line-clamp-4">
                                        <span class="font-semibold">{{ $notification->data['user_name'] }}</span>
                                        commented on
                                        <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
                                        <span>"{{ $notification->data['comment_body'] }}"</span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        </li>
                    @break
                @endswitch
            @endforeach
        <li class="border-t border-gray-300 text-center">
            <button class="block w-full text-blue font-semibold hover:bg-gray-100 transition duration-150 ease-in px-5 py-2">
                Mark all as read
            </button>
        </li>
        @elseif($isLoading)
            @foreach(range(1,3) as $item)
                <li class="flex items-center transition duration-150 ease-in px-5 py-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200"></div>
                    <div class="flex-1 ml-4 space-y-2">
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-full rounded h-4"></div>
                        <div class="bg-gray-200 w-1/2 rounded h-4"></div>
                    </div>
                </li>
            @endforeach
        @else
            <div class="font-semibold text-gray-400 text-center h-14 pt-6">No new notifications</div>
        @endif
    </ul>
</div>
