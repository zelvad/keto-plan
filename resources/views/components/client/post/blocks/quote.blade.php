<div class="max-w-material-l mx-auto">
    <div class="quote w-full py-7 md:pt-12 md:pb-10 md:px-6">
        <div class="quote__decor w-full flex items-center mb-9">
            <img src="{{ asset('/images/quote-icon.svg') }}" alt="" width="33px" height="22px" class="block flex-shrink-0 mr-11">
            <span class="quote__line block h-0.5 w-full bg-black"></span>
        </div>
        <span class=" block text-2xl">
            {!! $data['text'] !!}
        </span>
        @if(! empty($data['caption']))
            <div class="w-full flex justify-start items-center mt-2">
                <div class="w-2 h-0.3 md:h-2 bg-blue-100 mr-4"></div>
                <span class="font-bold">{{ $data['caption'] }}</span>
            </div>
        @endif
    </div>
</div>
