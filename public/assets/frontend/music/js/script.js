$(document).ready(function(){
    var $niceSelect = $('.fsh-nice-select');
    
    // Nice Select 
    // if ($niceSelect.length > 0){
    //     $($niceSelect).niceSelect();
    // }
    // Hero Banner slider
    if ($('.hero-banner-slider').length > 0) {
        (function(){
            const prevButton = document.querySelector('.hero-slider-prev');
            const nextButton = document.querySelector('.hero-slider-next');
            const heroSlider = new Swiper('.hero-banner-slider', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 500,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
            });
            prevButton.addEventListener('click',()=>{
                heroSlider.slidePrev();
            });
            nextButton.addEventListener('click',()=>{
                heroSlider.slideNext();
            });
            const buttonIsEdge = ()=>{
              if( heroSlider.isBeginning ){
                prevButton.classList.add('is-edge');
              }else{
                prevButton.classList.remove('is-edge');
              }
              if( heroSlider.isEnd ){
                nextButton.classList.add('is-edge');
              }else{
                nextButton.classList.remove('is-edge');
              }
            }
            buttonIsEdge();
            heroSlider.on('slideChange',()=>{
              buttonIsEdge();    
            });
        })();
    };


    // Category Slider  
    if ($('.category-slider').length > 0){
        var cateSlider = new Swiper(".category-slider", {
            slidesPerView: "auto",
            spaceBetween: 48,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }


    // Product Banner Slider  
    if ($('.pc-banner-sliders').length > 0){
        var productBannerSlider = new Swiper(".pc-banner-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            loop: false,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }


    // Testimonial Slider  
    if ($('.testimonial-slider').length > 0){
        var testiSlider = new Swiper(".testimonial-slider", {
            slidesPerView: 1,
            spaceBetween: 22,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.1,
                },
                768: {
                    slidesPerView: 1.3,
                },
                992: {
                    slidesPerView: 1.5,
                },
                1200: {
                    slidesPerView: 1.8,
                },
            }
        });
    }


    // Brand slider
    if ($('.brand-slider').length > 0){
        var brandSlider = new Swiper(".brand-slider", {
            slidesPerView: "auto",
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            freeMode: true,
            speed: 6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    spaceBetween: 20,
                },
                768: {
                    spaceBetween: 30,
                },
                992: {
                    spaceBetween: 40,
                },
                1200: {
                    spaceBetween: 46,
                },
            }
        });
    }

 if ($('.products-slider').length > 0) {
  (function () {
    const prevButton = document.querySelector('.products-slider-prev-btn');
    const nextButton = document.querySelector('.products-slider-next-btn');

    const totalSlides = document.querySelectorAll('.products-slider .swiper-slide').length;

    const slidesPerViewDefault = 4; 

    const enableLoop = totalSlides > slidesPerViewDefault;

    const shoppingcart = new Swiper('.products-slider', {
      loop: enableLoop,
      slidesPerView: 1,
      spaceBetween: 20,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints: {
        576: { slidesPerView: 2 },
        768: { slidesPerView: 2 },
        992: { slidesPerView: 3 },
        1200: { slidesPerView: 4 },
      },
    });

    // Navigation Button Click Events
    prevButton.addEventListener('click', () => {
      shoppingcart.slidePrev();
    });
    nextButton.addEventListener('click', () => {
      shoppingcart.slideNext();
    });

    // Edge button style handling
    const buttonIsEdge = () => {
      if (!enableLoop) { 
        if (shoppingcart.isBeginning) {
          prevButton.classList.add('is-edge');
        } else {
          prevButton.classList.remove('is-edge');
        }

        if (shoppingcart.isEnd) {
          nextButton.classList.add('is-edge');
        } else {
          nextButton.classList.remove('is-edge');
        }
      }
    };

    buttonIsEdge();
    shoppingcart.on('slideChange', () => {
      buttonIsEdge();
    });
  })();
}


    /* Go Top
    -------------------------------------------------------------------------------------*/
    var goTop = function () {
        if ($("div").hasClass("scroll-progress-wrap")) {
        var progressPath = document.querySelector(".scroll-progress-wrap path");
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "none";
        progressPath.style.strokeDasharray = pathLength + " " + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        var updateprogress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength) / height;
            progressPath.style.strokeDashoffset = progress;
        };
        updateprogress();
        $(window).scroll(updateprogress);
        var offset = 200;
        var duration = 0;
        jQuery(window).on("scroll", function () {
            if (jQuery(this).scrollTop() > offset) {
            jQuery(".scroll-progress-wrap").addClass("active-scroll-progress");
            } else {
            jQuery(".scroll-progress-wrap").removeClass("active-scroll-progress");
            }
        });
        jQuery(".scroll-progress-wrap").on("click", function (event) {
            event.preventDefault();
            jQuery("html, body").animate({ scrollTop: 0 }, duration);
            return false;
        });
        }
    };


    // Dom Ready
    $(function () {
        goTop();
    });


 });



/*==================================
Countdown Timer 
==================================*/
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers = document.querySelectorAll(".offer-timer");

    offerTimers.forEach((offerTimer) => {
        const offerDate = new Date(offerTimer.getAttribute("data-offer-date")).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeLeft = offerDate - now;

            if (timeLeft > 0) {
                const totalHours = Math.floor(timeLeft / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                offerTimer.innerHTML = `<p>${String(totalHours).padStart(2, '0')} h : ${String(minutes).padStart(2, '0')} min : ${String(seconds).padStart(2, '0')} sec</p>`;
            } else {
                offerTimer.innerHTML = "Offer Expired!";
                clearInterval(intervalId);
            }
        }

        const intervalId = setInterval(updateCountdown, 1000);
        updateCountdown();
    });
});




// Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();
