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
