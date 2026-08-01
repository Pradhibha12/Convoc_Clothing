
$(document).ready(function(){
    // Brand slider
 if ($('.brand-slider').length > 0) {
    var brandSlider = new Swiper(".brand-slider", {
        slidesPerView: 2, // mobile default
        spaceBetween: 4,
        loop: true,
        speed: 6000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            576: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 60,
            },
            1200: {
                slidesPerView: 8,
                spaceBetween: 68,
            },
        }
    });
}




    // Banner slider
    if ($('.hero-slider').length > 0){
        var heroSlider = new Swiper(".hero-slider", {
            slidesPerView: 1,
            spaceBetween: 0,
            effect: "fade",
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
                pauseOnMouseEnter: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }


    // Testimonial 
    if ($('.testimonial-slider').length > 0) {
        (function(){
            const prevButton = document.querySelector('.testimonial-prev');
            const nextButton = document.querySelector('.testimonial-next');
            const testiSlider = new Swiper('.testimonial-slider', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 25,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 1.8,
                    },
                    768: {
                        slidesPerView: 2.2,
                    },
                    992: {
                        slidesPerView: 3,
                    },
                    1200: {
                        slidesPerView: 3.5,
                    },
                }
            });
            prevButton.addEventListener('click',()=>{
                testiSlider.slidePrev();
            });
            nextButton.addEventListener('click',()=>{
                testiSlider.slideNext();
            });
            const buttonIsEdge = ()=>{
              if( testiSlider.isBeginning ){
                prevButton.classList.add('is-edge');
              }else{
                prevButton.classList.remove('is-edge');
              }
              if( testiSlider.isEnd ){
                nextButton.classList.add('is-edge');
              }else{
                nextButton.classList.remove('is-edge');
              }
            }
            buttonIsEdge();
            testiSlider.on('slideChange',()=>{
              buttonIsEdge();    
            });
        })();
    };



    // Limited Deal 
    if ($('.limited-deal-slider').length > 0) {
        (function(){
            const prevButton2 = document.querySelector('.deal-slider-prev');
            const nextButton2 = document.querySelector('.deal-slider-next');
            const dealSlider = new Swiper('.limited-deal-slider', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 24,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 1.7,
                    },
                    768: {
                        slidesPerView: 1.8,
                    },
                    992: {
                        slidesPerView: 2,
                    },
                }
            });
            prevButton2.addEventListener('click',()=>{
                dealSlider.slidePrev();
            });
            nextButton2.addEventListener('click',()=>{
                dealSlider.slideNext();
            });
            const buttonIsEdge = ()=>{
              if( dealSlider.isBeginning ){
                prevButton2.classList.add('is-edge');
              }else{
                prevButton2.classList.remove('is-edge');
              }
              if( dealSlider.isEnd ){
                nextButton2.classList.add('is-edge');
              }else{
                nextButton2.classList.remove('is-edge');
              }
            }
            buttonIsEdge();
            dealSlider.on('slideChange',()=>{
              buttonIsEdge();    
            });
        })();
    };



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


/*==================================
Countdown Timer 
==================================*/
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers = document.querySelectorAll(".mc-timer");

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
                    <li><span class="time">${days}</span><span class="text">Days</span></li>
                    <li><span class="time">${String(hours).padStart(2, '0')}</span><span class="text">Hr</span></li>
                    <li><span class="time">${String(minutes).padStart(2, '0')}</span><span class="text">Mins</span></li>
                    <li><span class="time">${String(seconds).padStart(2, '0')}</span><span class="text">Sec</span></li>
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


