window.addEventListener("load", function () {
  const counter = document.querySelector(".slide-count"); // The element where we show the counter
  const totalSlides = document.querySelectorAll(".swiper-slide").length;

  const swiper = new Swiper(".swiper", {
    speed: 800,
    spaceBetween: 24,
    slidesPerView: 1.1, // Default for mobile
    breakpoints: {
      1024: {
        slidesPerView: 2, // Desktop
        spaceBetween: 36,
      },
    },
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
    },
    on: {
      init: function () {
        updateCounter(this);
      },
      slideChange: function () {
        updateCounter(this);
      },
      resize: function () {
        updateCounter(this);
      },
    },
  });

  function updateCounter(swiperInstance) {
    const slidesVisible = Math.floor(swiperInstance.params.slidesPerView);
    const currentLastVisible = Math.min(
      swiperInstance.realIndex + slidesVisible,
      totalSlides
    );
    counter.innerHTML = `${currentLastVisible} / ${totalSlides}`;
  }
});
