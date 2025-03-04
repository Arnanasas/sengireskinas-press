document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  const minWidth = 150;
  const logo = document.getElementById("site-logo");

  function getShrinkDistance() {
    return window.innerWidth <= 768 ? 150 : 415; // Example: smaller on mobile
  }

  function updateLogoScale() {
    const shrinkDistance = getShrinkDistance();
    const currentWidth = logo.offsetWidth;
    const minScale = minWidth / currentWidth;

    ScrollTrigger.killAll(); // Clear previous ScrollTriggers on resize

    gsap.to(logo, {
      scale: minScale,
      transformOrigin: "center top",
      scrollTrigger: {
        trigger: "body",
        start: "top top",
        end: `+=${shrinkDistance}`,
        scrub: true,
      },
    });
  }

  updateLogoScale();

  window.addEventListener("resize", () => {
    gsap.killTweensOf(logo); // Kill previous animation
    updateLogoScale(); // Recalculate on resize
  });

  gsap.set("#site-header", { willChange: "transform" });
});
