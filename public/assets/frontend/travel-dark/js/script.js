
$(document).ready(function(){
    // Banner slider
    if ($('.bn-slider').length > 0){
        var bannerSlider = new Swiper(".bn-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    }


    // Product slider
    if ($('.product-slider').length > 0){
        var productSlider = new Swiper(".product-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 2,
                },
            }
        });
    }

    if ($('.testimonials-slider').length > 0){
        var testimonialSlider = new Swiper(".testimonials-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    }



    // Brand slider
    if ($('.brand-slider1').length > 0){
        var brandSlider1 = new Swiper(".brand-slider1", {
            slidesPerView: "auto",
            spaceBetween: 16,
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
                    spaceBetween: 25,
                },
                768: {
                    spaceBetween: 35,
                },
                992: {
                    spaceBetween: 55,
                },
                1200: {
                    spaceBetween: 70,
                },
            }
        });
    }
    if ($('.brand-slider2').length > 0){
        var brandSlider2 = new Swiper(".brand-slider2", {
            slidesPerView: "auto",
            spaceBetween: 16,
            centeredSlides: true,
            loop: true,
            freeMode: true,
            speed: 6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
                reverseDirection: true,
            },
            breakpoints: {
                576: {
                    spaceBetween: 25,
                },
                768: {
                    spaceBetween: 35,
                },
                992: {
                    spaceBetween: 55,
                },
                1200: {
                    spaceBetween: 70,
                },
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