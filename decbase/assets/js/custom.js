const bars = document.querySelector('.bars')
const times = document.querySelector('.times')
const header = document.querySelector('header')

bars.addEventListener('click', (e) => {
  header.classList.add('show-sidebar')
})
times.addEventListener('click', (e) => {
  header.classList.remove('show-sidebar')
})
// document.addEventListener('click', (e) => {
//   if(!e.target.classList.contains('show-sidebar')) {
//     console.log('fff')
//     header.classList.remove('show-sidebar')
//   }
//   else {
//     console.log('ddd')
//   }
// })

let scrollToTopBtn = document.querySelector(".scrollToTopBtn");
let rootElement = document.documentElement;

// window.onscroll = function () {
//   if (window.pageYOffset > 10) {
//     header.classList.add("fixed");
//   } else {
//     header.classList.remove("fixed");
//   }
// };

function handleScroll() {
  let scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
  if (rootElement.scrollTop / scrollTotal > 0.05) {
    scrollToTopBtn.classList.add("showBtn");
  } else {
    scrollToTopBtn.classList.remove("showBtn");
  }
}

function scrollToTop() {
  rootElement.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
scrollToTopBtn.addEventListener("click", scrollToTop);
document.addEventListener("scroll", handleScroll);



var swiper = new Swiper(".swiper-testi", {
  slidesPerView: 2,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    // when window width is >= 320px
    100: {
      slidesPerView: 1,

    },
    320: {
      slidesPerView: 1,
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    }
  },
});


AOS.init();