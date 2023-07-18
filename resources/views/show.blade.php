<x-app-layout>
    <div>
        <a href="" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All ideas</span>
        </a>
    </div>

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
                    <a href="#" class="hover:underline">Just a random idea that popped up</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                </div>

                <!-- idea details -->
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 space-x-2">
                        <div class="font-bold text-gray-900">Aljosja84</div>
                        <div>&bull;</div>
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category Two</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 comments</div>
                    </div>

                    <div class="relative flex items-center space-x-2">
                        <div class="bg-gray-200 text-xxs font-semibold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">open</div>
                        <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                        </button>
                        <ul class="hidden absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                            <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Delete Post</a></li>
                            <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea container -->
    <div class="buttons_container flex items-center justify-between mt-6 space-x-2 px-2">
        <div class="flex items-center space-x-4 ml-2">
            <div class="relative">
                <button type="button" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in w-32 text-xs h-11 rounded-xl">Reply</button>
                <!-- reply modal -->
                <div class="hidden absolute z-10 w-104 text-left font-semibold text-sm bg-white shadow-md rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Have something to say...?"></textarea>
                        </div>

                        <div class="flex items-center space-x-3">
                            <button type="button" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in w-1/2 text-xs h-11 rounded-xl">Post Comment</button>
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
                </div> <!-- end reply modal -->
            </div>
            <div class="relative">
                <button type="button" class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                    <span>Set status</span>
                    <!-- paperclip icon -->
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 ml-4">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>

                    <!-- end icon -->
                </button>
                <div class="absolute z-20 w-76 text-left text-sm bg-white shadow-md rounded-xl mt-2">
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="space-y-2 font-semibold">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="checked" class="bg-slate-200 text-black border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-purple border-none" name="radio-direct" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-yellow border-none" name="radio-direct" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-green border-none" name="radio-direct" value="4">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-slate-200 text-red border-none" name="radio-direct" value="5">
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
        </div>

        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-tight">999</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <div>
                <button type="button" class="font-semibold bg-gray-200 border hover:border-gray-400 uppercase transition duration-200 ease-in w-32 text-xs h-11 rounded-xl">Vote</button>
            </div>
        </div>
    </div> <!-- end buttons container -->

    <div class="comments_container relative space-y-6 ml-24 my-8">
        <div class="comment_container relative mt-4 bg-white rounded-xl flex">
            <!-- avatar -->
            <div class="flex flex-1 px-2 py-6 pl-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="go to profile" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Just a random idea that popped up</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">Aljosja84</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>

                        <div class="relative flex items-center space-x-2">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                            <ul class="hidden absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Delete Post</a></li>
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->

        <div class="comment_container is_admin relative mt-4 bg-white rounded-xl flex">
            <!-- avatar -->
            <div class="flex flex-1 px-2 py-6 pl-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="go to profile" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center uppercase font-semibold text-blue text-xs mt-1">admin</div>
                </div>
                <div class="w-full mx-4">
                     <h4 class="text-xl font-semibold">
                        <a href="#">Status changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>

                        <div class="relative flex items-center space-x-2">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                            <ul class="hidden absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Delete Post</a></li>
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->

        <div class="comment_container relative mt-4 bg-white rounded-xl flex">
            <!-- avatar -->
            <div class="flex flex-1 px-2 py-6 pl-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="go to profile" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Just a random idea that popped up</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                    </div>

                    <!-- idea details -->
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">Aljosja84</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>

                        <div class="relative flex items-center space-x-2">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-200 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                            <ul class="hidden absolute top-4 w-44 font-semibold bg-white shadow-lg rounded-xl py-3 text-left" style="left:130px">
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Delete Post</a></li>
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-2 block">Mark as spam</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment container -->
    </div> <!-- end comments container -->
</x-app-layout>
