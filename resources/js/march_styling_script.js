/**

JS (jQuery) File for minimal Styling

**/

jQuery(document).ready(function($) { /* Doc.Ready Begin */

  // add placeholder to header search fotm
  $('#s').attr('placeholder','Search...');
  $('#searchsubmit').attr('value','S');


  // mobile side-nav open
  $('.menu-icon').click(function(e){
    e.preventDefault();
    $('#site-nav').css({
      'display':'block',
    });
    $('#site-nav').show(300);
  });

  // mobile side-nav close
  $('.closebtn').click(function(e){
    e.preventDefault();
    $('#site-nav').hide(300);
  });

  // position:fixed navbar and searchbar scroll
  $(window).on('scroll', function(e){
    if ($(document).scrollTop() > $('.hd-top').height()) {
      $('#site-nav, .hd-search, .menu-icon').addClass('fixed');
      $('.hd-search').css('top', $('#site-nav.fixed').outerHeight() +'px');
    } else {
      $('#site-nav, .hd-search, .menu-icon').removeClass('fixed');
    }
  });

  // makes the search bar exactly below the navbar when fixed
  $('.hd-search').css('top', $('#site-nav.fixed').outerHeight() +'px');

  // remove element display if element is empty i.e. no data from WP database available
  if( $('#next-post').children().length == 0 ) $('#next-post').remove();
  if( $('#prev-post').children().length == 0 ) $('#prev-post').remove();
  if( $('.tags-list').children().length == 0 ) $('.tags-list').parent().remove();

  // gives images embedded a max-width  of 100% to keep them in line
  $('div[id^=attachment]').css({'max-width':'100%'});

  // Adds format-standard class to maintain styling
  $('.type-page').addClass('format-standard');

  /** Nav bar styling **/
  $('#site-nav li.current_page_item').addClass('active');
  $('#site-nav .menu ul:first-child').addClass('parent-list-node');
  var pln = $('.parent-list-node').clone(true);
  $('#site-nav .menu').remove();
  $('#site-nav').append(pln);

  $("#site-nav").menumaker({
    format: "multitoggle"
  });
  /**/

}); /* Doc.Ready end */
