<ul class="sidebar-nav">
    <li class="sidebar-nav-item{{ Request::path() == "/" ? " active" : "" }}"><a href="/">Hem</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "tjanster" ? " active" : "" }}"><a href="/tjanster">Tjänster</a></li>
    <li class="sidebar-nav-item{{ Request::path() == "kontakt" ? " active" : "" }}"><a href="/kontakt">Kontakt</a></li>
</ul>
