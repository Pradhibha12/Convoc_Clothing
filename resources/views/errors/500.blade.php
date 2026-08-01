@extends('layouts.frontend')
@push('title', '505 Not Found')
@push('meta')
@endpush
@push('css')
@endpush
<style>
    .errorBox img{
        height: 250px;
        width: 250px;
     }
     .errorContent{
        margin-bottom: 50px;
     }
     .errorContent h1{
        font-size: 36px;
        font-weight: 500;
        line-height: 36px;
      }  
     .errorContent a{
        margin-top: 32px;
      } 
     .mb-32{
        margin-bottom: 32px;
     }

</style>
@section('content')

    <!-- Start About Us -->
    <section class="pb-120 pt-30 description-style mt-5 mb-5">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-12 ms-auto">
                    <div class="errorBox">
                        <img src="{{asset('assets/500-image.png')}}" class="m-auto" alt="">
                         <div class="errorContent text-center">
                            <h1 class="g-title fs-28px mb-2  capitalize">{{ get_phrase('Internal Server Error') }}</h1>
                            <p class="g-text mb-32">{{ get_phrase('The page you requested could not be found') }}.</p>
                            <p class=" g-text"> {{ get_phrase('Please make sure the URL is entered correctly.') }} </p>
                            <p class=" g-text"> {{ get_phrase('If you are still puzzled, click on the home link below.') }} </p>
                            <a class="btn fsh-btn-dark " href="{{route('home')}}">{{get_phrase('Back to home')}}</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->
@endsection

@push('js')
@endpush


