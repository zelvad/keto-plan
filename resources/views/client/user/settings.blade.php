<x-client.head.meta
    title="Настройки"
    description="Настройки"
    :url="route('settings.view')"/>

<x-app-layout>
    <x-client.common.page-title title="Настройки"/>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg py-4 md:py-0 md:h-96 flex items-center justify-center w-full flex-col">
                    <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                        <x-client.common.alert/>
                    </div>

                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf

                        <div class="flex w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                            <div class="relative flex-grow w-full">
                                <label for="name" class="leading-7 text-sm text-gray-600">Имя</label>
                                <input type="text" id="name" name="name" value="{{ $authUser->name }}" required class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                <x-client.common.error-input name="name"/>
                            </div>
                            <div class="relative flex-grow w-full">
                                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                <input type="email" id="email" name="email" value="{{ $authUser->email }}" required class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                <x-client.common.error-input name="email"/>
                            </div>
                        </div>

                        <div class="flex w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end mt-5">
                            <div class="relative flex-grow w-full">
                                <label for="password" class="leading-7 text-sm text-gray-600">Пароль</label>
                                <input type="password" id="password" name="password" autocomplete="off" class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                <x-client.common.error-input name="password"/>
                            </div>
                            <div class="relative flex-grow w-full">
                                <label for="password_confirmation" class="leading-7 text-sm text-gray-600">Подтверждение пароля</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off" class="w-full bg-gray-300 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                <x-client.common.error-input name="password_confirmation"/>
                            </div>
                        </div>

                        <div class="flex justify-center w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end mt-5">
                            <button class="text-white bg-blue-400 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>
</x-app-layout>
