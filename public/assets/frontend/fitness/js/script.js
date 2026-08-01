
$(document).ready(function(){
    var $niceSelect = $('.fsh-nice-select');
    
    // Nice Select 
    if ($niceSelect.length > 0){
        $($niceSelect).niceSelect();
    }
    // Product Card Inner Slider 
    // if ($('.pc-slider').length > 0){
    //     var pcSlider = new Swiper(".pc-slider", {
    //         spaceBetween: 10,
    //         pagination: {
    //           el: ".swiper-pagination",
    //           clickable: true,
    //         },
    //         loop: true,
    //         speed: 1000,
    //         autoplay: {
    //             delay: 5000,
    //             disableOnInteraction: false,
    //             pauseOnMouseEnter: true,
    //         },
    //     });
    // };

    // Product Card slider 
    if ($('.product-slider').length > 0){
        var pSlider = new Swiper(".product-slider", {
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            speed: 1000,
            // autoplay: {
            //     delay: 5000,
            //     disableOnInteraction: false,
            //     pauseOnMouseEnter: true,
            // },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    };
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

    // Video Venobox Popup
    if ($('.video-popup').length > 0){
        $('.video-popup').each(function() {
          new VenoBox({
              selector: '.video-popup',
          });
        });
    }


    // Testimonial
    if ($('.testimonial-slider').length > 0){
        var testimonial = new Swiper(".testimonial-slider", {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 28,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.2,
                },
                768: {
                    slidesPerView: 1.5,
                },
                992: {
                    slidesPerView: 1.8,
                },
                1200: {
                    slidesPerView: 2.2,
                },
            }
        });
    }


    // Banner slider
    if ($('.fn-banner-slider').length > 0){
       var bnSlider = new Swiper(".fn-banner-slider", {
            loop: true,
            speed: 1000,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".fn-banner-slider .swiper-pagination",
                clickable: true,
            },
        });

    } 


    // Text slider
    if ($('.text-slider').length > 0){
        var textSlider = new Swiper(".text-slider", {
            slidesPerView: "auto",
            spaceBetween: 24,
            centeredSlides: true,
            loop: true,
            speed: 1000,
            freeMode: true,
            speed: 5000,
            autoplay: {
                delay: 0000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
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


// Hover Toggle Class
document.querySelectorAll('.category-card').forEach(function (element) {
    element.addEventListener('mouseenter', function () {
        element.classList.add('active');
        element.parentNode.querySelectorAll('.category-card').forEach(function (sibling) {
            if (sibling !== element) {
                sibling.classList.remove('active');
            }
        });
    });
});



// Wow js Active 
// new WOW({
//     animateClass: 'animate__animated'
// }).init();