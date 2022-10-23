<div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl text-green-500">VPN активен</p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Скачайте и активируйте VPN с помощью кода.</p>
    </div>

    <div class="max-w-screen-sm mx-auto mt-10">
        <div class="mb-3">
            <label>Ваш укникальный код:</label>
        </div>
        <div class="flex justify-between">
            <input type="text" id="code" readonly value="{{ $authUser->code }}" class="mb-6 w-full md:w-9/12 bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed">

            <button type="button" onclick="navigator.clipboard.writeText(document.getElementById('code').value);" data-copy-state="copy" class="flex w-full md:w-3/12 ml-2 items-center py-2 px-4 text-xs font-medium bg-white rounded-lg border border-gray-200 focus:outline-none hover:bg-gray-300 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-gray-300 copy-to-clipboard-button" style="height: 2.7rem;">
                <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg> <span class="copy-text">Копировать</span>
            </button>
        </div>
    </div>
</div>
