class RoomController extends ChatController

  getMessages: ()->
    @scope.messages = []
    @Message.query {friendId: @routeParams.friendId}, (data) =>
      @scope.messages = data

  init: ()->
    @Message = @injector.get('Message');
    @routeParams = @injector.get('$routeParams');

    @getMessages()
    @createMessage();

  send: () ->
    @scope.message.$save ()=>
      @createMessage()

  createMessage: () ->
    @scope.message = new @Message({to_id: @routeParams.friendId})



Application.controller 'RoomController', RoomController