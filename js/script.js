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

  //fixed scroll
  $(window).on('scroll', function(e){
    if ($(document).scrollTop() > $('.hd-top').height()) {
      //fixed navbar and searchbar
      $('.site-nav, .hd-search').addClass('fixed');
    } else {
      $('.site-nav, .hd-search').removeClass('fixed');
    }
  });

  // mobile side-nav close-button
  $('.closebtn').click(function(e){
    e.preventDefault();
    $('.site-nav').css('visibility','hidden');
  });
});
