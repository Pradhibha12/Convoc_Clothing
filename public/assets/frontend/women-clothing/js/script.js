$(document).ready(function(){
    var $niceSelect = $('.fsh-nice-select');
    
    // Nice Select 
    if ($niceSelect.length > 0){
        $($niceSelect).niceSelect();
    }
    // Hero Slider  
    if ($('.hero-slider').length > 0){
        var heroSlider = new Swiper(".hero-slider", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            effect: "fade",
            speed: 1000,
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


    // Testimonial Slider
    if ($('.ts-content-items').length > 0) {
        $('.ts-content-items').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.ts-profile-items',
            autoplay: false,
            // dots: true,
        });
        $('.ts-profile-items').slick({
            slidesToShow: 1,
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



// Offer Timer 
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers = document.querySelectorAll(".wc-timer");

    offerTimers.forEach((offerTimer) => {
        const startStr = offerTimer.getAttribute("data-offer-start");
        const endStr = offerTimer.getAttribute("data-offer-end");

        const startDate = new Date(startStr);
        const endDate = new Date(endStr);

        function updateCountdown() {
            const now = new Date();

            if (now < startDate) {
                offerTimer.innerHTML = `<p class='without-timer-text'>Offer Not Started</p>`;
                return;
            }

            if (now >= endDate) {
                offerTimer.innerHTML = `<p class='without-timer-text'>Offer Expired!</p>`;
                return;
            }

            const timeLeft = endDate - now;

            const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
            const seconds = Math.floor((timeLeft / 1000) % 60);

            offerTimer.innerHTML = `
                <ul>
                    <li class="time-wrap"><span class="value">${String(days).padStart(2, '0')}</span><span class="which-value">Days</span></li>
                    <li class="time-clone">:</li>
                    <li class="time-wrap"><span class="value">${String(hours).padStart(2, '0')}</span><span class="which-value">Hours</span></li>
                    <li class="time-clone">:</li>
                    <li class="time-wrap"><span class="value">${String(minutes).padStart(2, '0')}</span><span class="which-value">Minutes</span></li>
                    <li class="time-clone">:</li>
                    <li class="time-wrap"><span class="value">${String(seconds).padStart(2, '0')}</span><span class="which-value">Seconds</span></li>
                </ul>`;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
});






// Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();
