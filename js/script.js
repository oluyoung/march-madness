jQuery(document).ready(function($) {

  // add placeholder to header search fotm
  $('#s').attr('placeholder','Search...');
  $('#searchsubmit').attr('value','S');

  // open side nav
  $('.menu-icon').click(function(e){
    e.preventDefault();
    $('.site-nav').css({
      'display':'block',
      'width':'50%'
    });
  });

  //
    //$('a').parent('li').css('cursor','pointer');
/*    $('a').parent('li').click(function(e){
      window.location.href = $(this).children('a:first-child').attr('href');
    });*/

  $('.closebtn').click(function(e){
    e.preventDefault();
    $('.site-nav').css('visibility','hidden');
  });
});
