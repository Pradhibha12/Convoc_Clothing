$(document).ready(function(){
    // Accordion Mobile Menu 



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



    
    // Sticky Menu Start
    /* Small Header Sticky (For Screens < 992px) */
    var smallHeaderSticky = function () {
        let lastScrollTop = 0;
        let delta = 5;

        function handleScroll() {
            let st = $(window).scrollTop();
            let navbarHeight = $(".ba-header-section").outerHeight();

            if (Math.abs(lastScrollTop - st) <= delta) return;

            if (st > lastScrollTop && st > navbarHeight) {
                $(".ba-header-section").css("top", `-${navbarHeight + 3}px`);
            } else {
                if (st + $(window).height() < $(document).height()) {
                    $(".ba-header-section").css("top", "0px");
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
            $(".ba-header-section").toggleClass("header-bg", $(window).scrollTop() > 100);
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
            $(".ba-header-section").removeAttr("style").removeClass("header-bg"); // Reset styles for larger screens
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
    //   Header Search Focus 
const searchModal = document.getElementById('searchModal');
const searchInput = document.querySelector('.header-search-input');
searchModal.addEventListener('shown.bs.modal', function () {
    searchInput.focus();
});
})



