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
        <div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
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
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="go to profile" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full flex flex-col justify-between mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Just a random idea that popped up</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category Two</div>
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

        <div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
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
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="go to profile" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">I'm just spitballin' here but hear me out</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category Two</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 comments</div>
                        </div>
                        <div class="relative flex items-center space-x-2">
                            <div class="bg-yellow text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">in progress</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->

        <div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl text-blue">66</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-blue border text-white border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-200 ease-in px-4 py-3">Voted</button>
                </div>
            </div>

            <!-- avatar -->
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="go to profile" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">This is what we discussed last meeting</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div>4 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">13 comments</div>
                        </div>
                        <div class="relative flex items-center space-x-2">
                            <div class="bg-red text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">closed</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->

        <div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">23</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-200 ease-in px-4 py-3">Vote</button>
                </div>
            </div>

            <!-- avatar -->
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="go to profile" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">This is what we discussed last meeting</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div>19 hours ago</div>
                            <div>&bull;</div>
                            <div>Category One</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">2 comments</div>
                        </div>
                        <div class="relative flex items-center space-x-2">
                            <div class="bg-green text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">implemented</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->

        <div class="idea-container hover:shadow-md transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">9</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase
                    rounded-xl transition duration-200 ease-in px-4 py-3">Vote</button>
                </div>
            </div>

            <!-- avatar -->
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="go to profile" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">This is what we discussed last meeting</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div>2 hours ago</div>
                            <div>&bull;</div>
                            <div>Category Three</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">7 comments</div>
                        </div>
                        <div class="relative flex items-center space-x-2">
                            <div class="bg-purple text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">considering</div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea container -->
    </div> <!-- end ideas-container -->
</x-app-layout>
