<div class="w-full mt-8 mb-8">
    @foreach($posts as $post)
        <x-client.post-list.item :post="$post"/>
    @endforeach
</div>
