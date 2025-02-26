document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  let logo = document.querySelector("#site-logo");
  let header = document.querySelector("#site-header");

  // GSAP animation
  ScrollTrigger.create({
    start: "top+=50 top",
    end: "bottom top",
    toggleClass: { targets: logo, className: "shrink-logo" },
    onEnter: () => {
      gsap.to(logo, {
        width: "150px",
        opacity: 0.9,
        duration: 0.3,
        ease: "sine.out",
      });
    },
    onLeaveBack: () => {
      gsap.to(logo, {
        width: "834px",
        opacity: 1,
        duration: 0.3,
        ease: "sine.in",
      });
    },
  });
});
