@php
    $active_theme = \App\Models\Theme::where('status', 1)->first();
    $body = json_decode($active_theme->body, true);
   
  @endphp  


<div class="modal fade" id="confirmModal" aria-labelledby="ajaxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content pt-2">
            <div class="modal-body text-center">
                <div class="icon icon-confirm my-4">
                    <i class="fi-br-exclamation"></i>
                </div>
                <p class="title text-18px mb-2 text-dark">{{ get_phrase('Are you sure?') }}</p>
                <p class="text-muted">{{ get_phrase("You can't bring it back!") }}</p>

            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn ol-btn-secondary fw-500" data-bs-dismiss="modal">{{ get_phrase('Cancel') }}</button>
                <a href="" class="confirm-btn shop-black-btn fw-500">{{ get_phrase('Confirm') }}</a>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmModal(url, is_ajax = false) {
        const confirmButton = document.querySelector('#confirmModal .confirm-btn');
        $("#confirmModal").modal('show');

        // Clear any previously attached event listeners
        const newConfirmButton = confirmButton.cloneNode(true);
        confirmButton.parentNode.replaceChild(newConfirmButton, confirmButton);

        if (is_ajax !== false) {
            newConfirmButton.addEventListener('click', function(event) {
                event.preventDefault();
                actionTo(url); // Call your action function with the provided URL
                $("#confirmModal").modal('hide');
            });
        } else {
            newConfirmButton.setAttribute('href', url);
            newConfirmButton.removeAttribute('onclick');
        }
    }
</script>



<div class="modal fade" id="ajaxModal" aria-labelledby="ajaxModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-dark text-16px" id="ajaxModalLabel"></h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="w-100 text-center py-5">
                    <div class="spinner-border my-5" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn ol-btn-secondary" data-bs-dismiss="modal">{{ get_phrase('Close') }}</button>
            </div>
        </div>
    </div>
</div>
<script>
    'use strict';

    function ajaxModal(url, title, modalClasses = 'modal-md', animation = 'fade') {
        $('#ajaxModal .modal-dialog').removeClass('modal-sm');
        $('#ajaxModal .modal-dialog').removeClass('modal-md');
        $('#ajaxModal .modal-dialog').removeClass('modal-lg');
        $('#ajaxModal .modal-dialog').removeClass('modal-xl');
        $('#ajaxModal .modal-dialog').removeClass('modal-xxl');
        $('#ajaxModal .modal-dialog').removeClass('modal-fullscreen');
        $('#ajaxModal .modal-dialog').addClass(modalClasses);

        $('#ajaxModal').removeClass('fade');
        $('#ajaxModal').addClass(animation);

        $('#ajaxModal .modal-title').html(title);
        $("#ajaxModal").modal('show');
        $.ajax({
            type: 'get',
            url: url,
            success: function(response) {
                $('#ajaxModal .modal-body').html(response);
            }
        });
    }
</script>





<!-- Start Offcanvas Shop Cart Area -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-offcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
                    {{-- Ajax Cart items --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Offcanvas Shop Cart Area -->

<!-- Start Quick View Modal -->
<section>
    <div class="container">
        <div class="modal quick-view-modal " id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
               
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                        @if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' )
                         <button type="button" class="btn-close text-white bgs"  data-bs-dismiss="modal" aria-label="Close">X</button>
                    @else
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                    </div>
                    <div class="modal-body">
                        <div class="d-flex w-100 justify-content-center">
                            <div class="spinner-border my-5" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Quick View Modal -->



{{-- New theme modal --}}

<!-- form Modal Start -->
<div class="modal fade header-login-modal" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button> --}}
                 @if($active_theme->identifier == 'perfume' || $active_theme->identifier == 'travel-dark' || $active_theme->identifier == 'car-dark'  || $active_theme->identifier == 'watch-dark' )
                   <button type="button" class="btn-close text-white bgs" data-bs-dismiss="modal" aria-label="Close">X</button>
                @else
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                @endif
            </div>
            <div class="modal-body">
                <div class="w-100 text-center py-5">
                    <div class="spinner-border my-5" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form Modal End -->

<script>
    'use strict';

    function formModal(url, title, modalClasses = 'modal-md', animation = 'fade') {
        $('#formModal .modal-dialog').removeClass('modal-sm');
        $('#formModal .modal-dialog').removeClass('modal-md');
        $('#formModal .modal-dialog').removeClass('modal-lg');
        $('#formModal .modal-dialog').removeClass('modal-xl');
        $('#formModal .modal-dialog').removeClass('modal-xxl');
        $('#formModal .modal-dialog').removeClass('modal-fullscreen');
        $('#formModal .modal-dialog').addClass(modalClasses);

        $('#formModal').removeClass('fade');
        $('#formModal').addClass(animation);

        $("#formModal").modal('show');
        $.ajax({
            type: 'get',
            url: url,
            success: function(response) {
                $('#formModal .modal-body').html(response);
            }
        });
    }
</script>