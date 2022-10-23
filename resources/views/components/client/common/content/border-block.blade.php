@props(['centered' => '', 'direction' => 'flex-col'])

<div class="px-4 py-6 sm:px-0">
    <div class="border-4 border-dashed border-blue-400 rounded-lg px-10 py-6 w-full {{ $centered }} {{ $direction }}">
        {{ $slot }}
    </div>
</div>
