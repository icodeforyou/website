@if(isset($feed->data))
    @foreach($feed->data as $item)
        <div>
            <img src="{{ $item->images->low_resolution->url }}" alt=""/>
            @if(isset($item->caption->text))
            <p>
               {{ $item->caption->text }}
            </p>
            @endif
            @if(isset($item->likes))
                <p>
                    <strong>Likes:</strong><br />
                    @foreach($item->likes->data as $like)
                        <a href="/instagram/{{ $like->username }}">{{ $like->username }}</a>
                    @endforeach
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
