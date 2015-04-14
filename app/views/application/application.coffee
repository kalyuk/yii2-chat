Application = angular.module 'Application', ['ngRoute', 'ipCookie', 'ui.bootstrap', 'flash', 'angular-loading-bar', 'ngResource']


Application.config ['$routeProvider', ($routeProvider) ->
  $routeProvider
  .when '/', {
    controller: 'UserController',
    templateUrl: '/views.user.sign-in.html'
    controllerAs: 'ctrl'
  }
  .when '/room', {
    controller: 'FriendController',
    templateUrl: '/views.room.layout.html'
    controllerAs: 'ctrl'
  }
  .when '/room/:friendId', {
    controller: 'RoomController',
    templateUrl: '/views.room.layout.html'
    controllerAs: 'ctrl'
  }
  .otherwise {
    redirectTo: '/'
  }

]
