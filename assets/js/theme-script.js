$ = jQuery;

$(document).ready(function(){

  $('#down-arrow').delay(2000).fadeIn(1000);

  $(document).scroll(function(){
    $('#down-arrow').fadeOut();
  });

});
