<x-client.head.meta
    title="Обратная связь"
    description="Обратная связь"
    :url="request()->url()"/>

<x-app-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex justify-center items-center flex-col">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Задать вопрос</h1>
            </div>

            <div class="lg:w-1/3 md:w-full mx-auto">
                <x-client.common.alert/>
            </div>

            <form action="{{ route('feedback.create') }}" method="POST" class="w-full md:w-2/3 lg:w-1/3 py-5 sm:py-0">
                @csrf

                <div class="flex flex-col sm:-mx-3 sm:mb-5">
                    <div class="w-full px-3 mb-5 sm:mb-0 relative  {{--error--}}">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-input" id="name" name="name" value="{{ $authUser?->name ?? old('name') }}" required>

                        <x-client.common.error-input name="name"/>
                    </div>
                </div>

                <div class="flex flex-col sm:-mx-3 sm:mb-5">
                    <div class="w-full px-3 mb-5 sm:mb-0 relative  {{--error--}}">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-input" id="email" name="email" value="{{ $authUser?->email ?? old('email') }}" required>

                        <x-client.common.error-input name="email"/>
                    </div>
                </div>

                <div class="flex flex-col sm:-mx-3 sm:mb-5">
                    <div class="w-full px-3 mb-5 sm:mb-0 relative  {{--error--}}">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="text" class="form-input" id="phone" name="phone" value="{{ old('phone') }}" required>

                        <x-client.common.error-input name="phone"/>
                    </div>
                </div>

                <div class="flex flex-col sm:-mx-3 sm:mb-5">
                    <div class="w-full px-3 mb-5 sm:mb-0 relative  {{--error--}}">
                        <label for="message" class="form-label">Сообщение</label>
                        <textarea type="text" class="form-input !h-40" id="message" name="message" required>{{ old('message') }}</textarea>

                        <x-client.common.error-input name="message"/>
                    </div>
                </div>

                <div class="px-3 pt-3 sm:pt-8">
                    <button type="submit" class="bg-blue-100 rounded-50 text-white font-helvetica text-sm sm:text-lg font-bold px-14 py-4 sm:py-5 mx-auto block mb-8 w-full 2ssm:w-auto">Отправить вопрос</button>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
