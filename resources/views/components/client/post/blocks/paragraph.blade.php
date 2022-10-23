@props(['data', 'tunes' => null])

<div class="mt-8 @if($tunes) text-{{ $tunes['aling']['alignment'] }} w-full @endif">
    <p class="!mb-0">{!! $data['text'] !!}</p>
</div>
