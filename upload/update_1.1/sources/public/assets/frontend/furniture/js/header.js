
$(document).ready(function(){
     // Nice Select 
     if ($('.ec-nice-select').length > 0) {
        $('.ec-nice-select').niceSelect('destroy');
        $('.ec-nice-select').niceSelect(); 
    }


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
    // Accordion Sub Mobile Menu


    // Mega Dropdown
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
        $('.mega-nav').each(function() {
            new Accordion3($(this), false); 
        });
    }
    accordion3();
    // Mega Dropdown



    // Accordion Mobile Menu 
    function accordion() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            // Variables privadas
            var links = this.el.find('.mobile-menuitem-a-have-sub');
            // Evento
            links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }
        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el,
                $this = $(this),
                $next = $this.next();
            $next.slideToggle();
            $this.parent().toggleClass('active-mobile-submenu');
            if (!e.data.multiple) {
                $el.find('.mobile-dropdown-menu').not($next).slideUp().parent().removeClass('active-mobile-submenu');
                $el.find('.mobile-dropdown-menu').not($next).slideUp();
            };
        }
        var accordion = new Accordion($('.mobile-menu-ul'), false);
    }
    accordion();
    // Accordion Mobile Menu 



    // Sticky Menu Start
    /* Header Sticky */
    var headerSticky = function () {
        let lastScrollTop = 0;
        let delta = 5;
        let navbarHeight = $(".menu-header").outerHeight();

        $(window).on("scroll", function () {
            let st = $(window).scrollTop();

            if (Math.abs(lastScrollTop - st) <= delta) return;

            if (st > lastScrollTop && st > navbarHeight) {
                $(".menu-header").css("top", `-${navbarHeight + 3}px`);
            } else {
                if (st + $(window).height() < $(document).height()) {
                    $(".menu-header").css("top", "0px");
                }
            }
            lastScrollTop = st;
        });
    };

    /* Header Change Background */
    var headerChangeBg = function () {
        $(window).on("scroll", function () {
            $(".menu-header").toggleClass("header-bg", $(window).scrollTop() > 100);
        });
    };

    /* Small Header Sticky (For Screens < 768px) */
    var smallHeaderSticky = function () {
        let lastScrollTop = 0;
        let delta = 5;

        function handleScroll() {
            let st = $(window).scrollTop();
            let navbarHeight = $(".logo-header").outerHeight();

            if (Math.abs(lastScrollTop - st) <= delta) return;

            if (st > lastScrollTop && st > navbarHeight) {
                $(".logo-header").css("top", `-${navbarHeight + 3}px`);
            } else {
                if (st + $(window).height() < $(document).height()) {
                    $(".logo-header").css("top", "0px");
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
            $(".logo-header").toggleClass("header-bg2", $(window).scrollTop() > 100);
        }

        $(window).off("scroll", handleBgChange);
        $(window).on("scroll", handleBgChange);
    };

    // Reinitialize on Resize (Ensures proper functionality if window size changes)
    var handleResize = function () {
        if ($(window).width() < 768) {
            smallHeaderSticky();
            smallHeaderChangeBg();
        } else {
            $(".logo-header").removeAttr("style").removeClass("header-bg2"); // Reset styles for larger screens
        }
    };

    // DOM Ready
    $(function () {
        headerSticky();
        headerChangeBg();
        handleResize(); // Initialize on load

        $(window).on("resize", function () {
            handleResize(); // Recheck on window resize
        });
    });
    // Sticky Menu End

});

