Application.directive 'include', () ->
  {
  replace: true
  templateUrl: (element, attr) ->
    return attr['include'];
  }
