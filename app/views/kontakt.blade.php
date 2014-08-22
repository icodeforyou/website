@extends("layouts.master")

@section("content")
    <h1>Ta kontakt!</h1>
    <p>
        Vill du komma i kontakt med iCode4u, skicka ett meddelande till iCode4u med formuläret nedan.
    </p>
    
    {{Form::open(["action" => "BaseController@Contact", "role" => "form"])}}
        <div class="form-group">
            
            {{ Form::label("email", "Din Email") }}
            @if($errors->first("email"))
                <small class="error">{{ $errors->first("email") }}</small>
            @endif
            {{ Form::text("email", Request::old("email"), ["class" => "form-control input-lg", "placeholder" => "Ange din email här…"]) }}
            
        </div>
        <div class="form-group">
            
            {{ Form::label("meddelande", "Meddelande") }}
            @if($errors->first("meddelande"))
                <small class="error">{{ $errors->first("meddelande") }}</small>
            @endif
            {{ Form::textarea("meddelande", Request::old("meddelande"), ["class" => "form-control input-lg", "rows" => 3, "placeholder" => "Skriv ditt meddelande här…"]) }}
        
        </div>
        <div class="form-group">
                
            {{ Form::submit("Skicka", ["class" => "btn btn-warning"]) }}
            
            
        </div>
    {{Form::close()}}

    @if(Session::has("message"))
        <div class="alert-box success">
            <h2>{{ Session::get("message") }}</h2>
        </div>
    @endif

@stop