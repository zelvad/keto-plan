<x-client.head.meta
    title="Авторизация"
    description="Авторизация"
    :url="request()->url()"/>

<x-guest-layout>
    <div class="container">
        <div class="flex items-center justify-center w-full">
            <div class="mt-10 mb-10">

                <div class="popup max-w-login max-h-full overflow-auto">

                    <h2 class="text-gray-100 text-2xxl sm:text-lg font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8 px-3">
                        <span class="block sm:mr-3 text-center order-2 sm:order-1">Вход в личный кабинет</span>
                    </h2>

                    <!-- Validation Errors -->
                    <x-client.auth.auth-validation-errors class="mb-4 px-3 px-3" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}" class="py-5 sm:py-0">
                        @csrf

                        <div class="sm:-mx-3 sm:mb-5">
                            <div class="w-full px-3 mb-4 sm:mb-5">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                            </div>

                            <div class="w-full px-3 mb-4 sm:mb-5">
                                <label for="password" class="form-label">Пароль</label>
                                <div class="w-full relative" x-data="{active: false, input:'password'}">
                                    <input type="password" type="password" x-bind:type="input" class="form-input" id="password" name="password" required>
                                    <button class="show-pass absolute right-5 top-1/2 transform -translate-y-1/2" :class="active ? 'active' : ''"  @click.prevent="input = (input === 'password') ? 'text' : 'password', active = !active">
                                        <img src="{{ asset('/images/pass-icon.svg') }}" alt="" width="22" height="13" class="pass-icon">
                                        <img src="{{ asset('/images/pass-icon-hide.svg') }}" alt="" width="22" height="13" class="pass-icon-hidden">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mb-6 sm:mb-11 px-3 sm:px-0">
                            <div class="login-checkbox hidden">
                                <input type="checkbox" id="remember_me" class="hidden" name="remember" value="1">
                                <label for="remember_me" class="flex items-center">
                                    <div class="check-decor">
                                        <img src="{{ asset('/images/check-icon.svg') }}" alt="" width="11" height="10" class="block">
                                    </div>
                                    <span class="text-sm sm:text-base text-gray-500 font-circe block">Запомнить меня</span>
                                </label>
                            </div>

                            <a href="{{ route('password.request') }}" class="text-sm sm:text-base font-circe text-blue-100 font-bold">Забыли пароль?</a>
                        </div>
                        <div class="px-3 sm:px-0">
                            <button class="bg-blue-100 rounded-50 text-white font-helvetica text-sm sm:text-lg font-bold px-14 py-4 sm:py-5 mt-3 sm:mt-0 mx-auto block mb-8 w-full ">Войти</button>
                        </div>
                        <div class="flex items-center justify-center">
                            <span class="text-sm sm:text-base text-gray-500 font-circe block mr-2">Еще нет аккаунта?</span>
                            <a href="{{ route('register') }}" class="text-sm sm:text-base font-circe text-blue-100 font-bold">Создайте его сейчас!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
