Application.factory 'Message', ['$resource', ($resource) ->

  $resource '/message/:id', null, {
    save: {
      url: '/message/create'
      method: 'POST'
    }
  };
]
