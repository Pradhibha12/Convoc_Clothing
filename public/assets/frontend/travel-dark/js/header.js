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



});


