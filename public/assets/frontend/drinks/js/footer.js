$(document).ready(function(){
    // Text slider
    if ($('.ft-text-slider').length > 0){
        var fttextSlider = new Swiper(".ft-text-slider", {
            slidesPerView: "auto",
            spaceBetween: 16,
            centeredSlides: true,
            loop: true,
            freeMode: true,
            speed: 6000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                576: {
                    spaceBetween: 21,
                },
            }
        });
    }
    
});