@props(['data', 'tunes' => null])

<div class="mt-8 @if($tunes) text-{{ $tunes['aling']['alignment'] }} w-full @endif">
    <h{{ $data['level'] }}>{{ $data['text'] }}</{{ $data['level'] }}h>
</div>
