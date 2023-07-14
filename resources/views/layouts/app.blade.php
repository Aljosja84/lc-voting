<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LC VOTING APP</title>

        <!-- Fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=PT+Sans&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=PT+Sans&display=swap');

        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-ptsans bg-gray-background text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#"><img src="{{ asset('/img/logo.svg') }}" alt="logo"></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp"
                    alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5">
                <div class="bg-white border-2 border-blue rounded-xl mt-16"
                     style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    border-image-slice: 1;
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                  ">
                    <div class="text-center px-6 py-2 pt-2">
                        <h4 class="font-semibold text-base">Add an idea</h4>
                        <p class="text-xs mt-4">Throw up an idea and let us discuss it!</p>
                    </div>

                    <!-- idea posting form -->
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input type="text" class="w-full text-sm bg-gray-100 rounded-xl border-none placeholder-gray-900 px-4 py-2" placeholder="Your idea?">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="bg-gray-100 w-full text-sm rounded-xl border-none px-4 py-2">
                                <option value="Filter One">Filter One</option>
                                <option value="Filter Two">Filter Two</option>
                                <option value="Filter Three">Filter Three</option>
                                <option value="Filter Four">Filter Four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea_desc" id="idea_desc" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="describe your idea further"></textarea>
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
                            <button type="submit" class="font-semibold bg-blue border border-blue text-white hover:bg-blue-hover transition duration-200 ease-in text-xs w-1/2 h-11 rounded-xl">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="w-175">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="border-b-4 pb-3 border-blue">all ideas (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 border-transparent hover:border-blue">considering (6)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 border-transparent hover:border-blue">in progress (1)</a></li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 border-transparent hover:border-blue">implemented (10)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-200 ease-in border-b-4 pb-3 border-transparent hover:border-blue">closed (55)</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>

            <div class="w-24">

            </div>
        </main>
    </body>
</html>
