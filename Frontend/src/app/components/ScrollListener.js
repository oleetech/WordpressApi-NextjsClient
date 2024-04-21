import React, { useEffect } from 'react';

const ScrollListener = () => {
  useEffect(() => {
    const handleScroll = () => {
      const scrollpos = window.scrollY;
      const header = document.getElementById("header");
      const navcontent = document.getElementById("nav-content");
      const navaction = document.getElementById("navAction");
      const toToggle = document.querySelectorAll(".toggleColour");

      if (scrollpos > 10) {
        header.classList.add("bg-white");
        navaction.classList.remove("bg-white");
        navaction.classList.add("gradient");
        navaction.classList.remove("text-gray-800");
        navaction.classList.add("text-white");
        // Use to switch toggleColour colours
        toToggle.forEach(element => {
          element.classList.add("text-gray-800");
          element.classList.remove("text-white");
        });
        header.classList.add("shadow");
        navcontent.classList.remove("bg-gray-100");
        navcontent.classList.add("bg-white");
      } else {
        header.classList.remove("bg-white");
        navaction.classList.remove("gradient");
        navaction.classList.add("bg-white");
        navaction.classList.remove("text-white");
        navaction.classList.add("text-gray-800");
        // Use to switch toggleColour colours
        toToggle.forEach(element => {
          element.classList.add("text-white");
          element.classList.remove("text-gray-800");
        });

        header.classList.remove("shadow");
        navcontent.classList.remove("bg-white");
        navcontent.classList.add("bg-gray-100");
      }
    };

    document.addEventListener("scroll", handleScroll);

    return () => {
      document.removeEventListener("scroll", handleScroll);
    };
  }, []); // empty dependency array ensures this effect only runs once

  return null; // Since this component is only handling side effects, it doesn't need to render anything
};

export default ScrollListener;
