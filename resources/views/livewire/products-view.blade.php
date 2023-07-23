<!-- product section -->
<section class="product_section ">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row" id="products">
            @foreach($products as $item)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{route('product.show' , $item->id)}}" class="option1">
                                    {{$item->category->name}}
                                </a>
                                @if($cart && $cart->where('id', $item->id)->count())
                                    In Cart
                                @else
                                    <form wire:submit.prevent="addToCart({{$item->id}})" action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-center m-3">
                                            <button type="submit" class="option2 pe-5 btn btn-dark">Add To Cart</button>
                                        </div>



                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{$item->image}}" alt="">
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
