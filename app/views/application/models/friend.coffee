Application.factory 'Friend', ['$resource', ($resource) ->
  Friend = $resource '/friend/:id', null, {
  };

  Friend
]
