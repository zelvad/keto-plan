@props(['data'])

@if($data['style'] === 'ordered')
    <ul class="mt-8">
        @foreach($data['items'] as $key => $item)
            <li class="flex mb-3">
                <span class="block mr-4 flex-shrink-0">{{ ++$key }}. </span>
                <span>{!! $item !!}</span>
            </li>
        @endforeach
    </ul>
@else
    <ul class="mt-8">
        @foreach($data['items'] as $item)
            <li class="flex mb-3">
                <span class="block mt-2 mr-4 flex-shrink-0">
                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.65696 0H2.34304L0 2.34304V5.65696L2.34304 8H5.65696L8 5.65696V2.34304L5.65696 0Z" fill="#0058DE"></path>
                    </svg>
                </span>
                <span>{!! $item !!}</span>
            </li>
        @endforeach
    </ul>
@endif
