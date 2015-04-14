class UserController
  @$inject: [
    '$scope'
    'User'
    'Flash'
    'ipCookie'
  ]

  constructor: (@scope, @User, @Flash, @ipCookie)->
    @scope.user = {
      login: 'laleksandrov'
      password: 'laleksandrov'
    }


  signIn: () ->
    @User.signIn @scope.user, (data, next) =>
      if data.error
        @Flash.create 'danger', data.error
      else
        data.$login data.login, data.token

      next()


Application.controller 'UserController', UserController