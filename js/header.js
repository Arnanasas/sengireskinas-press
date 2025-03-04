document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  const shrinkDistance = 150;

  const logo = document.getElementById("site-logo");
  const originalWidth = logo.offsetWidth;
  const minScale = 150 / originalWidth;

  gsap.set("#site-header", { willChange: "transform" });

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
});
