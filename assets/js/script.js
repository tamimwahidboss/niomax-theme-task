var swiper = new Swiper('.mySwiper', {
  slidesPerView: 3, // Show 3 boxes at a time
  spaceBetween: 30, // Space between boxes
  loop: true, // Infinite loop

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // Pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  // Responsive breakpoints
  breakpoints: {
    // When the window width is >= 0px (mobile)
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    // When the window width is >= 768px (tablet)
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    // When the window width is >= 1024px (desktop)
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    }
  }
});

// Video modal
document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
  var video = document.getElementById('video');
  video.src = video.src; // Reset video source to stop playback
});
