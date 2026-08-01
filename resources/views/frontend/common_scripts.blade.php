<script>
    "use strict";
    initScript();

    function initScript() {

        if ($('select.niceSelect:not(".inited")').length > 0) {
            $('select.niceSelect:not(".inited")').niceSelect();
            $('select.niceSelect:not(".inited")').addClass('inited');
        }

        if ($('select.select2-no-search:not(".inited")').length > 0) {
            $('select.select2-no-search:not(".inited")').select2();
            $('select.select2-no-search:not(".inited")').addClass('inited');
        }

        // START preventDefault used for hashed anchor tag
        if ($('a[href="#"]').length) {
            $('a[href="#"]').on('click', function(event) {
                event.preventDefault();
            });
        }
        // END preventDefault used for hashed anchor tag

        //Start summernote initialization
        if ($('textarea.summernote:not(.inited)').length) {
            $('textarea.summernote:not(.inited)').summernote({
                placeholder: 'Write your message here..',
                tabsize: 2,
                height: 180,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video', 'file', 'emoji']],
                ]
            });
            $('textarea.summernote:not(.inited)').addClass('inited');
        }
        //End summernote initialization


        if ($('.ajaxForm:not(.inited)').length > 0) {
            $('.ajaxForm:not(.inited)').ajaxForm({
                beforeSend: function(data, form) {
                    $('.top-progress-bar').width('0%');
                    $('.top-progress-bar').removeClass('hide');
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $('.top-progress-bar').width(percentComplete + '%');
                },
                complete: function(xhr) {
                    if (xhr.status == 401) {
                        error("{{ get_phrase('Please login first.') }}");
                        setTimeout(function() {
                            window.location.href = "{{ route('login') }}";
                        }, 1500);
                        return;
                    }

                    try {
                        let responseQuick = JSON.parse(xhr.responseText);
                        if (responseQuick.message && responseQuick.message == 'Unauthenticated.') {
                            error("{{ get_phrase('Please login first.') }}");
                            setTimeout(function() {
                                window.location.href = "{{ route('login') }}";
                            }, 1500);
                            return;
                        }
                    } catch(err) {}

                    distributeServerResponse(xhr.responseText);
                    $('.top-progress-bar').addClass('hide');

                    //Reset form if not showing any type of error message
                    try {
                        responseQuick = JSON.parse(xhr.responseText);
                        if (typeof responseQuick.validationError == "undefined" && typeof responseQuick.error ==
                            "undefined" && typeof responseQuick.warning ==
                            "undefined") {
                            if ($('form[action="' + this.url + '"]').length) {
                                $('form[action="' + this.url + '"]')[0].reset();
                            }
                        }
                    } catch(err) {}
                },
                error: function(e) {
                    console.log(e);
                }
            });
            $('.ajaxForm:not(.inited)').addClass('inited');
        }
    }


    function redirectTo(url) {
        $(location).attr('href', url);
    }

    function load_view(url, element, check_already_loaded) {
        if ($(element).text() == '' && check_already_loaded || !check_already_loaded) {
            $.ajax({
                url: url,
                success: function(response) {
                    $(element).html(response);
                }
            });
        }
    }

    function append_view(url, element) {
        $.ajax({
            url: url,
            success: function(response) {
                $(element).append(response);
            }
        });
    }

    function actionTo(url, type = "get") {
        //Start prepare get url to post value
        var jsonFormate = '{}';
        if (type == 'post') {
            let pieces = url.split(/[\s?]+/);
            let lastString = pieces[pieces.length - 1];
            if (lastString != url) {
                jsonFormate = '{"' + lastString.replace('=', '":"').replace("&", '","').replace("=", '":"').replace("&",
                    '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace(
                    "=",
                    '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace(
                    "&",
                    '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace(
                    "=",
                    '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace(
                    "&",
                    '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","') + '"}';
            }
        }

        jsonFormate = JSON.parse(jsonFormate);
        //End prepare get url to post value
        $.ajax({
            type: type,
            url: url,
            data: jsonFormate,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                distributeServerResponse(response);
            },
            error: function(e) {
                if (e.responseJSON && e.responseJSON.message && e.responseJSON.message == 'Unauthenticated.') {
                    error("{{ get_phrase('Please login first.') }}");
                    setTimeout(function() {
                        window.location.href = "{{ route('login') }}";
                    }, 1500);
                }
            }
        });
    }

    //Server response distribute
    function distributeServerResponse(response) {

        if (response) {
            response = JSON.parse(response);

            // If required login
            if (response.message && response.message == 'Unauthenticated.') {
                error("{{ get_phrase('Please login first.') }}");
                setTimeout(function() {
                    window.location.href = "{{ route('login') }}";
                }, 1500);
            }

            //For reload after submission
            if (typeof response.reload != "undefined" && response.reload != 0) {
                location.reload();
            }

            //For redirect to another url
            if (typeof response.redirectTo != "undefined" && response.redirectTo != 0) {
                redirectTo(response.redirectTo)
            }

            //for show a element
            if (typeof response.show != "undefined" && response.show != 0 && $(response.show).length) {
                $(response.show).css('display', 'inline-block');
            }
            //for hide a element
            if (typeof response.hide != "undefined" && response.hide != 0 && $(response.hide).length) {
                $(response.hide).hide();
            }
            //for fade in a element
            if (typeof response.fadeIn != "undefined" && response.fadeIn != 0 && $(response.fadeIn).length) {
                $(response.fadeIn).fadeIn(300);
            }
            //for fade out a element
            if (typeof response.fadeOut != "undefined" && response.fadeOut != 0 && $(response.fadeOut).length) {
                $(response.fadeOut).fadeOut(300);
            }

            //for fade out a element
            if (typeof response.removeElem != "undefined" && response.removeElem != 0 && $(response.removeElem)
                .length) {
                $(response.removeElem).fadeOut(300);
                setTimeout(() => {
                    $(response.removeElem).remove();
                }, 300);
            }

            //For adding a class
            if (typeof response.addClass != "undefined" && response.addClass != 0 && $(response.addClass.elem).length) {
                $(response.addClass.elem).addClass(response.addClass.content);
            }
            //For remove a class
            if (typeof response.removeClass != "undefined" && response.removeClass != 0 && $(response.removeClass.elem)
                .length) {
                $(response.removeClass.elem).removeClass(response.removeClass.content);
            }
            //For toggle a class
            if (typeof response.toggleClass != "undefined" && response.toggleClass != 0 && $(response.toggleClass.elem)
                .length) {
                $(response.toggleClass.elem).toggleClass(response.toggleClass.content);
            }

            //For showing error message
            if (typeof response.error != "undefined" && response.error != 0) {
                error(response.error);
            }
            //For showing warning message
            if (typeof response.warning != "undefined" && response.warning != 0) {
                warning(response.warning);
            }
            //For showing success message
            if (typeof response.success != "undefined" && response.success != 0) {
                success(response.success);
            }
            //For replace texts in a specific element
            if (typeof response.text != "undefined" && response.text != 0 && $(response.text.elem).length) {
                $(response.text.elem).text(response.text.content);
            }
            //For replace elements in a specific element
            if (typeof response.html != "undefined" && response.html != 0 && $(response.html.elem).length) {
                $(response.html.elem).html(response.html.content);
            }
            //For replace elements in a specific element
            if (typeof response.load != "undefined" && response.load != 0 && $(response.load.elem).length) {
                $(response.load.elem).html(response.load.content);
            }
            //For replace elements in a specific element
            if (typeof response.view != "undefined" && response.view != 0 && $(response.view.elem).length) {
                $(response.view.elem).html(response.view.content);
            }
            //For replace elements in a specific element
            if (typeof response.replace != "undefined" && response.replace != 0 && $(response.replace.elem).length) {
                $(response.replace.elem).replace(response.replace.content);
            }
            //For appending elements
            if (typeof response.append != "undefined" && response.append != 0 && $(response.append.elem).length) {
                $(response.append.elem).append(response.append.content);
            }
            //Fo prepending elements
            if (typeof response.prepend != "undefined" && response.prepend != 0 && $(response.prepend.elem).length) {
                $(response.prepend.elem).prepend(response.prepend.content);
            }
            //For appending elements after a element
            if (typeof response.after != "undefined" && response.after != 0 && $(response.after.elem).length) {
                $(response.after.elem).after(response.after.content);
            }

            //For appending elements after a element
            if (typeof response.after != "undefined" && response.after != 0 && $(response.after.elem).length) {
                $(response.after.elem).after(response.after.content);
            }

            //For appending data in attribute
            if (typeof response.attribute != "undefined" && response.attribute != 0 && $(response.attribute.elem)
                .length) {
                $(response.attribute.elem).attr(response.attribute.attr, response.attribute.content);
            }

            //For Refreshing datatable
            if (typeof response.refreshTable != "undefined" && response.refreshTable != 0) {
                $(response.refreshTable).DataTable().ajax.reload();
            }

            //For Refreshing datatable
            if (typeof response.closeModal != "undefined" && response.closeModal != 0) {
                const rightOffcanvas = $(response.closeModal);
                let openedBsOffcanvas = bootstrap.Offcanvas.getInstance(rightOffcanvas);
                openedBsOffcanvas.hide();
            }

            // Update the browser URL and add a new entry to the history
            if (typeof response.pushState != "undefined" && response.pushState != 0) {
                history.pushState({}, response.pushState.title, response.pushState.url);
                $('title').text(response.pushState.title);
            }

            //For form validation Error
            $('.form-validation-error-label').remove();
            if (typeof response.validationError != "undefined" && response.validationError != 0) {
                let errorList = '<ul>';
                Object.keys(response.validationError).forEach(key => {
                    if ($("[name=" + key + "]").length > 0) {
                        $("[name=" + key + "]").after(
                            '<small class="text-danger text-12px fw-600 form-validation-error-label">' +
                            response
                            .validationError[key][0] + '</small>');
                    } else if ($("input[name='" + key + "[]']").length > 0) {
                        $("input[name='" + key + "[]']").after(
                            '<small class="text-danger text-12px fw-600 form-validation-error-label">' +
                            response.validationError[key][0] + '</small>');
                    }

                    errorList = errorList + '<li>' + response.validationError[key][0] + '</li>';
                });
                errorList = errorList + '</ul>';

            }

            if (typeof response.script != "undefined" && response.script != 0) {
                response.script
            }
        }
    }
