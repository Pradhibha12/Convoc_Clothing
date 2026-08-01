
$(document).ready(function(){
     var $niceSelect = $('.fsh-nice-select');
    
    // Nice Select 
    // if ($niceSelect.length > 0){
    //     $($niceSelect).niceSelect();
    // }
    // Category Card slider 
    if ($('.category-slider').length > 0){
        var ctSlider = new Swiper(".category-slider", {
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.5,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    };

  // Curved Banner Slider
  if ($('.curvedSlide').length > 0) {
    var curvedSlider = new Swiper(".curvedSlide", {
      slidesPerView: "auto",
      spaceBetween: 20,
      centeredSlides: true,
      loop: true,
      speed: 5000,
      freeMode: true,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
    });
  }
      // Curved Banner Slider
 



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




 
// Testimonial Slider 
document.addEventListener('DOMContentLoaded', function () {
    var smallTes = new Swiper('.small-testimonial-view', {
        spaceBetween: 8,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        direction: "vertical",
        slidesPerView: 2,
        slideToClickedSlide: true,
    });

    var largeTes = new Swiper('.large-testimonial-view', {
        spaceBetween: 20,
        slidesPerView: 1,
        loop: true,
    });

    smallTes.controller.control = largeTes;
    largeTes.controller.control = smallTes;
});


// Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();




