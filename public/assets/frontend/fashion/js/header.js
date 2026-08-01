

$(document).ready(function(){



    var $hniceSelect = $('.fsh-nice-select');
    if ($hniceSelect.length > 0) {
        $('.fsh-nice-select').niceSelect('destroy');
        $hniceSelect.niceSelect(); 
    }

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

    /* header sticky
    -------------------------------------------------------------------------*/
    var headerSticky = function () {
        let didScroll;
        let lastScrollTop = 0;
        let delta = 5;
        let navbarHeight = $(".logo-header").outerHeight();
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
            $(".logo-header").css("top",`-${navbarHeight}px`)
            } else {
            // Scroll Up
            if (st + $(window).height() < $(document).height()) {
                $(".logo-header").css("top","0px");
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
            $(".logo-header").addClass("header-bg");
        } else {
            $(".logo-header").removeClass("header-bg");
        }
        });
    }
    
    // Dom Ready
    $(function () {
        headerSticky();
        headerChangeBg();
    });


    // Accordion Mobile Menu 
    function accordion() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;
            var links = this.el.find('.mobile-menuitem-a-have-sub');
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

});



if (typeof bootstrap !== "undefined") {
    
    const toastTrigger = document.getElementById('liveToastBtn');
    const toastLiveExample = document.getElementById('liveToast');
  
    if (toastTrigger && toastLiveExample) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
      toastTrigger.addEventListener('click', () => {
        toastBootstrap.show();
      });
    }
} else {
    console.warn('Bootstrap JS not loaded — tooltip and toast features skipped.');
}


