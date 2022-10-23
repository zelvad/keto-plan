<x-client.head.meta
    title="Регистрация"
    description="Регистрация"
    :url="request()->url()"/>

<x-guest-layout>
    <div class="container">
        <div class="flex items-center justify-center w-full">
            <div class="mt-10 mb-10">
                <div class="popup max-w-4xl max-h-full overflow-auto">

                    <h2 class="text-gray-100 text-2xxl sm:text-lg font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8 px-3">
                        <span class="block sm:mr-3 text-center order-2 sm:order-1">Регистрация подписки {{ config('app.name') }}</span>
                    </h2>

                    <!-- Validation Errors -->
                    <x-client.auth.auth-validation-errors class="mb-4 px-3 px-3" :errors="$errors" />

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
                                <input type="email" class="form-input" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:-mx-3 sm:mb-5">
                            <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" class="form-input" id="password" name="password" required>
                            </div>
                            <div class="w-full sm:w-1/2 px-3 mb-5 sm:mb-0 relative ">
                                <label for="password_confirmation" class="form-label">Повторение пароля</label>
                                <input type="password" class="form-input" id="password_confirmation" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="px-3 pt-3 sm:pt-8">
                            <button class="bg-blue-100 rounded-50 text-white font-helvetica text-sm sm:text-lg font-bold px-14 py-4 sm:py-5 mx-auto block mb-8 w-full 2ssm:w-auto">Получить
                                {{ config('app.name') }}</button>
                        </div>

                        <div class="flex items-center justify-center">
                            <span class="text-sm sm:text-base text-gray-500 font-circe block mr-2">Уже зарегистрированы?</span>
                            <a href="{{ route('login') }}" class="text-sm sm:text-base font-circe text-blue-100 font-bold">Войдите</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
