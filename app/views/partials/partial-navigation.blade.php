<ul class="sidebar-nav">
    <li class="sidebar-nav-item{{ Request::path() == "/" ? " active" : "" }}"><a href="/" ui-sref="/">Hem</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "tjanster" ? " active" : "" }}"><a href="/tjanster" ui-sref="tjanster">Tjänster</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "kontakt" ? " active" : "" }}"><a href="/kontakt" ui-sref="kontakt">Kontakt</a></li>
</ul>
