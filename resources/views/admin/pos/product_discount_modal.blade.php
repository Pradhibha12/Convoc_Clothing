 <div class="modal fade" id="itemsDiscountModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="itemsDiscountModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered custom-modal-size">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="d-flex justify-content-between align-items-center">
                     <h5 class="modal-title">{{ get_phrase('Tax & Discount') }}</h5>
                     <button type="button" class="custom-tile-xmark-buttom" data-bs-dismiss="modal">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                             <path
                                 d="M15.7369 14.482C16.0842 14.8292 16.0842 15.3921 15.7369 15.7393C15.5639 15.9123 15.3364 16 15.1089 16C14.8813 16 14.6538 15.9135 14.4808 15.7393L7.99868 9.25716L1.51654 15.7393C1.34353 15.9123 1.116 16 0.888477 16C0.660951 16 0.433426 15.9135 0.260411 15.7393C-0.0868037 15.3921 -0.0868037 14.8292 0.260411 14.482L6.74254 7.99987L0.260411 1.51777C-0.0868037 1.17056 -0.0868037 0.607626 0.260411 0.260411C0.607626 -0.0868037 1.17052 -0.0868037 1.51774 0.260411L7.99987 6.74258L14.482 0.260411C14.8292 -0.0868037 15.3921 -0.0868037 15.7393 0.260411C16.0865 0.607626 16.0865 1.17056 15.7393 1.51777L9.25718 7.99987L15.7369 14.482Z"
                                 fill="#6B707D" />
                         </svg>
                     </button>
                 </div>

                 <div class="customer-info-form mt-4">
                     <div class="row">
                         <div class="col-12">
                             <div class="fpb7 mb-2">
                                 <label class="form-label ol-form-label" for="modal_discount_input">{{ get_phrase('Discount (%)') }}</label>
                                 <input class="form-control ol-form-control" type="number" id="modal_discount_input" name="modal_discount" placeholder="{{ get_phrase('Add Discount') }}">
                             </div>

                             <div class="d-flex justify-content-end align-items-center customer-create-btn-main">
                                 <button type="button" class="custom-tile-cancel-buttom" data-bs-dismiss="modal">{{ get_phrase('Cancel') }}</button>
                                 <button type="submit" class="btn ol-btn-primary" id="addDiscountConfirmBtn">{{ get_phrase('Confirm') }}</button>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </div>
