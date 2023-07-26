<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name=other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl placeholder-gray-900 border-none px-4 py-2 pl-8">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- idea cards -->
    <div class="ideas-container space-y-6 my-6">
        @foreach($ideas as $idea)
            <div
                x-data
                @click="const target = $event.target.tagName.toLowerCase()
                        const ignores = ['button','svg','path','a', 'img']
                        const ideaLink = $event.target.closest('.idea-container').querySelector('.idea-link')

                        !ignores.includes(target) && ideaLink.click()"
                class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
                <div class="border-r border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase
                        rounded-xl transition duration-200 ease-in px-4 py-3">Vote</button>
                    </div>
                </div>

                <!-- avatar -->
                <div class="flex flex-1 px-2 py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="{{ \App\Models\User::getAvatar() }}" alt="go to profile" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-4">
                        <h4 class="text-xl font-semibold">
                            <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{ $idea->description }}
                        </div>

                        <!-- idea details -->
                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 space-x-2">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>{{ $idea->category->name }}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 comments</div>
                            </div>

                            <div x-data="{ isOpen: false }" class="relative flex items-center space-x-2">
                                <div class="bg-gray-200 text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">open</div>
                                <button @click="isOpen = !isOpen" class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                </button>
                                <ul x-cloak x-show="isOpen" x-transition.origin.top.left.duration.300ms @click.away="isOpen = false" class="absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Delete Post</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end idea container -->
        @endforeach
    </div> <!-- end ideas-container -->
    <div class="my-8">
        {{ $ideas->links() }}
    </div>
</x-app-layout>
