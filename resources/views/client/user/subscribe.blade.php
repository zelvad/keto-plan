<x-client.head.meta
    title="Подписка"
    description="Подписка"
    :url="route('subscribe.view')"/>

<x-app-layout>
    <x-client.common.page-title title="Подписка"/>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-blue-400 rounded-lg pt-10 pb-10 flex items-center justify-center w-full flex-col">
                    @if($authUser->is_subscribe)
                        <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center">
                                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl text-green-500">Подписка активна</p>
                                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto text-center">
                                    У вас активирована подписка.
                                    Ваша подписка продлевается каждые {{ settings('payment_counts_success_range') }} дней до момента пока вы ее не отмените и стоит {{ settings('payment_sum_success') }} руб за каждые {{ settings('payment_counts_success_range') }} дней.
                                </p>
                            </div>

                            <div class="max-w-screen-sm mx-auto mt-10 flex justify-center">
                                <form action="{{ route('subscription-delete') }}" method="POST" class="m-0">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" onclick="return confirm('Вы уверены что хотите отменить подписку? У вас больше не будет списываться оплата за использование нашим сервисом, а также Вы потеряете доступ к нашему сервису.')" class="cursor-pointer w-full md:w-52 h-12 rounded-lg bg-blue-400 py-2 px-3 font-semibold leading-5 text-white hover:bg-blue-600 text-center text-sm flex items-center justify-center">Отменить подписку</button>
                                </form>
                            </div>
                        </div>

                    @else
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center">
                                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight sm:text-4xl text-red-600">Подписка не активна</p>
                            </div>

                            <div class="mt-10 w-full flex justify-center">
                                <a href="{{ route('subscribe.create') }}" class="cursor-pointer w-full md:w-96 h-20 rounded-lg bg-blue-400 py-2 px-3 font-semibold leading-5 text-white hover:bg-blue-600 text-center text-2xl flex items-center justify-center">Активировать</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
