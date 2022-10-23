@props(['data'])
@php($image = (object) $data['file'])

<div class="mt-8">
    <picture class="material__img block w-full h-auto">
        <img src="{{ weserv(asset($image->url))->w(715)->we()->toUrl() }}"
             srcset="{{ weserv(asset($image->url))->w(715)->we()->toUrl() }} 1x,
                     {{ weserv(asset($image->url))->w(715 * 2)->we()->toUrl() }} 2x"
             data-original="{{ weserv(asset($image->url))->we()->w(2560)->toUrl() }}"
             alt="{{ $data['caption'] ?? 'post photo' }}"
             loading="lazy"
             class="w-full lg:w-1/2 mx-auto h-auto object-fill js-zoom-img">
    </picture>

    @if($data['caption'])
        <p class="!mb-0">{{ $data['caption'] }}</p>
    @endif
</div>
