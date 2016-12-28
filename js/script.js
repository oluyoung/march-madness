jQuery(document).ready(function($) {

  // add placeholder to header search fotm
  $('#s').attr('placeholder','Search...');

  //open side nav
  $('.menu-icon').click(function(e){
    e.preventDefault();
    $('.site-nav').css({
      'display':'block',
      'width':'50%'
    });
  });

  $('.closebtn').click(function(e){
    e.preventDefault();
    $('.site-nav').css('display','none');
  });
});
