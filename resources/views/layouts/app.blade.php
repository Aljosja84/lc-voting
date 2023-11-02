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
        <livewire:styles />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body class="font-ptsans bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="#"><img src="{{ asset('/img/logo.svg') }}" alt="logo"></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <div class="flex items-center space-x-4">
                            <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                                <div>
                                    <button class="relative">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="mt-2 w-8 h-8 text-gray-400">
                                            <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="absolute rounded-full bg-red text-white text-xxs w-5 h-5 flex justify-center items-center top-1 right-2 border-2">3</div>
                                    </button>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://source.unsplash.com/100x100/?face&crop=face&v=1"
                    alt="avatar" class="w-8 h-8 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5">
                <div class="bg-white sticky top-8 border-2 border-blue rounded-xl mt-16"
                     style="
                    border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    border-image-slice: 1;
                    background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                    background-origin: border-box;
                    background-clip: content-box, border-box;
                  ">
                    <div class="text-center px-6 py-2 pt-2">
                        <h4 class="font-semibold text-base">Add an idea</h4>
                        <p class="text-xs mt-4">
                            @auth
                                Throw up an idea and let us discuss it!
                            @else
                                You have to log in to create an idea!
                            @endauth
                        </p>
                    </div>
                    @auth
                        <livewire:create-idea />
                        @else
                            <div class="my-6 text-center flex justify-center">
                                <a href="{{ route('login') }}" class="justify-center w-1/3 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in px-6 py-3">
                                    <span>Login</span>
                                </a>
                                <a href="{{ route('register') }}" class="justify-center ml-4 w-1/3 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    <span>Register</span>
                                </a>
                            </div>
                    @endauth
                </div>
            </div>
            <div class="w-175">
                <livewire:status-filters />
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>

            <div class="w-24">

            </div>
        </main>
        <!-- success notification -->
        @if(session('success_message'))
            <x-notification-success />
        @endif
        <!-- end success notification -->
        <livewire:scripts />
    </body>
</html>
