@props(['url', 'name'])

<a href="{{ $url }}" class="@if(request()->url() === $url) bg-blue-400 text-white @else text-black @endif px-3 py-2 rounded-md text-sm font-medium">{{ $name }}</a>
