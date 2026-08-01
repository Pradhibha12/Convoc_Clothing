<script>
    'use strict';

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

    function silentAction(url, type = "get") {
        //Start prepare get url to post value
        var jsonFormate = '{}';
        if (type == 'post') {
            let pieces = url.split(/[\s?]+/);
            let lastString = pieces[pieces.length - 1];
            jsonFormate = '{"' + lastString.replace('=', '":"').replace("&", '","').replace("=", '":"').replace("&",
                '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=",
                '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&",
                '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=",
                '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&",
                '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","') + '"}';
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
            success: function(response) {}
        });
    }

    function downloadPDF(elem = ".print-table", fileName = 'data') {
        $('.print-d-none:not(.row, .ol-header, .ol-card)').addClass('d-none');
        // Get the table element as HTML
        const table = document.querySelector(elem);

        // Options for html2pdf
        const options = {
            margin: 0.5,
            filename: fileName,
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };

        // Generate PDF from the table
        if (html2pdf().from(table).set(options).save()) {
            setInterval(() => {
                $('.print-d-none').removeClass('d-none');
            }, 2000);
        }

    }

    function product_image_delete(url, key){
        $.ajax({
            url: url,
            success: function(result){
                if(result == 1){
                    $("#image-icon"+key).hide();
                }
            }
        });
    }
</script>
