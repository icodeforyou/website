<html>
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
                
                <p>&copy; {{ date("Y",time()) }}. All rights reserved. <small>{{ $_SERVER['SERVER_ADDR'] }}</small></p>

            </div>
        </div>
        <div class="content container">
            @yield("content")
        </div>

        @include("partials.partial-bottom")
    </body>
</html>