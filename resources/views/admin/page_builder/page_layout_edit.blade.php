<!DOCTYPE html>
<html lang="en">

<head>
    {{ config(['app.name' => get_settings('system_title')]) }}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ get_phrase('Edit Layout') }} | {{ config('app.name') }}</title>
    <meta content="{{ csrf_token() }}" name="csrf_token" />

    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/global/bootstrap-5.3.3/css/bootstrap.min.css') }}">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ asset('assets/global/nice-select/nice-select.css') }}">
    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('assets/global/select2/select2.min.css') }}">

    <!-- UI Flat icon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}">
    <!-- Image Zoom -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/image-zoom/image-zoom.css') }}">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/jquery-ui/jquery-ui.css') }}">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/swiper/swiper-bundle.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/magnific-popup/magnific-popup.css') }}">
    <!-- R Progressbar -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jquery.rprogessbar.min.css') }}">
    <!-- Drift -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/dript/drift-basic.min.css') }}">
    {{-- Summernote --}}
   
    <!-- Venobox Popup -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/venobox/venobox.min.css') }}">
    <!-- Wow animation -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/vendors/wow-js/animate.min.css') }}">
    <!-- Custom Css -->
   
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/responsive.css') }}">
  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fashion/css/custom.css') }}">

    {{-- Summernote CSS --}}
    <link href="{{ asset('assets/global/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    {{-- Yaireo Tagify CSS --}}
    <link href="{{ asset('assets/global/tagify-master/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
   

    
    <script src="{{ asset('assets/global/jquery-3.7.1/jquery-3.7.1.min.js') }}"></script>
     <!-- Jquery Ui Js -->
   <script src="{{ asset('assets/global/jquery-3.7.1/jquery-ui.min.js') }}"></script>
    {{-- jQuery --}}
    <!-- toster file -->
    @include('frontend.toaster')

    <style>
        .text-30px {
            font-size: 30px;
        }
    </style>
</head>

