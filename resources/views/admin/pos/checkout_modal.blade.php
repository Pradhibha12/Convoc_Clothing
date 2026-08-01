 <div class="modal fade" id="createCheckoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createCheckoutModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered custom-modal-size">
         <div class="modal-content">
             <div class="modal-body">
                 <div class="d-flex justify-content-end align-items-center">
                     <button type="button" class="custom-tile-xmark-buttom" data-bs-dismiss="modal">
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                             <path
                                 d="M15.7369 14.482C16.0842 14.8292 16.0842 15.3921 15.7369 15.7393C15.5639 15.9123 15.3364 16 15.1089 16C14.8813 16 14.6538 15.9135 14.4808 15.7393L7.99868 9.25716L1.51654 15.7393C1.34353 15.9123 1.116 16 0.888477 16C0.660951 16 0.433426 15.9135 0.260411 15.7393C-0.0868037 15.3921 -0.0868037 14.8292 0.260411 14.482L6.74254 7.99987L0.260411 1.51777C-0.0868037 1.17056 -0.0868037 0.607626 0.260411 0.260411C0.607626 -0.0868037 1.17052 -0.0868037 1.51774 0.260411L7.99987 6.74258L14.482 0.260411C14.8292 -0.0868037 15.3921 -0.0868037 15.7393 0.260411C16.0865 0.607626 16.0865 1.17056 15.7393 1.51777L9.25718 7.99987L15.7369 14.482Z"
                                 fill="#6B707D" />
                         </svg>
                     </button>
                 </div>



                 <form id="checkoutForm" class="checkout_main_box" method="POST">
                     @csrf
                     <input type="hidden" id="checkout_customer_id" name="checkout_customer_id" value="">

                     <input type="hidden" id="checkout_category_id" name="checkout_category_id" value="">
                     <input type="hidden" id="checkout_total_count_items_input" name="checkout_total_items" value="">
                     <input type="hidden" id="checkout_items_tax" name="checkout_items_tax" value="{{ currency(0) }}">
                     <input type="hidden" id="checkout_items_discount" name="checkout_items_discount" value="{{ currency(0) }}">
                     <input type="hidden" id="checkout_items_gift_card" name="checkout_items_gift_card" value="{{ currency(0) }}">

                     <input type="hidden" id="checkout_modal_main_total_amount" name="checkout_modal_main_total_amount" value="{{ currency(0) }}">


                     <input type="hidden" id="checkout_items_id" name="checkout_items_id[]" value="">
                     <input type="hidden" id="checkout_items_count" name="checkout_items_count[]" value="">

                     <div class="checkout_modal_total_amount_main">
                         <input class="checkout_modal_total_amount_style" type="text" name="checkout_modal_total_amount" id="checkout_modal_total_amount" value="{{ currency(0) }}" readonly>
                         <p class="total_item_purchase_amount">{{ get_phrase('Total item purchase amount') }}</p>
                     </div>
                     <div class="checkout_modal_total_price_main">
                         <div class="checkout_modal_total_price_sub">
                             <h1 class="checkout_modal_total_price_main_cash">{{ get_phrase('Cash') }}</h1>
                             <input class="checkout_modal_total_price_style" type="hidden" id="checkout_modal_total_amount_price" name="checkout_modal_total_amount_price" value="{{ currency(0) }}" readonly>
                             <input class="checkout_modal_total_price_style" type="text" id="checkout_modal_total_price_round" name="items_total_payble_round_amount" value="{{ currency(0) }}" readonly>
                             <input class="checkout_modal_total_price_add_cash_style" type="number" id="checkout_modal_total_price_add_cash" name="items_total_payble_amount" placeholder="{{ get_phrase('Add Cash') }}" value="">
                         </div>

                         <div id="amount_check_section" class="gap-1 justify-content-center align-items-center d-none" >
                             <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                 <path
                                     d="M10.4993 1.66602C5.89685 1.66602 2.16602 5.39685 2.16602 9.99935C2.16602 14.6018 5.89685 18.3327 10.4993 18.3327C15.1018 18.3327 18.8327 14.6018 18.8327 9.99935C18.8327 5.39685 15.1018 1.66602 10.4993 1.66602ZM11.1243 13.7493C11.1243 14.0943 10.8443 14.3743 10.4993 14.3743C10.1543 14.3743 9.87435 14.0943 9.87435 13.7493V9.94014C9.87435 9.59514 10.1543 9.31514 10.4993 9.31514C10.8443 9.31514 11.1243 9.59514 11.1243 9.94014V13.7493ZM10.516 7.91602C10.056 7.91602 9.67843 7.54268 9.67843 7.08268C9.67843 6.62268 10.0477 6.24935 10.5077 6.24935H10.516C10.9769 6.24935 11.3494 6.62268 11.3494 7.08268C11.3494 7.54268 10.976 7.91602 10.516 7.91602Z"
                                     fill="#FF4747" />
                             </svg>
                             <p class="checkout_modal_total_price_checking_main_style">{{ get_phrase('Amount must be more than total of ') }} <span id="checkout_modal_total_price_show">{{ currency(0) }}</span></p>

                         </div>
                     </div>
                     <div class="d-flex justify-content-end align-items-center customer-create-btn-main">
                         <button type="button" class="custom-tile-cancel-buttom" data-bs-dismiss="modal">{{ get_phrase('Cancel') }}</button>
                         <button type="submit" class="btn ol-btn-primary" id="ConfirmCheckoutBtn">{{ get_phrase('Confirm Checkout') }}</button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>
