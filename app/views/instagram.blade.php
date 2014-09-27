@if(isset($feed->data))
    @foreach($feed->data as $item)
        <div>
            <img src="{{ $item->images->low_resolution->url }}" alt=""/>
            @if(isset($item->caption->text))
            <p>
               {{ $item->caption->text }}
            </p>
            @endif
            {{ var_dump($item) }}
        </div>
    @endforeach
@endif
@if($feed->meta->code == 400)
    <p>
        Denna användaren är privat, då kan vi inte se denna...
    </p>
@endif
