@extends('site.layout.layout')

@section('content')

    <!-- product section -->
<section class="product_section ">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row" id="products">
            @foreach($categories->product as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('product.show' , $item->id)}}" class="option1">
                                    {{$item->category->name}}
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{asset($item->image)}}" alt="Image">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{$item->name}}
                            </h5>
                            <h6>
                                {{$item->price}} EGP
                            </h6>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>
    </div>

    @include('site.layout.footer')
</section>
<!-- end product section -->


@endsection
