$(function() {
  'use strict';
  var form = document.getElementById("formulario");
  $("#wizard").steps({    
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onFinished: function (event, currentIndex){
      form.submit();
    }
  });

  $("#wizardVertical").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    stepsOrientation: 'vertical'
  });
});