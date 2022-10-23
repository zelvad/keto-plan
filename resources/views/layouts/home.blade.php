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

    <link href="{{ asset('//unpkg.com/swiper@6.8.4/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">

    @stack('head-scripts')

    @stack('styles')
</head>

    <body x-data="sidebar()"
          :class="isOpen() ? 'overflow-hidden' : ''"
          @resize.window="handleResize()">

        @stack('body-top')

        <x-client.common.auth-popups/>

        <x-client.layouts.header-home/>

        <main>
            {{ $slot }}
        </main>

        <x-client.layouts.footer-home/>

        <script src="{{ asset('js/app.js') }}" defer></script>

        <script>
            function sidebar() {
                const breakpoint = 1300
                return {
                    open: {
                        above: false,
                        below: false,
                    },
                    popupReg: @if($isOpenRegisterForm and $errors->isNotEmpty()) true @else false @endif,
                    popupLogin: @if($isOpenLoginForm and $errors->isNotEmpty()) true @else false @endif,
                    isGuest: '{{ var_export(auth()->guest()) }}',
                    isAboveBreakpoint: window.innerWidth < breakpoint,

                    handleResize() {
                        this.isAboveBreakpoint = window.innerWidth < breakpoint
                        if (!this.isAboveBreakpoint) {
                            this.open.below = false
                        }
                    },

                    isOpen() {
                        if (this.isAboveBreakpoint) {
                            return this.open.above
                        }
                        return this.open.below
                    },
                    popupOpen(item) {
                        if (this.isGuest === 'false') {
                            window.location = '{{ route('dashboard') }}';

                            return;
                        }

                        if(item == 'login'){
                            this.popupLogin = !this.popupLogin
                            return this.popupLogin
                        }
                        if(item == 'reg'){
                            this.popupReg = !this.popupReg
                            return this.popupReg
                        }
                    },
                    handleOpen() {
                        if (this.isAboveBreakpoint) {
                            this.open.above = true
                        }
                        this.open.below = true
                    },
                    handleClose() {
                        if (this.isAboveBreakpoint) {
                            this.open.above = false
                        }
                        this.open.below = false
                    },

                }
            }
        </script>

        @stack('footer-scripts')
    </body>
</html>
