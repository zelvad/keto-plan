@props(['text', 'url' => null, 'background' => null])

@if($url)
    <a href="{{ $url }}" class="text-white border-0 py-2 px-8 focus:outline-none bg-blue-400 hover:bg-blue-600 rounded text-lg">{{ $text }}</a>
@else
    <button class="text-white border-0 py-2 px-8 focus:outline-none bg-blue-400 hover:bg-blue-600 rounded text-lg">{{ $text }}</button>
@endif
