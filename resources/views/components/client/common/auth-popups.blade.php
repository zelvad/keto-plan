<div class="popup-wrapper py-10 sm:py-0" x-show="popupReg" x-cloak>
    <div class="absolute left-0 top-0 w-full h-full" @click="popupOpen('reg')"></div>

    <div class="popup max-w-4xl max-h-full overflow-auto ">
        <button class="absolute right-3 top-3 z-10" @click.prevent="popupOpen('reg')">
            <img src="{{ asset('/images/closepopup-btn.svg') }}" alt="" width="12" height="12">
        </button>

        <h2 class="text-gray-100 text-2xxl sm:text-lg font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8 px-3">
            <span class="block sm:mr-3 text-center order-2 sm:order-1">Регистрация подписки {{ config('app.name') }}</span>
            <img src="{{ asset('/images/logo.svg') }}" alt="logo" width="25" height="28" class="order-1 sm:order-2 mb-2 sm:mb-0">
        </h2>

        @if($isOpenRegisterForm)
            <!-- Validation Errors -->
            <x-client.auth.auth-validation-errors class="mb-4 px-3 px-3" :errors="$errors" />
        @endif

        <form method="POST" action="{{ route('register') }}" class="py-5 sm:py-0">
            @csrf

            <div class="flex flex-col sm:flex-row sm:-mx-3 sm:mb-5">
                <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative  {{--error--}}">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-input" id="name" name="name" value="{{ old('name') }}" required>
                    {{--<input type="text" class="form-input">
                    <span class="error-label text-red-500 text-sm font-circe absolute left-3 top-full">Введите имя</span>--}}
                </div>
                <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative ">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-input" id="email" value="{{ old('email') }}" name="email" required>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:-mx-3 sm:mb-5">
                <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative ">
                    <label for="password" class="form-label">Придумайте пароль</label>
                    <div class="w-full relative" x-data="{active: false, input:'password'}">
                        <input type="password" x-bind:type="input" class="form-input" id="password" name="password" required>
                        <button class="show-pass absolute right-5 top-1/2 transform -translate-y-1/2" :class="active ? 'active' : ''"  @click.prevent="input = (input === 'password') ? 'text' : 'password', active = !active">
                            <img src="{{ asset('/images/pass-icon.svg') }}" alt="" width="22" height="13" class="pass-icon">
                            <img src="{{ asset('/images/pass-icon-hide.svg') }}" alt="" width="22" height="13" class="pass-icon-hidden">
                        </button>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative ">
                    <label for="password_confirmation" class="form-label">Повторите пароль</label>
                    <div class="w-full relative" x-data="{active: false, input:'password'}">
                        <input type="password" x-bind:type="input" class="form-input" id="password_confirmation" name="password_confirmation" required>
                        <button class="show-pass absolute right-5 top-1/2 transform -translate-y-1/2" :class="active ? 'active' : ''"  @click.prevent="input = (input === 'password') ? 'text' : 'password', active = !active">
                            <img src="{{ asset('/images/pass-icon.svg') }}" alt="" width="22" height="13" class="pass-icon">
                            <img src="{{ asset('/images/pass-icon-hide.svg') }}" alt="" width="22" height="13" class="pass-icon-hidden">
                        </button>
                    </div>
                </div>
            </div>

            <div class="px-3 pt-3 sm:pt-8">
                <button class="bg-blue-100 rounded-50 text-white font-helvetica text-sm sm:text-lg font-bold px-14 py-4 sm:py-5 mx-auto block mb-8 w-full 2ssm:w-auto">Получить
                    {{ config('app.name') }}</button>
            </div>

            <div class="flex items-center justify-center">
                <span class="text-sm sm:text-base text-gray-500 font-circe block mr-2">Уже зарегистрированы?</span>
                <a href="#" @click.prevent="popupOpen('reg'); popupOpen('login')" class="text-sm sm:text-base font-circe text-blue-100 font-bold">Войдите</a>
            </div>
        </form>
    </div>
</div>

<div class="popup-wrapper py-10 sm:py-0" x-show="popupLogin" x-cloak>
    <div class="absolute left-0 top-0 w-full h-full" @click="popupOpen('login')"></div>

    <div class="popup max-w-login max-h-full overflow-auto">
        <button class="absolute right-3 top-3 z-10" @click.prevent="popupOpen('login')">
            <img src="{{ asset('/images/closepopup-btn.svg') }}" alt="" width="12" height="12">
        </button>

        <h2 class="text-gray-100 text-2xxl sm:text-lg font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8 px-3">
            <span class="block sm:mr-3 text-center order-2 sm:order-1">Вход в личный кабинет</span>
            <img src="{{ asset('/images/logo.svg') }}" alt="logo" width="25" height="28" class="order-1 sm:order-2 mb-2 sm:mb-0">
        </h2>

        @if($isOpenLoginForm)
            <!-- Validation Errors -->
            <x-client.auth.auth-validation-errors class="mb-4 px-3 px-3" :errors="$errors" />
        @endif

        <form method="POST" action="{{ route('login') }}" class="py-5 sm:py-0">
            @csrf

            <div class="sm:-mx-3 sm:mb-5">
                <div class="w-full px-3 mb-4 sm:mb-5">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
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
                <a href="#" @click.prevent="popupOpen('login'); popupOpen('reg');" class="text-sm sm:text-base font-circe text-blue-100 font-bold">Создайте его сейчас!</a>
            </div>
        </form>
    </div>
</div>
