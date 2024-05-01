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




//     document.addEventListener("DOMContentLoaded", function() {
//   document.querySelector('button[role="tab"]').click();
// });




//   function toggleMenu() {
//     var menu = document.getElementById("menu");
//     var menuClosed = document.getElementById("menuClosed");
//     var menuOpen = document.getElementById("menuOpen");
//     if (menu.style.display === "none") {
//       menu.style.display = "flex";
//       menuClosed.style.display = "none";
//       menuOpen.style.display = "block";
//     } else {
//       menu.style.display = "none";
//       menuClosed.style.display = "block";
//       menuOpen.style.display = "none";
//     }
//   }

//   function toggleDropdown() {
//     var dropdownMenu = document.getElementById("dropdownMenu");
//     var dropdownArrow = document.getElementById("dropdownArrow");
//     if (dropdownMenu.style.display === "none") {
//       dropdownMenu.style.display = "block";
//       dropdownArrow.classList.add("rotate-180");
//       dropdownArrow.classList.remove("rotate-0");
//     } else {
//       dropdownMenu.style.display = "none";
//       dropdownArrow.classList.add("rotate-0");
//       dropdownArrow.classList.remove("rotate-180");
//     }
//   }
