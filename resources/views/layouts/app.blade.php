<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @unless(app()->environment('production'))
            <meta name="robots" content="noindex"/>
        @endif

        @stack('meta')

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <x-client.layouts.favicon/>

        <x-client.head.inline-scripts />

        <x-client.head.analytics />

        @stack('head-scripts')
    </head>

    <body x-data="app">
        @stack('body-top')

        <x-client.layouts.header/>

        {{ $slot }}

        <x-client.layouts.footer/>

        <script src="{{ asset('js/app.js') }}" defer></script>

        @stack('footer-scripts')
    </body>
</html>
