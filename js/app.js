(() => {
  // resources/js/app.js
  window.addEventListener("load", function() {
    const header = document.getElementById("site-header");
    const logo = document.getElementById("site-logo");
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  });
})();
