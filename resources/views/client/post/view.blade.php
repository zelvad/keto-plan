<x-client.head.meta
    :title="$post->name"
    :description="$post->name"
    :url="request()->url()"/>

<x-app-layout>
    <div class="w-full md:max-w-5xl mx-auto px-5 xl:px-0 mb-12 material">
        <div class="container">
            <div class="material-content">
                <x-client.post.content :blocks="$post->blocks"/>
            </div>
        </div>
    </div>
</x-app-layout>
