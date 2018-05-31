// initialize wowjs
new WOW().init();

/* Document Ready Starts */
jQuery(document).ready(function($){

  //hide scrolltotop icon at first
  $('#scrollToTop').hide();

  // collapsable sidebar widgets start
  $('.widget .widget-title .fa').on('click', function(event){
  event.preventDefault();
  $(this).closest('.widget').stop().toggleClass('widgetCollapsed');
  $(this).closest('.widget-title').find('.fa').stop().toggleClass('fa-angle-down fa-angle-up');
  });
  // collapsable sidebar widgets end


  /////////////////////////////
  // if vertical scroll more than 200px show move to top icon
  $(window).scroll(function() {
      if ($(this).scrollTop() > 200){  
          $('#scrollToTop').fadeIn("slow");
      }else{
          $('#scrollToTop').fadeOut("slow");
      }
  });
  // on click move to top icon scroll to top
  $('#scrollToTop').click(function(event){
      //$('html, body').animate({scrollTop : 0},800);
      $('html, body').animate({scrollTop: 0}, 800,'easeInOutExpo');
      event.preventDefault();
  });
  /////////////////////////////



});
/* Document Ready Ends */


/* Window.Load Starts */
jQuery(window).load(function($) { 

});
/* Window.Load Ends */




