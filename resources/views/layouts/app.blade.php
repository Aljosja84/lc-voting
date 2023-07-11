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
                Hier komt het add idea formulier. Ik heb alleen die fancy lorem ipsum niet.
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
        </main>
    </body>
</html>
