@extends('site.layout.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div>
                    @section('product-image')
                    <div class="m-3">
                        <div class="carousel-item active">

                            @if (!empty($product))
                                @foreach($product->images as $image)
                                    <img class="d-block" src="{{ asset($image->image) }}" alt="Slide">
                                @endforeach
                            @else
                                <p>No products here</p>
                            @endif

                        </div>
                    </div>
                    @endsection
                </div>
            </div>
            @section('product-details')
            <div class="col-lg-7 m-5">
                <h1 class="text-center w-25 text-light bg-success">New</h1>
                <h2>{{ $product->name }}</h2>
                <p>Product Code: {{ $product->id }}</p>
                <h6>⭐⭐⭐⭐⭐</h6>
                <p><b>Quantity In Stock : </b> {{$product->quantity}}</p>
                <p><b>Availability : </b>
                        @if($product->quantity>0)
                          In Stock
                        @else
                          Sold Out
                @endif</p>
                <p><b>Condition : </b>New</p>
                <p><b>Brand :  </b> XYZ Company </p>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Quantity</label>
                    <div class="col-sm-9  ">
                        <input class="form-control border border-success" type="text" value="1">
                    </div>
                </div>
                <h3 class="price" style="color: #FE980F ; font-size: 26px ; padding-top: 20px">{{$product->price}} EGP</h3>
                <button type="button" class="btn btn-primary cart">Add To Cart</button>

            </div>
            @endsection


        </div>
    </div>
@endsection
