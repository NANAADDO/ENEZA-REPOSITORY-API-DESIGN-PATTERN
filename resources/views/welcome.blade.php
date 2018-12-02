@extends('layouts.app')


@section('content')

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-inner">
                <div class="col-md-10">

                    <div class="mb-5 element-animate">
                        <div class="block-17">
                            <h2 class="heading text-center mb-4">DEVELOPER API REGISTRATION</h2>

                            <p class="text-center"><a href="{{url('/register')}}" class="btn py-3 px-5">Register Now</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection