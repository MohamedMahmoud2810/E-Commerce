@extends('site.layout.layout')
@section('content')
    @if(session('message'))
        {{session('message')}}
    @endif
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a class="text-dark" href="{{route('index')}}">
                    Home
                </a> /
                <a class="text-dark" href="{{route('cart.show')}}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-3">
        <div class="card shadow product_data">
            @if ($cartItems->count()>0)


            @foreach($cartItems as $item)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img class="w-50" src="{{asset($item['associatedModel']->image)}}" alt="Image here">
                    </div>
                    <div class="col-md-3">
                        <h3>{{$item->name}}</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Quantity</label>
                            <div class="col-sm-7">
                                <!-- Assuming you have a form for the cart items -->
                                @if($item->associatedModel->quantity > 0)
                                <form action="{{ route('cartItem.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" min="1" placeholder="Enter quantity" value="{{ $item['quantity'] }}">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                                @else
                                    <label class="bg-danger">Out Of Stock</label>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h2 data-original-price="{{ $item['price'] }}">{{ $item['price'] }} EGP</h2>
                        <span id="total-price">{{ $item['price'] * $item['quantity'] }}</span>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('cartItem.delete' , $item->id)}}" class="btn btn-danger delete-cart-item mb-2"> <i class="mdi mdi-delete"></i>Remove</a>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <h5>Total Price : {{$total}}
                    <a href="{{route('checkout.index')}}" class="btn btn-outline-success float-right">Proceed to checkout</a>
                </h5>
            </div>
    @endforeach
    @else
            <div class="cart-body text-center">
                <h2>Your  <i class="mdi mdi-cart"></i>Cart Is Empty</h2>
                <a href="{{route('index')}}" class="btn btn-primary float-right m-3">Continue Shopping</a>
            </div>
    @endif

    </div>
</div>

@endsection

<script>
    // When the quantity input changes, update the total price
    $('input[name="quantity"]').on('input', function() {
        var originalPrice = parseFloat($(this).closest('.col-md-2').find('h2').data('original-price'));
        var quantity = parseFloat($(this).val());
        var totalPrice = originalPrice * quantity;

        // Update the displayed total price
        $('#total-price').text(totalPrice.toFixed(2) + ' EGP');
    });

</script>


