
$(document).ready(function(){
    // Nice Select 
    if ($('.ec-nice-select').length > 0) {
        $('.ec-nice-select').niceSelect('destroy');
        $('.ec-nice-select').niceSelect(); 
    }


    // Feedback Slider 
    if ($('.testimonials').length > 0) {
        var testimonial = new Swiper(".testimonials", {
            slidesPerView: 1,
            spaceBetween: 25,
            loop: true,
            speed: 1000,
            // freeMode: true,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                  slidesPerView: 1.5,
                },
                768: {
                  slidesPerView: 2,
                },
                992: {
                  slidesPerView: 3,
                },
                1200: {
                  slidesPerView: 3.8,
                },
            },
        });
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

    // Increment decrement 
    // Use event delegation to handle dynamically changing elements
    $(document).on("click", ".quantity-btn2", function () {
        var $button = $(this);
        var $input = $button.siblings(".quantity-of-product2"); // Find the input in the same container
        var oldValue = parseFloat($input.val()) || 0;

        if ($button.hasClass("incree")) {
            var newVal = oldValue + 1;
        } else {
            newVal = oldValue > 0 ? oldValue - 1 : 0;
        }

        $input.val(newVal);
    });
    
    


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


    // Image zoom plugin code
    if ($('.image-zoom-active').length > 0){
        let zoomImage = $(".image-zoom-active");
        zoomImage.each(function() {
            $(this).imageZoom({ zoom: 200 });
        });
    };


    // Video Magnific Popup
    if ($('.video-popup').length > 0){
        $('.video-popup').each(function() {
          new VenoBox({
              selector: '.video-popup',
          });
        });
    }


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



    if ($('.ec-magnific-popup').length > 0){
        $('.ec-magnific-popup').each(function() {
          $(this).magnificPopup({
              delegate: 'a',
              type: 'image',
              closeBtnInside: false,
              gallery: {
                enabled:true
              },
              zoom: {
                enabled: true, 
                duration: 300, 
                easing: 'ease-in-out', 
              },
          });
        });
    }


    // Progressbar jquery
    if ($(".animate-progress").length > 0){
        $(".animate-progress").each(function () {
            var datacount = $(this).attr("data-count");
            $(this).rProgressbar({
                percentage: datacount,
                fillBackgroundColor: '#FACA21'
            });
         });
    }


    // Product Slider 
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



    // Gift cart Show Hide - Your Cart
    $('.gift-cart-toggler').click(function(){
        $(this).toggleClass('added');
        $('.gift-cart-row').slideToggle();
    });


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


// // Bootstrap Toasts active
// const sportstoastTrigger = document.getElementById('liveToastBtn')
// const sportstoastLiveExample = document.getElementById('liveToast')

// if (sportstoastTrigger) {
//   const toastBootstrap = bootstrap.Toast.getOrCreateInstance(sportstoastLiveExample)
//   sportstoastTrigger.addEventListener('click', () => {
//     toastBootstrap.show()
//   })
// }

// Wow js Active 
new WOW({
    animateClass: 'animate__animated'
}).init();