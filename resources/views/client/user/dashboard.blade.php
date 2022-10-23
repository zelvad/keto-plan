<x-client.head.meta
    title="Главная"
    description="Главная"
    :url="route('dashboard')"/>

<x-app-layout>
    <x-client.common.page-title title="Материалы курса"/>

    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <x-client.post-list.view-list/>
        </div>
    </main>
</x-app-layout>
