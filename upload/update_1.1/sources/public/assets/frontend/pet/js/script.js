
$(document).ready(function(){
    // Banner slider
    // if ($('.banner-slider').length > 0){
    //     var bnSlider = new Swiper(".banner-slider", {
    //         pagination: {
    //             el: ".swiper-pagination",
    //             clickable: true,
    //         },
    //         // effect: "fade",
    //         loop: true,
    //         speed: 1000,
    //         autoplay: {
    //             delay: 5000,
    //             disableOnInteraction: false,
    //             pauseOnMouseEnter: true,
    //         },
    //     });
    // }


    // Product slider
    if ($('.card-product-slider').length > 0){
        var pcSlider = new Swiper(".card-product-sliders", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    }


    // mixitup plugin
    if ($('.mixitup').length > 0){
      var containerEl = document.querySelector('.mixitup'); 
      var mixer = mixitup(containerEl, {
          load: {
              filter: '.show-all'
          },
          animation: {
              effectsIn: 'fade translateY(-100%)',
              effects: 'fade translateZ(-100px)'
          }
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


// Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();