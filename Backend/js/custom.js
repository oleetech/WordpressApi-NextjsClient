jQuery(document).ready(function($) {
    $('#portfolio-tabs a').click(function() {

        // Remove active class from all tabs
        $('#portfolio-tabs li').removeClass('active');
  
        // Add active class to the clicked tab
        $(this).parent().addClass('active');
  
        // Display corresponding tab content
        let currentTab = $(this).attr('href');
        $('.tab-content .tab-pane').removeClass('show active');
        $(currentTab).addClass('show active');
  
        return false;
      });



    
});




// menu
      jQuery(document).ready(function($) {
        // Select the ul element with id menu-primary
        var menuPrimary = $('#menu-primary');
    
        // Create the hori-selector div element
        var horiSelectorDiv = $('<div class="hori-selector"><div class="left"></div><div class="right"></div></div>');
    
        // Add the hori-selector div after the menu-primary element
        menuPrimary.after(horiSelectorDiv);
    });


    jQuery(document).ready(function($) {
    // Hero Header carousel
    $(".header-carousel").owlCarousel({
      animateOut: 'slideOutDown',
      items: 1,
      autoplay: true,
      smartSpeed: 1000,
      dots: false,
      loop: true,
      nav : true,
      navText : [
          '<i class="bi bi-arrow-left"></i>',
          '<i class="bi bi-arrow-right"></i>'
      ],
  });
});