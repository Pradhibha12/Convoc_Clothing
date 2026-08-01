$(document).ready(function(){
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
                    spaceBetween: 25,
                },
                768: {
                    spaceBetween: 40,
                },
                992: {
                    spaceBetween: 60,
                },
                1200: {
                    spaceBetween: 73,
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

    // Video Player 
    if ($('.video-player').length > 0){
        const player = new Plyr('.video-player');
    }



    // Category Slider 
    if ($('.category-slider').length > 0){
        var cateSlide = new Swiper(".category-slider", {
            slidesPerView: 1,
            centeredSlides: false,
            spaceBetween: 32,
            loop: true,
            speed: 500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 1.8,
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


    // Progressbar jquery
	$(".sold-progress").each(function () {
        var datacount = $(this).attr("progress-value");
        $(this).rProgressbar({
            percentage: datacount,
            // fillBackgroundColor: '#4977E5'
        });
    });




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