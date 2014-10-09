@extends("layouts.master")

@section("content")
<div class="page">
    <h1 class="page-title">{{ Lang::get("headers.services") }}</h1>
    <h3 id="webbutveckling">{{ Lang::get("headers.webb_development") }}</h3>
    <p>
        {{ Lang::get("texts.webb_development") }}
    </p>

    <h3 id="optimeringar">{{ Lang::get("headers.optimizations") }}</h3>
    <p>
        {{ Lang::get("texts.optimizations", ["link" => "<a href=\"http://en.wikipedia.org/wiki/Search_engine_optimization\" target=\"_blank\">" . Lang::get("links.search_optimizations") . "</a>"]) }}
    </p>

    <h3 id="cloud-service">{{ Lang::get("headers.cloud_service") }}</h3>
    <p>
        {{ Lang::get("texts.cloud_hosting", ["amazon" => "<a href=\"http://aws.amazon.com/\">Amazon Cloud Services</a>", "digitalocean" => "<a href=\"https://www.digitalocean.com/\">Digital Ocean</a>"]) }}
    </p>

</div>
@stop