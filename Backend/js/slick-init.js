jQuery(document).ready(function($) {
    $('.projects-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,          // Enable autoplay
        autoplaySpeed: 2000,     // Set the autoplay interval (2000ms = 2s)
    });
});


function openTab(evt, tabName) {
    var tabcontent, tablinks, targetTabContent;
    tabcontent = document.getElementsByClassName("tab-content");
    tablinks = document.getElementsByTagName("button");
    targetTabContent = document.getElementById(tabName);

    // If the tab is already open and is clicked again, hide it.
    if (targetTabContent.style.display === "block") {
        targetTabContent.style.display = "none";
        evt.currentTarget.className = evt.currentTarget.className.replace("text-blue-600 border-blue-600", "text-gray-600 border-transparent");
        return;
    }

    // Hide all other tabs and remove active class
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("text-blue-600 border-blue-600", "text-gray-600 border-transparent");
    }

    // Show the clicked tab and add active class
    targetTabContent.style.display = "block";
    evt.currentTarget.className += " text-blue-600 border-blue-600";
}

  