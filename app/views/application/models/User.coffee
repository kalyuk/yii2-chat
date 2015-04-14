Application.factory 'User', ['$resource', 'ipCookie', '$location', '$http', ($resource, ipCookie, $location, $http) ->
  token = ipCookie 'token'

  setToken = (token) ->
    $http.defaults.headers.common['access-token'] = token;

  if token
    setToken token

  User = $resource '/user/:id', null, {
    signIn: {
      url: 'user/sign-in'
      method: "POST"
    }
    update: {
      method: 'PUT'
    }
  };

  User.prototype.$login = (login, token) ->
    ipCookie 'token', token
    ipCookie 'login', login

    setToken token

    $location.path '/room'

  User
]
