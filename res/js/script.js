/**

JS (jQuery) File for minimal Styling

**/

jQuery(document).ready(function($) { /* Doc.Ready Begin */

  (function($){

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

    //position:fixed navbar and searchbar scroll
    $(window).on('scroll', function(e){
      if ($(document).scrollTop() > $('.hd-top').height()) {
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

    if( $('#next-post').children().length == 0 ) $('#next-post').css('display', 'none');

  })(jQuery);

}); /* Doc.Ready end */
