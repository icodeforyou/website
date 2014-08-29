<html ng-app="SpaApp">
    <head>
        @include("partials.partial-header")
    </head>
    <body class="theme-base-08">

        <div class="sidebar">
            <div class="container sidebar-sticky">
                <div class="sidebar-about">
                    <a href="/"><img src="/images/iCode4u_logo_320x114.png" alt="iCode4u"></a>
                    <p class="lead">
                        iCode4u.se är ett enmansföretag som utvecklar allt inom webb. iCode4u innehar F-skattesedel.
                    </p>
                </div>
              
                @include("partials.partial-navigation")
                
                <p>&copy; {{ date("Y",time()) }}. All rights reserved. <em><small>Hosted @ <a href="https://www.digitalocean.com/?refcode=de6f50cc615f">DigitalOcean</a></small></em></p>

            </div>
        </div>
        <div class="content container" ui-view>
            @yield("content")
        </div>

        @include("partials.partial-bottom")
    </body>
</html>