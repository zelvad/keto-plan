<section class="instruction pt-5 lg:pt-24 pb-16 relative z-10">
    <div class="content-wrapper max-w-instruction 2smm:max-w-container">
        <h2 class="text-gray-100 text-2xxl sm:text-4xl font-helvetica flex flex-col sm:flex-row items-center justify-center mb-5 sm:mb-8">
            <span class="block mr-3 text-center order-2 sm:order-1">Инструкция по установке</span>
            <img src="{{ asset('/images/logo.svg') }}" alt="logo" width="42" height="48" class="order-1 sm:order-2 mb-2 sm:mb-0">
        </h2>
        <div class="instruction-list flex flex-col lg:flex-row flex-wrap overflow-x-hidden lg:-mx-12">
            <div class="instruction-list__item flex flex-col items-start lg:block w-9/12 lg:w-1/3 lg:px-12 mb-5 2sm:mb-0">
                <div class="flex flex-col justify-center items-center sm:h-56 mb-5 sm:mb-8 relative">
                    <picture class="block instruction-list__icon">
                        <source srcset="{{ asset('/images/instruction-icon-1@2x.png') }} 2x">
                        <img src="{{ asset('/images/instruction-icon-1.png') }}" alt="icon" class="object-containe">
                    </picture>
                    <img src="{{ asset('/images/instruction-decor-icon-1.svg') }}" alt="" class="instruction-decor-icon instruction-decor-icon_one">
                </div>
                <h4 class="font-helvetica text-gray-100 font-bold text-sm sm:text-lg mb-2 lg:text-center">Купите аккаунт
                    {{ config('app.name') }}</h4>
                <p class="text-gray-100 text-left lg:text-center font-circe text-xs sm:text-base">Зарегистрируйте цифровую учетную запись {{ config('app.name') }} и план покупки.</p>
            </div>
            <div class="instruction-list__item flex flex-col items-start lg:block w-9/12 lg:w-1/3 lg:px-12 mb-5 2sm:mb-0">
                <div class="flex flex-col justify-center items-center sm:h-56 mb-5 sm:mb-8 relative">
                    <picture class="block instruction-list__icon">
                        <source srcset="{{ asset('/images/instruction-icon-2@2x.png') }} 2x">
                        <img src="{{ asset('/images/instruction-icon-2.png') }}" alt="icon" class="object-containe">
                    </picture>
                    <img src="{{ asset('/images/instruction-decor-icon-2.svg') }}" alt="" class="instruction-decor-icon instruction-decor-icon_two">
                </div>
                <h4 class="font-helvetica text-gray-100 font-bold text-sm sm:text-lg mb-2 lg:text-center">Загрузите клиент {{ config('app.name') }} для</h4>
                <p class="text-gray-100 text-left lg:text-center font-circe text-xs sm:text-base">Загрузите клиент {{ config('app.name') }} для iOS/Adnroid .</p>
            </div>
            <div class="instruction-list__item flex flex-col items-start lg:block w-9/12 lg:w-1/3 lg:px-12 mb-5 2sm:mb-0">
                <div class="flex flex-col justify-center items-center sm:h-56 mb-5 sm:mb-8 relative">
                    <picture class="block instruction-list__icon">
                        <source srcset="{{ asset('/images/instruction-icon-3@2x.png') }} 2x">
                        <img src="{{ asset('/images/instruction-icon-3.png') }}" alt="icon" class="object-containe">
                    </picture>
                    <img src="{{ asset('/images/instruction-decor-icon-3.svg') }}" alt="" class="instruction-decor-icon instruction-decor-icon_three">
                </div>
                <h4 class="font-helvetica text-gray-100 font-bold text-sm sm:text-lg mb-2 lg:text-center">Бесплатный доступ в Интернет</h4>
                <p class="text-gray-100 text-left lg:text-center font-circe text-xs sm:text-base">Подключение к сверхбыстрым серверам одним щелчком мыши, теперь вы можете свободно и безопасно просматривать сайты!</p>
            </div>
        </div>
    </div>
</section>
