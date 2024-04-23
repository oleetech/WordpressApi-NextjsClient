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
