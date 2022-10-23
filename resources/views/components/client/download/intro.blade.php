@php($discountPrice = (settings('payment_sum_success') / 100) * $discountPercent)

<section class="intro-download pb-32 sm:pb-52 relative w-full ">
    <div class="content-wrapper max-w-container intro-container">
        <div class="w-full sm:w-8/12 lg:w-1/2 pt-3 sm:pt-10 md:pr-16">
            <div class="os-switcher flex items-center bg-blue-300 rounded-50 p-2 mb-6 sm:mb-14 w-max mx-auto sm:mx-0">
                <div class="os-switcher__item">
                    <button class="w-full h-full flex justify-center items-center">
                        <img src="{{ asset('/images/white-os-logo-apple.svg') }}" alt="" class="os-switcher__logo block flex-shrink-0 mr-3">
                        <span class="text-white font-helvetica text-sm sm:text-lg font-bold mt-2 leading-none">iOS</span>
                    </button>
                </div>
                <div class="os-switcher__item">
                    <button class="w-full h-full flex justify-center items-center">
                        <img src="{{ asset('/images/white-os-logo-android.svg') }}" alt="" class="os-switcher__logo block flex-shrink-0 mr-3">
                        <span class="text-white font-helvetica text-sm sm:text-lg font-bold mt-2 leading-none">Android</span>
                    </button>
                </div>
            </div>
            <h1 class="font-helvetica text-white font-bold text-2xxl sm:text-5xxl leading-none mb-2 sm:mb-5 max-w-sm">
                {{ config('app.name') }}
            </h1>
            <ul class="intro-list max-w-list sm:max-w-full mb-4 sm:mb-9">
                <li class="flex mb-1">
                    <img src="{{ asset('/images/list-icon.svg') }}" alt="" width="20" height="20" class="block flex-shrink-0 mr-2">
                    <span class="font-circe text-xs sm:text-lg text-white">Удобно использовать одним щелчком мыши</span>
                </li>
                <li class="flex mb-1">
                    <img src="{{ asset('/images/list-icon.svg') }}" alt="" width="20" height="20" class="block flex-shrink-0 mr-2">
                    <span class="font-circe text-xs sm:text-lg text-white">Ведущая в мире защита конфиденциальности</span>
                </li>
                <li class="flex mb-1">
                    <img src="{{ asset('/images/list-icon.svg') }}" alt="" width="20" height="20" class="block flex-shrink-0 mr-2">
                    <span class="font-circe text-xs sm:text-lg text-white">Безопасные и стабильные глобальные серверы</span>
                </li>
                <li class="flex mb-1">
                    <img src="{{ asset('/images/list-icon.svg') }}" alt="" width="20" height="20" class="block flex-shrink-0 mr-2">
                    <span class="font-circe text-xs sm:text-lg text-white">Zero-Log, не ведите журналы вашей активности в Интернете</span>
                </li>
                <li class="flex mb-1">
                    <img src="{{ asset('/images/list-icon.svg') }}" alt="" width="20" height="20" class="block flex-shrink-0 mr-2">
                    <span class="font-circe text-xs sm:text-lg text-white">7-дневная гарантия возврата денег</span>
                </li>
            </ul>
            <div class="flex sm:items-center flex-col sm:flex-row">
                <div class="flex-shrink-0">
                    <div class="flex items-center mb-2 sm:mb-4">
                        <div class="banner-old-price font-helvetica font-bold text-white text-sm sm:text-2xxl opacity-80 mr-4">
                            {{ settings('payment_sum_success') + $discountPrice }} ₽</div>
                        <span class="sale-icon">-{{ $discountPercent }}%</span>
                    </div>
                    <span class="block text-white font-helvetica font-bold text-2xxll sm:text-4xl  mb-8">
                        {{ settings('payment_sum_success') }} ₽<span class="text-lg"> / мес.</span>
                    </span>
                </div>

                <a href="#" @click.prevent="popupOpen('reg')" class="w-full 2ssm:w-auto inline-flex items-center bg-pink-100 rounded-50 pl-10 py-2 mb-12 sm:ml-12 justify-between">
                    <span class="text-white font-helvetica font-bold text-sm sm:text-lg w-full text-center text-center sm:text-left ">Купить и скачать</span>
                    <span class="inline-flex justify-center items-center w-10 h-10 sm:w-14 sm:h-14 rounded-full bg-pink-200 flex-shrink-0 ml-6 mr-2">
                        <img src="{{ asset('/images/download.svg') }}" alt="" width="18" height="18">
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
