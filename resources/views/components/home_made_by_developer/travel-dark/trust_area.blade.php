{{-- To make a editable image or text need to be add a "builder editable" class and builder identity attribute with a unique value --}}
{{-- "builder identity" and "builder editable" --}}
{{-- builder identity value have to be unique under a single file --}}

 <!-- Trust us Area Start -->
  <section class="tr-trust-area">
     <div class="trust-image wow animate__fadeInRight" data-wow-delay=".1s">
          <img class="builder-editable" builder-identity="TDTS1" src="{{ asset('assets/frontend/travel-dark/images/image 8.png') }}" alt="">
      </div>
     
       <div class="container">
          <div class="row">
              <div class="col-lg-8">
                    <div class="tr-section trust-title-area wow animate__fadeInLeft position-relative" data-wow-delay=".1s">
                         <span class="vector position-absolute builder-editable" builder-identity="TDTS2"><img src="{{ asset('assets/frontend/travel-dark/images/vector5.png') }}" alt="vector"></span>
                        <div class="arrow-line"></div>
                        <span class="d-block builder-editable" builder-identity="TDTS3">{{get_phrase('Why Choose uS?')}}</span>
                        <h2 class="mb-2 builder-editable" builder-identity="TDTS4">{{get_phrase('Why Travelers Trust Us?')}}</h2>
                        <p class="description builder-editable" builder-identity="TDTS5">{{get_phrase('Our gear is built to last, no matter where your journey takes you. Trusted by seasoned travelers and adventure seekers worldwide, every product is designed for durability, comfort, & performance')}}</p>
                       
                       <div class="trusted d-flex gap-2"> 
                         <ul class="tr-kit-motion ">
                            <li>
                                <span><img class="builder-editable" builder-identity="TDTS6" src="{{ asset('assets/frontend/travel-dark/images/key1.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TDTS7">{{get_phrase('Durable Quality')}}</h5>
                                    <p class="builder-editable" builder-identity="TDTS8">{{get_phrase('Built to withstand the rigors of global travel—tested for performance, comfort, & resilience.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img class="builder-editable" builder-identity="TDTS9" src="{{ asset('assets/frontend/travel-dark/images/key4.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                     <h5 class="builder-editable" builder-identity="TDTS10">{{get_phrase('Free Shipping')}}</h5>
                                    <p class="builder-editable" builder-identity="TDTS11">{{get_phrase('Enjoy fast, free shipping on all domestic orders. No minimums, no hidden fees—just great gear delivered to your door.')}}</p>
                                </div>
                            </li>
                        </ul>
                        <ul class="tr-kit-motion ">
                            <li>
                                <span><img class="builder-editable" builder-identity="TDTS12" src="{{ asset('assets/frontend/travel-dark/images/key5.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TDTS13">{{get_phrase('Innovative Design')}}</h5>
                                    <p class="builder-editable" builder-identity="TDTS14">{{get_phrase('From anti-theft backpacks to space-saving cubes, every product is designed to solve real travel problems.')}}</p>
                                </div>
                            </li>
                            <li>
                                <span><img class="builder-editable" builder-identity="TDTS15" src="{{ asset('assets/frontend/travel-dark/images/key6.svg') }}" alt=""></span>
                                <div class="tr-kit-text">
                                    <h5 class="builder-editable" builder-identity="TDTS16">{{get_phrase('Eco-Friendly Options')}}</h5>
                                    <p class="builder-editable" builder-identity="TDTS17">{{get_phrase('Travel lighter with gear made from recycled and sustainable materials. Good for the planet, great for your journey.')}}</p>
                                </div>
                            </li>
                           </ul>
                       </div>
                        <a href="{{route('all_products')}}" class="tr-white-btn-large px-3 mt-5 builder-editable" builder-identity="TDTS18">{{get_phrase('Explore Products')}}</a>
                    </div>
              </div>
              <div class="col-lg-4"></div>
          </div>
       </div> 
  </section>
 <!-- Trust us Area End  -->