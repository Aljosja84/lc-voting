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
    <body class="font-ptsans text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#">voting app logo</a>
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
    </body>
</html>
