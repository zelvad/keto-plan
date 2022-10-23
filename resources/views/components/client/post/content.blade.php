@foreach($blocks ?? [] as $block)
    <x-dynamic-component :component="'client.post.blocks.'.$block['type']"
                         :data="$block['data']"
                         :tunes="$block['tunes'] ?? []"/>
@endforeach
