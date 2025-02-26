document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  const maxScale = 1; // Initial size
  const minScale = 150 / 831; // Min logo scale ratio
  const shrinkDistance = 415; // Scroll distance before full shrink
  const maxHeaderScale = 1; // Full header size
  const minHeaderScale = 0.6; // Min header scale (adjust as needed)

  gsap.set("#site-header", { willChange: "transform" }); // Prepares for smooth transformations

  gsap.to("#site-logo", {
    scale: minScale,
    transformOrigin: "center top",
    scrollTrigger: {
      trigger: "body",
      start: "top top",
      end: `+=${shrinkDistance}`,
      scrub: true,
    },
  });
});
