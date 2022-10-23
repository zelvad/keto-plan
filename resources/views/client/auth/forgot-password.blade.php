<x-client.head.meta
    title="Сброс пароля"
    description="Сброс пароля"
    :url="request()->url()"/>

<x-guest-layout>
    <x-client.auth.auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Забыли свой пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, которая позволит вам выбрать новый.') }}
        </div>

        <!-- Session Status -->
        <x-client.auth.auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-client.auth.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-client.auth.label for="email" :value="__('Email')" />

                <x-client.auth.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-client.auth.button>
                    {{ __('Отправить ссылку') }}
                </x-client.auth.button>
            </div>
        </form>
    </x-client.auth.auth-card>
</x-guest-layout>
