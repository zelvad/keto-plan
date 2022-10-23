<div x-data="{open: false}">
    <nav class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <x-client.layouts.header-link name="Главная" :url="route('dashboard')"/>
                            <x-client.layouts.header-link name="Подписка" :url="route('subscribe.view')"/>
                            <x-client.layouts.header-link name="Настройки" :url="route('settings.view')"/>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    <x-client.layouts.header-link name="Выйти" :url="route('logout')"/>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="open = !open" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!--
                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-bind:class="open ? '' : 'hidden'" x-cloak>
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <x-client.layouts.header-link-mob name="Главная" :url="route('dashboard')"/>
                <x-client.layouts.header-link-mob name="Подписка" :url="route('subscribe.view')"/>
                <x-client.layouts.header-link-mob name="Настройки" :url="route('settings.view')"/>

                <x-client.layouts.header-link-mob name="Выйти" :url="route('logout')"/>
            </div>
        </div>
    </nav>
</div>
