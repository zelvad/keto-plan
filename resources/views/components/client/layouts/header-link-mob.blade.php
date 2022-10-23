@props(['url', 'name'])

<a href="{{ $url }}" class="@if(request()->url() === $url) bg-gray-900 text-white @else text-black @endif block px-3 py-2 rounded-md text-base font-medium">{{ $name }}</a>
