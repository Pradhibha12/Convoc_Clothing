
$(document).ready(function(){

    // Category Slider 
    if ($('.category-slider').length > 0){
        var category = new Swiper(".category-slider", {
            slidesPerView: 1,
            spaceBetween: 18,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    }

    // Product Banner Slider
    if ($('.pc-inner-slider').length > 0){
        var pcbanner = new Swiper(".pc-inner-slider", {
            slidesPerView: 1,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }


    // Product Card Slider 
    if ($('.featured-collection-slider').length > 0){
        var productcard = new Swiper(".featured-collection-slider", {
            slidesPerView: 1,
            spaceBetween: 18,
            // loop: true,
            speed: 1000,
            navigation: {
                nextEl: ".swiper-button-next2",
                prevEl: ".swiper-button-prev2",
            },
            pagination: {
                el: ".swiper-pagination2",
                clickable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            }
        });
    }



    // Testimonial Slider
    if ($('.ts-content-items').length > 0) {
        $('.ts-content-items').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.ts-profile-items',
            autoplay: false,
            dots: true,
        });
        $('.ts-profile-items').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.ts-content-items',
            dots: false,
            arrows: false,
            variableWidth: true,
            autoplay: false,
            infinite: true,
            centerMode: true,
            centerPadding: '0',
            focusOnSelect: true
        });
    }


    // Brand slider
    if ($('.brand-slider').length > 0){
        var brandSlider = new Swiper(".brand-slider", {
            slidesPerView: "auto",
            spaceBetween: 10,
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
                    spaceBetween: 30,
                },
                768: {
                    spaceBetween: 50,
                },
                992: {
                    spaceBetween: 70,
                },
                1200: {
                    spaceBetween: 100,
                },
            }
        });
    }



    // Banner Slider
    if ($('.banner-slider').length > 0){
        var banner = new Swiper(".banner-slider", {
            slidesPerView: 1,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
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


// // Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();