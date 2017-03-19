/**

JS (jQuery) File for minimal Styling

**/

jQuery(document).ready(function($) { /* Doc.Ready Begin */

  (function($){

    // add placeholder to header search fotm
    $('#s').attr('placeholder','Search...');
    $('#searchsubmit').attr('value','S');


    // mobile side-nav open
    $('.menu-icon').click(function(e){
      e.preventDefault();
      $('.site-nav').css({
        'display':'block',
      });
      $('.site-nav').show(300);
    });

    // mobile side-nav close
    $('.closebtn').click(function(e){
      e.preventDefault();
      $('.site-nav').hide(300);
    });

    // position:fixed navbar and searchbar scroll
    $(window).on('scroll', function(e){
      if ($(document).scrollTop() > $('.hd-top').height()) {
        $('.site-nav, .hd-search').addClass('fixed');
      } else {
        $('.site-nav, .hd-search').removeClass('fixed');
      }
    });

    // remove element display if element is empty i.e. no data from WP database available
    if( $('#next-post').children().length == 0 ) $('#next-post').remove();
    if( $('#prev-post').children().length == 0 ) $('#prev-post').remove();
    if( $('.tags-list').children().length == 0 ) $('.tags-list').parent().remove();

  })(jQuery);

}); /* Doc.Ready end */
