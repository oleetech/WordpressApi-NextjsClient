   

<script>
    document.addEventListener("DOMContentLoaded", function() {
  document.querySelector('button[role="tab"]').click();
});

</script>

<script>
  function toggleMenu() {
    var menu = document.getElementById("menu");
    var menuClosed = document.getElementById("menuClosed");
    var menuOpen = document.getElementById("menuOpen");
    if (menu.style.display === "none") {
      menu.style.display = "flex";
      menuClosed.style.display = "none";
      menuOpen.style.display = "block";
    } else {
      menu.style.display = "none";
      menuClosed.style.display = "block";
      menuOpen.style.display = "none";
    }
  }

  function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    var dropdownArrow = document.getElementById("dropdownArrow");
    if (dropdownMenu.style.display === "none") {
      dropdownMenu.style.display = "block";
      dropdownArrow.classList.add("rotate-180");
      dropdownArrow.classList.remove("rotate-0");
    } else {
      dropdownMenu.style.display = "none";
      dropdownArrow.classList.add("rotate-0");
      dropdownArrow.classList.remove("rotate-180");
    }
  }
</script>
<?php wp_footer(); ?>
</body>
</html>
