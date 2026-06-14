<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen">
            {{-- Header --}}
            @include('layouts.navigation')
            <div class="flex">
                {{-- Sidebar --}}
                @auth
                    @include('layouts.sidebar')
                @endauth
                {{-- Main Content --}}
                <main class="flex-1 p-6">
                    @yield('content')
                </main>
            </div>
        </div>
        @yield('scripts')
    </body>
</html>
