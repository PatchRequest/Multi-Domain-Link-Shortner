<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>One Link</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="antialiased">
        <div class="relative flex  flex-col items-top justify-center min-h-screen bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-white font-black leading-7 md:leading-10">
                    Use
                    <span class="text-indigo-700">One-Link</span>
                    to create the best links
                </h1>
            <div class="pt-6 text-center text-white">
                Scroll down for more details
            </div>
            <div class="text-center text-white">
                ▼
            </div>



        </div>
        <h1 class=" bg-gray-900  text-xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-white font-black leading-7 md:leading-10">
            Our Domains:

        </h1>
        <div class="pb-12 pt-6 text-2xl border-gray-900 bg-gray-900 flex justify-center text-center relative items-top top-0 right-0">
            <table class=" text-white font-medium px-6 py-4 whitespace-nowrap">
                <thead>
                <tr>
                    <th>Domain</th>
                    <th>Links</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($domains as $domain)
                    <tr>
                        <td>{{ $domain->domain }}</td>
                        <td>{{ $domain->links->count() }}</td>
                        <td>{{ $domain->premium ? "Premium" : "Free"  }}</td>
                    </tr>
                @endforeach
            </table>
        </div>



    </body>
</html>
