<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @unless(app()->environment('production'))
            <meta name="robots" content="noindex"/>
        @endif

        @stack('meta')

        <link href="{{ asset('css/home.css') }}" rel="stylesheet">

        <x-client.layouts.favicon/>

        <x-client.head.inline-scripts />

        <x-client.head.analytics />

        @stack('head-scripts')
    </head>
    <body x-data="{}">
        <div class="antialiased w-full md:h-full">
            {{ $slot }}
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>

        @stack('footer-scripts')
    </body>
</html>
