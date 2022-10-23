@push('meta')
    <x-client.head.meta
        title="Скачать надежный и быстрый VPN"
        description="Скачать надежный и быстрый VPN"
        :url="route('home')"
    />
@endpush

<x-home-layout>
    <x-client.download.intro/>
    <x-client.download.instruction/>
</x-home-layout>
