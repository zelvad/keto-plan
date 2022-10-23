<x-client.head.meta
    title="Подтверждение пароля"
    description="Подтверждение пароля"
    :url="request()->url()"/>

<x-guest-layout>
    <x-client.auth.auth-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}
        </div>

        <!-- Validation Errors -->
        <x-client.auth.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-client.auth.label for="password" :value="__('Пароль')" />

                <x-client.auth.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-client.auth.button>
                    {{ __('Подтвердить') }}
                </x-client.auth.button>
            </div>
        </form>
    </x-client.auth.auth-card>
</x-guest-layout>
