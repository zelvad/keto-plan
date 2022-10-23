<x-client.head.meta
    title="Оформление подписки"
    description="Оформление подписки"
    :url="route('subscribe.create')"/>

<x-guest-layout>

    <main>
        <!--<x-client.common.page-title title="Оформление подписки"/>-->
        <section class="card-set sm:pt-28 sm:pb-16" x-data="paymentFormSend">
            <div class="content-wrapper max-w-instruction mb-36 pb-32 pt-20 md:pb-0 md:pt-0">
                <h2 class="text-gray-100 text-2xxl sm:text-4xl font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8">
                    <span class="block mr-3 text-center order-2 sm:order-1">Спасибо за то что приняли участие!</span>
                </h2>

                <p class="text-center text-lg sm:text-2xl text-gray-500">О результатах розыгрыша мы сообщим вам в течении 72 часов</p>
            </div>
        </section>
    </main>
</x-guest-layout>
