
$(document).ready(function(){
    // Top Product Slider
    if ($('.tp-content-wrap').length > 0) {
        $('.tp-content-wrap').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.top-profile-images',
            autoplay: false,
            dots: false,
            infinite: true,
        });
        $('.top-profile-images').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.tp-content-wrap',
            dots: true,
            arrows: false,
            speed: 300,
            autoplaySpeed: 5000,
            autoplay: false,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: false,
            responsive: [
                {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                }
                },
                {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
                }
            ]
        });
    }

    // Seasonal Product Slider 
    if ($('.product-slider').length > 0){
        var productCard = new Swiper(".product-slider", {
            slidesPerView: 1,
            centeredSlides: false,
            spaceBetween: 25,
            loop: true,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.6,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                992: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
                1200: {
                    slidesPerView: 4,
                    centeredSlides: false,
                },
            }
        });
    }


    // Why Choose Slider 1
   if ($('.why-choose-slider1').length > 0){
        var whyChooseSlider1 = new Swiper(".why-choose-slider1", {
            slidesPerView: "auto",
            spaceBetween: 20,
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
                768: {
                    spaceBetween: 24,
                },
                992: {
                    spaceBetween: 28,
                },
                1200: {
                    spaceBetween: 31,
                },
            }
        });
    }
    // Why Choose Slider 2
    if ($('.why-choose-slider2').length > 0){
        var brandSlider2 = new Swiper(".why-choose-slider2", {
            slidesPerView: "auto",
            spaceBetween: 20,
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
                768: {
                    spaceBetween: 24,
                },
                992: {
                    spaceBetween: 28,
                },
                1200: {
                    spaceBetween: 31,
                },
            }
        });
    }


    // Testimonial Slider 
    if ($('.testimonial-slider').length > 0){
        var testiSlide = new Swiper(".testimonial-slider", {
            slidesPerView: 1,
            centeredSlides: false,
            spaceBetween: 22,
            loop: true,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.2,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 1.6,
                    centeredSlides: true,
                },
                992: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                1200: {
                    slidesPerView: 3,
                    centeredSlides: false,
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
