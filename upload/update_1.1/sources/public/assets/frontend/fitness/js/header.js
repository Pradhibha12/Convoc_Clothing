$(document).ready(function(){
    // Header Top Slider 
    if ($('.ht-offer-slider').length > 0) {
        var htOffer = new Swiper(".ht-offer-slider", {
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
            // freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
              },
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
        });
    };


   
    function accordion3() {
        var Accordion3 = function(el, multiple) {
            this.el = el || $(document); 
            this.multiple = multiple || false;
            var links = this.el.find('.mega-nav-link-have-sub');
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
        };
        Accordion3.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this), 
                $next = $this.next();
            $next.slideToggle(); 
            $this.parent().toggleClass('active-mega-nav-sub'); 
            if (!e.data.multiple) {
                $el.find('.mega-nav-dropdown').not($next).slideUp().parent().removeClass('active-mega-nav-sub');
            }
        };
        $('.fn-mega-nav').each(function() {
            new Accordion3($(this), false); 
        });
    }
    accordion3();

    // Accordion Sub Mobile Menu
// Accordion Sub Mobile Menu
    function accordion2() {
        var Accordion2 = function(el, multiple) {
            this.el = el || $(document); 
            this.multiple = multiple || false;
            var links = this.el.find('.mobile-dropitem-a-have-sub');
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
        };
        Accordion2.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this), 
                $next = $this.next();
            $next.slideToggle(); 
            $this.parent().toggleClass('active-mobile-sub-submenu'); 
            if (!e.data.multiple) {
                $el.find('.mobile-subdrop-menu').not($next).slideUp().parent().removeClass('active-mobile-sub-submenu');
            }
        };
        $('.mobile-dropdown-menu').each(function() {
            new Accordion2($(this), false); 
        });
    }
    accordion2();
    // Accordion Sub Mobile Menu

  // Sticky Menu Start
    /* Small Header Sticky (For Screens < 992px) */
    var smallHeaderSticky = function () {
        let lastScrollTop = 0;
        let delta = 5;

        function handleScroll() {
            let st = $(window).scrollTop();
            let navbarHeight = $(".fn-header-section").outerHeight();

            if (Math.abs(lastScrollTop - st) <= delta) return;

            if (st > lastScrollTop && st > navbarHeight) {
                $(".fn-header-section").css("top", `-${navbarHeight + 3}px`);
            } else {
                if (st + $(window).height() < $(document).height()) {
                    $(".fn-header-section").css("top", "0px");
                }
            }
            lastScrollTop = st;
        }

        $(window).off("scroll", handleScroll); // Prevent duplicate bindings
        $(window).on("scroll", handleScroll);
    };

    /* Small Header Change Background */
    var smallHeaderChangeBg = function () {
        function handleBgChange() {
            $(".fn-header-section").toggleClass("header-bg", $(window).scrollTop() > 100);
        }

        $(window).off("scroll", handleBgChange);
        $(window).on("scroll", handleBgChange);
    };

    // Reinitialize on Resize (Ensures proper functionality if window size changes)
    var handleResize = function () {
        if ($(window).width() < 992) {
            smallHeaderSticky();
            smallHeaderChangeBg();
        } else {
            $(".fn-header-section").removeAttr("style").removeClass("header-bg"); // Reset styles for larger screens
        }
    };

    // DOM Ready
    $(function () {
        handleResize(); // Initialize on load
        $(window).on("resize", function () {
            handleResize(); // Recheck on window resize
        });
    });
    // Sticky Menu End
    

});


/*==================================
 Header Top Timer
==================================*/
document.addEventListener("DOMContentLoaded", () => {
    const offerTimers = document.querySelectorAll(".ht-offer-timer");
    offerTimers.forEach((offerTimer) => {
        const startTimeStr = offerTimer.getAttribute("data-offer-start");
        const endTimeStr = offerTimer.getAttribute("data-offer-end");
        const now = new Date();
        const [year, month, day] = [
            now.getFullYear(),
            now.getMonth(), // JS months are 0-indexed
            now.getDate()
        ];
        // Build start and end Date objects for today
        const startParts = startTimeStr.split(":");
        const endParts = endTimeStr.split(":");
        const startDate = new Date(year, month, day, +startParts[0], +startParts[1], +startParts[2]);
        const endDate = new Date(year, month, day, +endParts[0], +endParts[1], +endParts[2]);
        function updateCountdown() {
            const now = new Date();
            if (now < startDate) {
                offerTimer.textContent = "Offer Not Started";
                return;
            }
            if (now >= endDate) {
                offerTimer.textContent = "Offer Expired!";
                return;
            }
            const timeLeft = endDate - now;
            const hours = Math.floor((timeLeft / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((timeLeft / (1000 * 60)) % 60);
            const seconds = Math.floor((timeLeft / 1000) % 60);
            offerTimer.textContent = `${String(hours).padStart(2, '0')}h:${String(minutes).padStart(2, '0')}m:${String(seconds).padStart(2, '0')}s`;
        }
        updateCountdown();
        const intervalId = setInterval(updateCountdown, 1000);
    });
});


//   Header Search Focus 
const searchModal = document.getElementById('searchModal');
const searchInput = document.querySelector('.header-search-input');
searchModal.addEventListener('shown.bs.modal', function () {
    searchInput.focus();
});

