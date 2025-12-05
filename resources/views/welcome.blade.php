<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen bg-gray-900 text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">

                <!-- Top Right Login/Register Buttons -->
                <div class="flex justify-end">
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="ml-4 rounded-md px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-700 transition">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>

                <!-- Main Content -->
                <div class="mt-20 text-center">
                    <h1 class="text-5xl font-bold mb-6">
                        Welcome to {{ config('app.name', 'Laravel') }}
                    </h1>

                    <p class="text-gray-400 text-lg">
                        Laravel Breeze provides authentication with simple Blade views and Tailwind CSS.
                    </p>

                    <div class="mt-10">
                        <a href="{{ route('login') }}"
                           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded-lg text-white font-semibold transition">
                           Get Started
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
