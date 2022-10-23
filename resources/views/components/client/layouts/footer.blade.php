<div class="border-t px-4 md:px-0 border-slate-900/5 py-10 flex justify-center items-center">
    <div class="container">
        <div class="max-w-7xl mx-auto flex justify-between flex-col-reverse md:flex-row ">
            <div class="w-full md:w-1/2">
                <p class="mt-5 text-sm leading-6 text-slate-500 text-center md:text-left">© {{ config('app.name') }}, {{ date('Y') }} | Все права защищены</p>

                <div class="mt-10 flex flex-col text-sm font-semibold leading-6 text-slate-700">
                    <a href="{{ route('privacy') }}">Политика конфиденциальности</a>
                    <a href="{{ route('public-offer') }}">Публичная оферта</a>
                    <a href="{{ route('terms') }}">Условия использования</a>
                    <a href="{{ route('subscribe.view') }}">Отменить подписку</a>
                    <a href="{{ route('refund') }}">Возврат денег</a>
                </div>
            </div>

            <div class="w-full md:w-1/2 mt-5 md:mt-5 flex flex-col text-center md:justify-end md:items-end">
                <div class="flex flex-col">
                    <a href="{{ route('feedback.view') }}" class="text-white bg-blue-400 border-0 py-4 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Задать вопрос</a>

                    <a href="mailto:{{ settings('support_email') }}" class="mt-5 text-center md:text-end">{{ settings('support_email') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
