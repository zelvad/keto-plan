@if($data['service'] === 'youtube')
    <div class="embed-youtube max-w-material-l mx-auto relative w-full h-96 mb-14">
        <iframe src="{{ $data['embed'] }}"
                class="youtube-video__iframe absolute inset-0 w-full h-full max-h-96 border-none lg:pl-20"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                title="{{ $data['caption'] }}"
                allowfullscreen
                frameborder="0"
                loading="lazy"
        ></iframe>
        @if($data['caption'] ?? false)
            <p class="text-sm text-gray-1200">{{ $data['caption'] }}</p>
        @endif
    </div>
@elseif($data['service'] === 'facebook')
    <div class="max-w-material-l mx-auto lg:pl-20 embed-facebook text-center mt-2" x-data="facebookLoader">
        <div class="fb-post"
             data-href="{{ $data['source'] }}"
             data-width="500"
             data-lazy="true"
             data-show-text="true"
        ></div>
        @if($data['caption'] ?? false)
            <p class="text-sm text-gray-1200">{{ $data['caption'] }}</p>
        @endif
    </div>
@elseif($data['service'] === 'instagram')
    <div class="max-w-material-l mx-auto lg:pl-20 embed-instagram mt-2">
        <iframe src="{{ $data['embed'] }}"
                class="mx-auto max-w-full"
                width="400" height="505"
                sandbox="allow-scripts allow-same-origin"
                allowtransparency="true"
                frameborder="0"
                scrolling="no"
                loading="lazy"
        ></iframe>
    </div>
@elseif($data['service'] === 'twitter')
    <div class="max-w-material-l mx-auto lg:pl-20 embed-twitter w-full mt-2">
        <iframe src="https://twitframe.com/show?url={{ urlencode($data['embed']) }}"
                class="mx-auto max-w-full"
                width="600" height="650"
                sandbox="allow-scripts allow-same-origin"
                allowtransparency="true"
                frameborder="0"
                scrolling="no"
                loading="lazy"></iframe>
        @if($data['caption'] ?? false)
            <p class="text-sm text-gray-1200">{{ $data['caption'] }}</p>
        @endif
    </div>
@endif
