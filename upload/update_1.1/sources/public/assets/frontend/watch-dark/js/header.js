$(document).ready(function(){
    // Accordion Mobile Menu 
    // function accordion() {
    //     var Accordion = function(el, multiple) {
    //         this.el = el || {};
    //         this.multiple = multiple || false;
    //         var links = this.el.find('.mobile-menuitem-a-have-sub');
    //         links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    //     }
    //     Accordion.prototype.dropdown = function(e) {
    //         var $el = e.data.el,
    //             $this = $(this),
    //             $next = $this.next();
    //         $next.slideToggle();
    //         $this.parent().toggleClass('active-mobile-submenu');
    //         if (!e.data.multiple) {
    //             $el.find('.mobile-dropdown-menu').not($next).slideUp().parent().removeClass('active-mobile-submenu');
    //             $el.find('.mobile-dropdown-menu').not($next).slideUp();
    //         };
    //     }
    //     var accordion = new Accordion($('.mobile-menu-ul'), false);
    // }
    // accordion();
    // Accordion Mobile Menu 

    // Accordion Sub Mobile Menu
    // function accordion2() {
    //     var Accordion2 = function(el, multiple) {
    //         this.el = el || $(document); 
    //         this.multiple = multiple || false;
    //         var links = this.el.find('.mobile-dropitem-a-have-sub');
    //         links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown);
    //     };
    //     Accordion2.prototype.dropdown = function(e) {
    //         var $el = e.data.el,
    //             $this = $(this), 
    //             $next = $this.next();
    //         $next.slideToggle(); 
    //         $this.parent().toggleClass('active-mobile-sub-submenu'); 
    //         if (!e.data.multiple) {
    //             $el.find('.mobile-subdrop-menu').not($next).slideUp().parent().removeClass('active-mobile-sub-submenu');
    //         }
    //     };
    //     $('.mobile-dropdown-menu').each(function() {
    //         new Accordion2($(this), false); 
    //     });
    // }
    // accordion2();

    function accordion3() {
    var Accordion3 = function(el, multiple) {
        this.el = el  || {};
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
        $('.mega-navbar-nav').each(function() {
            new Accordion3($(this), false); 
        });
    }
    accordion3();
    // Accordion Sub Mobile Menu


    // Signup Alert 
    // $('.signup-alert-cross').on('click', function () {
    //     $('.signup-alert-main').slideUp();
    // });
    




    // Sticky Menu Start
    /* Small Header Sticky (For Screens < 992px) */
    var smallHeaderSticky = function () {
        let lastScrollTop = 0;
        let delta = 5;

        function handleScroll() {
            let st = $(window).scrollTop();
            let navbarHeight = $(".wch-header-section").outerHeight();

            if (Math.abs(lastScrollTop - st) <= delta) return;

            if (st > lastScrollTop && st > navbarHeight) {
                $(".wch-header-section").css("top", `-${navbarHeight + 3}px`);
            } else {
                if (st + $(window).height() < $(document).height()) {
                    $(".wch-header-section").css("top", "0px");
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
            $(".wch-header-section").toggleClass("header-bg", $(window).scrollTop() > 100);
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
            $(".wch-header-section").removeAttr("style").removeClass("header-bg"); // Reset styles for larger screens
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

// document.addEventListener("DOMContentLoaded", function() {

//     // Coupon announcement
//     document.querySelector(".signup-alert-cross").addEventListener("click", function() {
//         document.querySelector(".signup-alert-main").classList.add("off");
//     });
// });

