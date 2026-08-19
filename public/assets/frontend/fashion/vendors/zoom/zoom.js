
if ($(".thumbs-slider").length > 0 && typeof Swiper !== 'undefined') {

    // Only init thumbs swiper if the old vertical thumbs element exists
    var thumbs = null;
    if ($(".tf-product-media-thumbs").length > 0 && $(".tf-product-media-thumbs .swiper-slide").length > 0) {
        var direction = $(".tf-product-media-thumbs").data("direction");
        thumbs = new Swiper(".tf-product-media-thumbs", {
          spaceBetween: 12,
          slidesPerView: "auto",
          freeMode: true,
          direction: "vertical",
          watchSlidesProgress: true,
          observer: true,
          observeParents: true,
          touchReleaseOnEdges: true,
          passiveListeners: true,
          touchStartPreventDefault: false,
          touchMoveStopPropagation: false,
          breakpoints: {
            0: {
              direction: "horizontal",
              slidesPerView: "auto",
            },
            1200: {
              direction: direction || "vertical",
              slidesPerView: "auto",
            },
          },
        });
    }

    // Always init the main product image swiper
    var mainSwiperConfig = {
      spaceBetween: 0,
      observer: true,
      observeParents: true,
      touchReleaseOnEdges: true,
      passiveListeners: true,
      touchAngle: 45,
      threshold: 15,
      touchStartPreventDefault: false,
      touchMoveStopPropagation: false,
      resistanceRatio: 0,
      allowTouchMove: true,
      navigation: {
        nextEl: ".thumbs-next",
        prevEl: ".thumbs-prev",
      },
    };

    // Only link thumbs if the thumbs swiper was successfully created
    if (thumbs) {
      mainSwiperConfig.thumbs = { swiper: thumbs };
    }

    window.productMainSwiper = new Swiper(".tf-product-media-main", mainSwiperConfig);
}

(function ($) {
    "use strict";

    var isTouchDevice = function() {
        return ('ontouchstart' in window) || 
               (navigator.maxTouchPoints > 0) || 
               (navigator.msMaxTouchPoints > 0) ||
               (window.matchMedia && window.matchMedia('(pointer: coarse)').matches) ||
               ($(window).width() < 992);
    };

    var section_zoom = function () {
        if (isTouchDevice()) return;
        $(".tf-image-zoom").on("mouseover", function () {
            $(this).closest(".section-image-zoom").addClass("zoom-active");
        });
        $(".tf-image-zoom").on("mouseleave", function () {
            $(this).closest(".section-image-zoom").removeClass("zoom-active");
        });
    };

    var image_zoom = function () {
        if (isTouchDevice()) return;
        if (typeof Drift === 'undefined') return;

        var driftAll = document.querySelectorAll('.tf-image-zoom');
        var pane = document.querySelector('.tf-zoom-main');
        if (!pane || driftAll.length === 0) return;

        $(driftAll).each(function(i, el) {
            new Drift(
                el, {
                    zoomFactor: 2,
                    paneContainer: pane,
                    inlinePane: false,
                    handleTouch: false,
                    hoverBoundingBox: true,
                    containInline: true,
                    passive: true,
                }
            );
        });
    };

    // Dom Ready
    $(function () {
        section_zoom();
        image_zoom();
    });
})(jQuery);