<body>

    <!-- Builder bar -->
    <div id="editor_top_bar" class="editor_top_bar">
        <div class="container">
            <div class="row">
                <div class="col-4 py-3">
                    <div class="editor_title">{{ get_phrase('Page Builder') }}</div>
                </div>
                <div class="col-4 py-2 text-center">
                    <a class="btn btn-dark  mx-1 save-button" href="{{ route('admin.page.preview', $id) }}" target="_blank">
                        <i class="fi-rr-eye"> </i>{{ get_phrase('Preview') }}
                    </a>

                    <button class="btn btn-dark  mx-1 save-button" onclick="getDeveloperFileContent('{{ $id }}')">
                        <i class="fi-rr-arrow-alt-square-down"> </i>{{ get_phrase('Save') }}
                    </button>

                    {{-- <button class="btn btn-dark  mx-1 save-button" onclick="show_offcanvas('{{ route('view', ['path' => 'admin.page_builder.page_elements']) }}', '{{ get_phrase('Elements') }}')">
                        <i class="fi-rr-plus"> </i>{{ get_phrase('Add New Element') }}
                    </button> --}}

                </div>
                <div class="col-4 py-2">
                    <a class="btn btn-dark  float-end mx-1" href="{{ route('admin.themes') }}">
                        <i class="fi-rr-angle-left"> </i>{{ get_phrase('Back') }}</a>
                </div>
            </div>
        </div>

    </div>

    <div id="main">
        @foreach (json_decode($theme->html, true) ?? [] as $key => $theme_file_name)
            <div builder-block-identifier="{{ time() . rand(1000, 9999) . $key }}" builder-block-file-name="{{ $theme_file_name }}">
                @include('components.home_made_by_builder.'. $theme->identifier . '.'. $theme_file_name)
            </div>
        @endforeach
    </div>

 







    @include ('admin.page_builder.page_layout_edit_offcanvas')
   
   

    <script src="{{ asset('assets/global/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/global/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/global/select2/select2.min.js') }}"></script>

    <script src="{{ asset('assets/frontend/fashion/vendors/image-zoom/image-zoom.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/mixitup/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/rprogressbar/jQuery.rProgressbar.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

  
    <script type="module" src="{{ asset('assets/frontend/fashion/vendors/zoom/zoom.js') }}"></script>
    <script src="{{ asset('assets/frontend/fashion/vendors/venobox/venobox.min.js') }}"></script>

    
    <script src="{{ asset('assets/frontend/fashion/js/script.js') }}"></script>

    <script>
        "use strict";

        // Save the edited layout into database
        // function save_layout(developer_elements, builder_elements) {
        function save_layout(builder_elements) {
            // Remove builder tool START
            // removes the options elements: buttons & borders
            $(".content_editor_buttons").remove();
            $('.builder-editable.initialized').removeClass('initialized');
            $('#main .builder-editable-wraper > .builder-editable').each(function(index, elem) {
                //To remove parent div (.builder-editable-wraper)
                $(this).unwrap();
            });
            // Remove builder tool END

            // Sending the ajax call
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "POST",
                data: {
                    // developer_elements: developer_elements,
                    builder_elements: builder_elements,
                    id: {{ $id }}
                },
                url: "{{ route('admin.page.layout.update', ['id' => $id]) }}",
                success: function(msg) {
                    success('Page layout has been updated');
                    // Re-initiate the builder
                    builder_initiated()
                },
                error: function(xhr, status, error) {
                    if (xhr.responseText && JSON.parse(xhr.responseText).errors && JSON.parse(xhr.responseText).errors[0] && JSON.parse(xhr.responseText).errors[0].message) {
                        error(JSON.parse(xhr.responseText).errors[0].message);
                    } else {
                        error('An error occurred while updating the layout');
                    }
                }
            });


        }


        function separateElementsByDom(html) {
            // Create a new DOMParser instance
            let parser = new DOMParser();
            let doc = parser.parseFromString(html, 'text/html');
            let builderElements = {};
            // console.log(html)
            // Find all elements with the builder-block-file-name attribute
            let nodes = doc.querySelectorAll('[builder-block-file-name]');
            nodes.forEach(node => {
                // console.log(node.innerHTML);
                
                // Find elements within each node with builder-identity attribute
                let nodeIdentities = node.querySelectorAll('[builder-identity]');
                let fileName = node.getAttribute('builder-block-file-name');

                // Initialize the fileName key in the builderElements object
                if (!builderElements[fileName]) {
                    builderElements[fileName] = {};
                }
                // console.log(nodeIdentities.length)
                if (nodeIdentities.length > 0) {
                    nodeIdentities.forEach(identityNode => {
                        // console.log(getElementPath(identityNode));

                        // Skip if the node is inside a swiper-slide-duplicate 
                        if (identityNode.closest('.swiper-slide-duplicate')) {
                            return;
                        }
                        // Skip if the node is inside a swiper-slide-duplicate

                        let identity = identityNode.getAttribute('builder-identity');

                        // Check for duplicate identity
                        if (builderElements[fileName][identity]) {
                            var errorMessage = `Duplicate builder-identity "${identity}" found in "${fileName}". Execution stopped. You can solve this issue by removing the "${fileName}" block and adding it again from the right sidebar.`;
                            error(errorMessage);
                            // Show an error message and stop execution
                            throw new Error(errorMessage);
                        }

                        builderElements[fileName][identity] = {
                            element: btoa(unescape(encodeURIComponent(identityNode.outerHTML))),
                            tag: btoa(unescape(encodeURIComponent(identityNode.tagName.toLowerCase()))),
                            identity: identity,
                            content: btoa(unescape(encodeURIComponent(identityNode.textContent))),
                            src: btoa(unescape(encodeURIComponent(identityNode.getAttribute('src')))),

                            // Those for drop area
                            dropAreaIndex: getElementPosition(identityNode)[0],
                            droppedIndex: getElementPosition(identityNode)[1],
                        };
                        // console.log(builderElements[fileName][identity])
                    });
                } else {
                    builderElements[fileName][1] = {
                        element: 'null',
                        tag: 'null',
                        identity: 'null',
                        content: 'null',
                        src: 'null',

                        // Those for drop area
                        dropAreaIndex: 'null',
                        droppedIndex: 'null',
                    };
                }
                // console.log(builderElements)
            });

            return builderElements;
        }

        function getDeveloperFileContent(id) {
            $(".remove-dropped-item").remove();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "POST",
                url: "{{ route('admin.page.all.builder.developer.file') }}?id=" + id,
                success: function(developerhtml) {
                    var builder_html = document.querySelector('#main').innerHTML;
                    // var developer_elements = separateElementsByDom(developerhtml);
                    var builder_elements = separateElementsByDom(builder_html);
                    save_layout(builder_elements);
                    // save_layout(developer_elements, builder_elements);
                }
            });
        }

        function getElementPosition(el) {
            var dropAreaIndex = null;
            var droppedIndex = null;


            var dropArea = $(el).closest('.drop-area');
            var selectedFileArea = dropArea.closest('[builder-block-file-name]');

            if (dropArea) {
                dropAreaIndex = selectedFileArea.find('.drop-area').index(dropArea);
                droppedIndex = dropArea.find('*').index(el);
            }

            // console.log('Drop Area Index: ' + dropAreaIndex + ', Dropped Index: ' + droppedIndex);

            return [dropAreaIndex, droppedIndex];
        }



        function initialize_draggable(helper = 'original') {
            // Palette / modal items (source)
            $(".draggable:not(.dragable-initiated)").draggable({
                helper: helper,
                appendTo: "body",
                zIndex: 10000,
                revert: "invalid",
                cancel: false,
                connectToSortable: ".drop-area"
            });
            $(".draggable:not(.dragable-initiated)").addClass('dragable-initiated'); // mark as initiated

            // Drop areas: sortable setup
            $(".drop-area:not(.drop-area-initiated)").sortable({
                connectWith: ".drop-area",
                placeholder: "drop-placeholder",
                tolerance: "pointer",

                start: function(event, ui) {
                    // Disable sorting for non-draggable items
                    if (!ui.item.hasClass("draggable")) {
                        $(this).sortable("cancel"); // stop sorting non-draggable
                        return false;
                    }
                },
                receive: function(event, ui) {
                    // enhance_dragable_elements(ui.item);
                },
                update: function(event, ui) {
                    enhance_dragable_elements(ui.item);
                },

                // 💡 Highlight handlers
                activate: function(e) {
                    $(this).addClass("ui-droppable-active"); // start highlighting when dragging starts
                },
                deactivate: function() {
                    $(this).removeClass("ui-droppable-active"); // remove highlight when drag stops
                },
                over: function() {
                    if ($(this).find('.ui-draggable-dragging, .ui-sortable-helper').length == 0) {
                        return; // Skip if no draggable item is present
                    }

                    $(this).addClass("ui-droppable-hover"); // stronger highlight when hovering

                    var sortableItemWidth = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerWidth();
                    var sortableItemHeight = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerHeight();
                    console.log('Width: ' + sortableItemWidth + ', Height: ' + sortableItemHeight);
                    if (sortableItemWidth == undefined || sortableItemWidth < 10) {
                        sortableItemWidth = 120;
                    }
                    if (sortableItemHeight == undefined || sortableItemHeight < 5) {
                        sortableItemHeight = 40;
                    }
                    $('.ui-sortable-placeholder, .drop-placeholder').width(sortableItemWidth);
                    $('.ui-sortable-placeholder, .drop-placeholder').height(sortableItemHeight);
                },
                out: function() {
                    $(this).removeClass("ui-droppable-hover"); // remove hover highlight
                }

            }).disableSelection();
            $(".drop-area:not(.drop-area-initiated)").addClass('drop-area-initiated'); // mark as initiated
        }

        function enhance_dragable_elements(item = null) {
            if (item != null && item.hasClass('draggable')) {
                item.removeClass("cursor-move ui-draggable ui-draggable-handle ui-draggable-dragging")
                    .addClass("dropped-item builder-editable")
                    .attr("builder-identity", function() {
                        return Math.floor(Math.random() * 1000000); // Generate a random unique ID
                    })
                    .removeAttr("style");

                if (item.find(".remove-dropped-item").length == 0) {
                    item.append('<span class="remove-dropped-item"><i class="fi-rr-cross"></i></span>');
                }

                item.find(".remove-dropped-item").off('click').on('click', function(e) {
                    $(this).closest('.dropped-item').remove();
                    e.preventDefault();
                });
            } else {
                $('.dropped-item.draggable').each(function() {
                    enhance_dragable_elements($(this));
                });
            }

            setTimeout(() => {
                $('a[href="#"]').on('click', function(event) {
                    event.preventDefault();
                });
                text_and_image_make_editable();
            }, 800);
        }
    </script>


    <style>
        .parent {
            position: relative;
            /* Add any other styles you want for the parent div */
        }

        .parent:hover {
            outline: 2px dashed black;
            display: block;
        }

        .child {
            position: absolute;
            display: none;
            float: right;
            text-align: center;
            top: 0;
            left: 0;
            width: 100%;
            cursor: move;
            margin-top: 5px;
        }

        .parent:hover>.child {
            display: block;
        }

        .block_delete {
            border-radius: 5px 0px 0px 5px !important;
            margin-right: -5px !important;
        }

        .block_add {
            border-radius: 0px 5px 5px 0px !important;
        }


        .editor_top_bar {
            background-color: #121729;
            position: relative;
            z-index: 9;
        }

        .editor_title {
            color: #faf4ff;
            font-size: 14px;
        }

        .builder_image img {
            display: block;
        }

        .placeholder_block {
            text-align: center;
            outline: 2px dashed #c1b4d8;
            padding: 50px;
            margin-top: 50px;
            border-radius: 10px;
        }

        .placeholder_block>div {
            margin-top: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            color: #12172a;
        }

        .toast {
            font-size: 13px;
        }

        /* Flaticon spacing isse fixed START*/
        i:not(.fas, .fa, .fab) {
            line-height: 1.5 !important;
            vertical-align: -0.12em !important;
            display: inline-flex !important;
            margin: 3px;
        }

        /* Flaticon spacing isse fixed END*/


        /* Drag and Drop element css started */
        .ui-sortable-placeholder,
        .drop-placeholder {
            display: inline-block;
            border: 3px dashed #c1b4d8;
            visibility: visible !important;
            background: transparent;
            height: 40px;
            width: 120px;
            margin-bottom: 10px;
            border-radius: 8px !important;
        }

        .ui-droppable-active,
        .ui-droppable-hover {
            position: relative;
        }

        .ui-droppable-active::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            border-radius: inherit !important;
            border: 3px dashed #FF9800;
        }

        .ui-droppable-hover::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            border-radius: inherit !important;
            border: 3px dashed #00ff88;
        }

        .cursor-move {
            cursor: move !important;
        }

        .dropped-item:hover .remove-dropped-item {
            display: block;
        }

        .remove-dropped-item {
            display: none;
            position: absolute;
            top: -15px;
            right: -4px;
            background: #ff1010;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1000;
            font-size: 10px;
        }

        .remove-dropped-item:hover {
            background: #c10909;
            color: white;
        }

        button,
        a {
            transition: none !important;
        }

        /* .drop-area :not(.dropped-item) {
            position: relative !important;
        } */
        /* Drag and Drop element css started */

        .main-banner-section {
            background-image: none;
        }
        .content_editor_buttons .block_add ,
        .content_editor_buttons .block_delete {
            padding: 4px 10px;
        }
        .content_editor_buttons .block_add i,
        .content_editor_buttons .block_delete i{
            font-size: 14px;
        }
        /* Fitness Css */
        .ambassador-card .ambassador-badge {
                position: absolute !important;
                z-index: 9999;
                width: 163.856px;
                display: flex !important;
            }
            .signup-alert-info.builder-editable,
            .featured-collection2-section .wch-btn-white.builder-editable,
            .featured-collection-section .wch-btn-white.builder-editable,
            .tr-white-btn-large.builder-editable,
            .why-choose-subtitle.builder-editable,
            .why-choose-title.builder-editable,
            .wc-btn-outline-dark.builder-editable,
            .dark-corner-btn.builder-editable,
            .mi-btn-outline-dark.builder-editable,
            .category-section-title.builder-editable,
            .brand-section-title.builder-editable,
            .ctsb2-btn-outline-white.builder-editable,
            .cts-btn-outline-black.builder-editable,
            .section-sm-title.builder-editable,
            .pf-btn-outline-white.builder-editable,
            .testimonial-section-title-area .fst-italic.builder-editable,
            .fc2-section-title-area .wch-btn-skin.builder-editable,
            .featured-collection-section .wch-btn-skin.builder-editable,
            .category-title-area .section-title.builder-editable,
            .ec2-btn-skin.builder-editable,
            .fsp-title-40px.builder-editable,
            .tr-black-btn-large.builder-editable,
            .tr-section span.builder-editable,
            .testimonial-section .bs-btn-outline-dark.px-20px.builder-editable,
            .inspirational-title-area .section-title.builder-editable ,
            .inspirational-title-area .inspirational-section-subtitle.builder-editable ,
            .ml-title-48px.builder-editable ,
            .mu-title-36px.builder-editable ,
            .mv-title-40px.builder-editable ,
            .feedback-title-area  .text-center  .builder-editable ,
           .ph-title-area .text-center  .builder-editable ,
           .category-title-area .text-center  .builder-editable {
                margin: auto;
            }
            .tr-section span.builder-editable,
            .inspirational-title-area .inspirational-section-subtitle.builder-editable {
                margin-bottom: 38px;
            }
            .product-highlight-card::after {
                position: relative;
               
            }
            .bn-rating-info.builder-editable,
            .tr-trust-area  .builder-editable{
                width: inherit;
            }
            .tr-trust-area  .tr-black-btn-large.builder-editable{
                width: fit-content;
                margin: inherit;
            }
            .promotion-area .tr-section .builder-editable,
            .tr-adventure-box .tr-section .builder-editable{
                margin-left: 0;
            }
            .tr-kit-area .tr-section .builder-editable {
                margin: inherit;
                
            }
           .tr-kit-motion .builder-editable-wraper {  
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
            }
           .tr-trust-area  .trusted p {
                width: auto;
            }

            .tr-ad-motion {
                z-index: 999;
            }
            .tr-adventure::after {
                position: relative;
               
            }
            /* Furniture */
            .banner-section-main .banner-product-details {
                z-index: 9999;
            }
            .offer-ads-content .al-title-20px.builder-editable,
            .offer-ads-content .oads-title.builder-editable
            {
                z-index: 99;
            }
            .offer-ads-card .banner {
                
                z-index: 1;
            }
            .top-header-section .nice-select {
                background-color: transparent;
            }
            .pf-sm-banner-wrap .pf-sm-banner-text {
                    width: 70px !important;
                    display: flex !important;
                    position: absolute !important;
                    z-index: 9999 !important;
                    
             }
             .pf-sm-banner-wrap .builder-editable-wraper{
                border-radius: 500px;
             }
             .pf-offer-banner2 .builder-editable-wraper,
             .pf-offer-banner1 .builder-editable-wraper,
             .embrace-banner2 .builder-editable-wraper,
             .embrace-banner1 .builder-editable-wraper{
                border-radius: 1025px;
             }
             .pf-benefit-icon .builder-editable-wraper{
                margin: auto;
             }
             .seasonal-product2::after,
             .seasonal-product3::after,
             .seasonal-product1::after{
                position: relative;
             }
             .deal-slide-content,
              .banner-overlay-wrap,
            .sc-banner-overlay {
                z-index: 99;
            }
            .brand-section-title.builder-editable{
                margin-bottom: 50px;
            }
            .hero-banner1::after,
            .seasonal-product-banner::after,
            .bp-small-card::after,
            .bp-large-card::after {
                display: none;
            }
         .wc-header-section {
            position: relative;
            z-index: 9999;
        }
         .why-choose-title.builder-editable {
            margin-bottom: 15px;
        }
        .tr-tranding-products .trending-section-title-area .tr-white-btn-large.builder-editable,
        .tr-tranding-products .trending-section-title-area span.builder-editable{
            margin: initial;
        }
        .tr-trust-area .trust-title-area .tr-white-btn-large.builder-editable {
           width: fit-content;
        } 
        /* Fitness Css */
        
    </style>
</body>

</html>
