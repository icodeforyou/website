var SpaApp = angular.module('SpaApp', ['ui.router'])
    .config(function($stateProvider, $urlRouterProvider) {

        $urlRouterProvider.otherwise("/");

        $stateProvider
            .state('/', {
                url: '/hem',
                templateUrl: '/__spa/v1/index'
            })
            .state('tjanster', {
                url: '/tjanster',
                templateUrl: '/__spa/v1/tjanster'
            })
            
            .state('kontakt', {
                url: '/kontakt',
                templateUrl: '/__spa/v1/kontakt'
            })
    });