<footer class="bg-gray-800 text-white p-5">


    <div class="container mx-auto px-4 py-8">
  <div class="grid grid-cols-2 gap-4">
    <div>
      <h1 class="text-3xl font-bold mb-4">Head Office</h1>
      <p class="text-gray-700">69 (5th Floor), Master Para Road, Barabag, Mirpur-2, Dhaka-1216</p>
      <p class="text-gray-700">Call Us: +8801713368998</p>
      <p class="text-gray-700">Email Us: jrrecyclingsolutionsltd@gmail.com</p>
    </div>
    <div>
      <h1 class="text-3xl font-bold mb-4">Warehouse</h1>
      <p class="text-gray-700">Holdings No: 0042:03. Mondel Para, West Rajashon, Savar 1340, Dholks</p>
      <p class="text-gray-700">Call Us: +8801713969481</p>
    </div>
  </div>

  <div class="grid grid-cols-4 gap-4">
    <div>01</div>
    <!-- ... -->
    <div>09</div>
  </div>

  
  <div class="text-center mt-8 text-gray-500">
    © 2023 JR ENTERPRISE. All Rights Reserved.
  </div>
</div>



</footer>

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
