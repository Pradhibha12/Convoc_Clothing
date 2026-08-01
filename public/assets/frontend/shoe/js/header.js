
$(document).ready(function(){
    
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

    
    
        

    /* header sticky
    -------------------------------------------------------------------------*/
    var headerSticky = function () {
        let didScroll;
        let lastScrollTop = 0;
        let delta = 5;
        let navbarHeight = $(".menu-header").outerHeight();
        $(window).scroll(function (event) {
        didScroll = true;
        });
        
        setInterval(function () {
        if (didScroll) {
            let st = $(this).scrollTop();

            // Make scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta) return;
            // If scrolled down and past the navbar, add class .nav-up.
            if (st > lastScrollTop && st > navbarHeight) {
            // Scroll Down
            $(".menu-header").css("top",`-${navbarHeight}px`)
            } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $(".menu-header").css("top","0px");
            }
            }
            lastScrollTop = st;
            didScroll = false;
        }
        }, 250);
    };

    /* header change background
    -------------------------------------------------------------------------*/
    var headerChangeBg = function () {
        $(window).on("scroll", function () {
        if ($(window).scrollTop() > 100) {
            $(".menu-header").addClass("header-bg");
        } else {
            $(".menu-header").removeClass("header-bg");
        }
        });
    }
    
    // Dom Ready
    $(function () {
        headerSticky();
        headerChangeBg();
    });
//   Header Search Focus 
    const searchModal = document.getElementById('searchModal');
    const searchInput = document.querySelector('.header-search-input');
    searchModal.addEventListener('shown.bs.modal', function () {
        searchInput.focus();
    });

});