</script>


{{-- Bootstrap tooltip --}}
<script>
    "use strict";
    document.addEventListener('DOMContentLoaded', function() {
        "use strict";
        if (typeof bootstrap === 'undefined' || !bootstrap.Tooltip) return;
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
    });
</script>

{{-- Postal ZIP code autocomplete --}}
<script>
    "use strict";
    $(document).on('keyup change', '.zip-code-lookup-trigger', function() {
        var zipcode = $(this).val().trim();
        if (zipcode.length === 6) {
            var $form = $(this).closest('form');
            $.getJSON('/zipcode-lookup/' + zipcode, function(data) {
                if (data.status === 'success') {
                    $form.find('select[name="country_code"]').val(data.country_code).trigger('change');
                    
                    var stateRoute = "{{ route('view', ['path' => 'frontend.shipping_addresses.state_selector_by_country']) }}?country_code=" + data.country_code;
                    $.get(stateRoute, function(stateHtml) {
                        $('#states_of_selected_country').html(stateHtml);
                        
                        if (data.state_id) {
                            $form.find('select[name="state_id"]').val(data.state_id).trigger('change');
                            
                            var cityRoute = "{{ route('view', ['path' => 'frontend.shipping_addresses.city_selector_by_state']) }}?state_id=" + data.state_id;
                            $.get(cityRoute, function(cityHtml) {
                                $('#cities_of_selected_state').html(cityHtml);
                                
                                if (data.city_id) {
                                    $form.find('select[name="city_id"]').val(data.city_id).trigger('change');
                                }
                            });
                        }
                    });
                }
            });
        }
    });
</script>
