<ul class="sidebar-nav">
    <li class="sidebar-nav-item{{ Request::path() == "/" ? " active" : "" }}"><a href="/" ui-sref="/">{{ Lang::get("links.home") }}</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "tjanster" ? " active" : "" }}"><a href="/tjanster" ui-sref="tjanster">{{ Lang::get("links.services") }}</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "kontakt" ? " active" : "" }}"><a href="/kontakt" ui-sref="kontakt">{{ Lang::get("links.contact") }}</a></li>
</ul>
