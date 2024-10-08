@extends('site.layout.layout')
@section('content')
    @if(session('message'))
        {{session('message')}}
    @endif
    <!-- slider section -->
    <section class="slider_section ">
        <div class="slider_bg_box">
            <img src="{{asset('site')}}/images/slider-bg.jpg" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                    <span>
                                    Sale 20% Off
                                    </span>
                                        <br>
                                        On Everything
                                    </h1>
                                    <p>
                                        Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                    </p>
                                    <div class="btn-box">
                                        <a href="#products" class="btn1">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        
        </div>
    </section>
    <!-- end slider section -->

    @include('site.layout.why')

    @include('site.category.index')

    @livewire('products-view')
@endsection
