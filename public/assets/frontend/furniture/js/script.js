
$(document).ready(function(){
  
   var $niceSelect = $('.fsh-nice-select');
    
    // Nice Select 
    // if ($niceSelect.length > 0){
    //     $($niceSelect).niceSelect();
    // }

    // Shopping Cart Slider 
    if ($('.shopping-cart-slider').length > 0) {
        (function(){
            const prevButton = document.querySelector('.cart-slider-prev-btn');
            const nextButton = document.querySelector('.cart-slider-next-btn');
            const shoppingcart = new Swiper('.shopping-cart-slider', {
              loop: true,
              slidesPerView: 1,
              spaceBetween: 20,
              autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                },
            });
            prevButton.addEventListener('click',()=>{
                shoppingcart.slidePrev();
            });
            nextButton.addEventListener('click',()=>{
                shoppingcart.slideNext();
            });
            const buttonIsEdge = ()=>{
              if( shoppingcart.isBeginning ){
                prevButton.classList.add('is-edge');
              }else{
                prevButton.classList.remove('is-edge');
              }
              if( shoppingcart.isEnd ){
                nextButton.classList.add('is-edge');
              }else{
                nextButton.classList.remove('is-edge');
              }
            }
            buttonIsEdge();
            shoppingcart.on('slideChange',()=>{
              buttonIsEdge();    
            });
        })();

    };


    // Increment decrement 
    // Use event delegation to handle dynamically changing elements
    $(document).on("click", ".quantity-btn", function () {
        var $button = $(this);
        var $input = $button.siblings(".quantity-of-product"); // Find the input in the same container
        var oldValue = parseFloat($input.val()) || 0;

        if ($button.hasClass("inc")) {
            var newVal = oldValue + 1;
        } else {
            newVal = oldValue > 0 ? oldValue - 1 : 0;
        }

        $input.val(newVal);
    });


    // Password Show Hide 
    $(".toggle-password").click(function() {
        $(this).toggleClass("lock unlock");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });


    // Image zoom plugin code
    if ($('.image-zoom-active').length > 0){
        let zoomImage = $(".image-zoom-active");
        zoomImage.each(function() {
            $(this).imageZoom({ zoom: 200 });
        });
    };

    

    // Category Slider 
    if ($('.category-slider').length > 0) {
        var category = new Swiper(".category-slider", {
            slidesPerView: 1,
            spaceBetween: 25,
            loop: true,
            // speed: 1000,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
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
                  slidesPerView: 2.5,
                  centeredSlides: true,
                },
                1200: {
                  slidesPerView: 3,
                },
            },
        });
    };

    

    // Product Slider 
    if ($('.product-slider').length > 0) {
        var product = new Swiper(".product-slider", {
            slidesPerView: 1,
            spaceBetween: 25,
            // loop: true,
            // speed: 1000,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            breakpoints: {
                576: {
                  slidesPerView: 1.5,
                  centeredSlides: true,
                },
                768: {
                  slidesPerView: 1.5,
                  centeredSlides: true,
                },
                992: {
                  slidesPerView: 2.5,
                  centeredSlides: true,
                },
                1200: {
                  slidesPerView: 3,
                },
            },
        });
    };




    // Testimonial Slider 
    if ($('.testimonial-slider').length > 0) {
        var testimonial = new Swiper(".testimonial-slider", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            speed: 1000,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            centeredSlides: true,
            breakpoints: {
                576: {
                  slidesPerView: 1.3,
                },
                768: {
                  slidesPerView: 1.5,
                  spaceBetween: 60,
                },
                992: {
                  slidesPerView: 2,
                  spaceBetween: 80,
                },
                1200: {
                    slidesPerView: 2,
                    spaceBetween: 117,
                },
            },
        });
    };



 });

 if ($('.products-sliders').length > 0) {
  (function () {
    const prevButton = document.querySelector('.products-slider-prev-btn');
    const nextButton = document.querySelector('.products-slider-next-btn');

    const totalSlides = document.querySelectorAll('.products-sliders .swiper-slide').length;

    const slidesPerViewDefault = 4; 

    const enableLoop = totalSlides > slidesPerViewDefault;

    const shoppingcart = new Swiper('.products-sliders', {
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



/*==================================
 Countdown Timer 
==================================*/
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers = document.querySelectorAll(".ec-offer-timer");

    offerTimers.forEach((offerTimer) => {
        const offerDate = new Date(offerTimer.getAttribute("data-offer-date")).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeLeft = offerDate - now;

            if (timeLeft > 0) {
                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                offerTimer.innerHTML = `<ul>
                    <li>${days}<span>Days</span></li>
                    <li>${String(hours).padStart(2, '0')}<span>Hrs</span></li>
                    <li>${String(minutes).padStart(2, '0')}<span>Min</span></li>
                    <li>${String(seconds).padStart(2, '0')}<span>Sec</span></li>
                </ul>`;
            } else {
                offerTimer.innerHTML = "Offer Expired!";
                clearInterval(intervalId);
            }
        }

        const intervalId = setInterval(updateCountdown, 1000);
        updateCountdown();
    });
});

/*==================================
 Countdown Timer 2
==================================*/
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers2 = document.querySelectorAll(".ec2-offer-timer");

    offerTimers2.forEach((offerTimer) => {
        const offerDate = new Date(offerTimer.getAttribute("data-offer-date")).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const timeLeft = offerDate - now;

            if (timeLeft > 0) {
                const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                offerTimer.innerHTML = `<ul>
                    <li>${days}<span>Days</span></li>
                    <li>${String(hours).padStart(2, '0')}<span>Hours</span></li>
                    <li>${String(minutes).padStart(2, '0')}<span>Mints</span></li>
                    <li>${String(seconds).padStart(2, '0')}<span>Secs</span></li>
                </ul>`;
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



