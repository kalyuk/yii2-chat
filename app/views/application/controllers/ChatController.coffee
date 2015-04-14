class ChatController
  @$inject: [
    '$scope'
    'User'
    'Friend'
    '$injector'
  ]

  getFriends: () ->
    @scope.friends = []
    @Friend.query (data) =>
      @scope.friends = data

  constructor: (@scope, @User, @Friend, @injector)->
    @init()
    @getFriends()

  init: () ->

