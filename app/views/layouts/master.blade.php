<html ng-app="SpaApp">
    <head>
        @include("partials.partial-header")
    </head>
    <body class="theme-base-08" ng-controller="mainController">

        <div class="sidebar" ng-style="{height: !mobileNav ? '' : '190px'}">
            <div class="container sidebar-sticky">
                <a href="/"><img src="/images/iCode4u_logo_320x114.png" alt="iCode4u"></a>
                <button class="nav-btn btn btn-lg btn-default" ng-click="mobileNav = !mobileNav">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>
                <div class="sidebar-about">
                    <p class="lead">
                        iCode4u.se är ett enmansföretag som utvecklar allt inom webb. iCode4u innehar F-skattesedel.
                    </p>
                </div>
              
                @include("partials.partial-navigation")
                
                <p class="copy">&copy; {{ date("Y",time()) }}. All rights reserved. <em><small>Hosted @ <a href="https://www.digitalocean.com/?refcode=de6f50cc615f">DigitalOcean</a></small></em></p>

            </div>
        </div>
        <div class="content container" ui-view>
            @yield("content")
        </div>

        @include("partials.partial-bottom")
    </body>
</html>