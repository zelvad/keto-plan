<x-client.head.meta
    title="Сброс пароля"
    description="Сброс пароля"
    :url="request()->url()"/>

<x-guest-layout>
    <x-client.auth.auth-card>

        <!-- Validation Errors -->
        <x-client.auth.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-client.auth.label for="email" :value="__('Email')" />

                <x-client.auth.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-client.auth.label for="password" :value="__('Пароль')" />

                <x-client.auth.input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-client.auth.label for="password_confirmation" :value="__('Подтверждение пароля')" />

                <x-client.auth.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-client.auth.button>
                    {{ __('Сбросить пароль') }}
                </x-client.auth.button>
            </div>
        </form>
    </x-client.auth.auth-card>
</x-guest-layout>
