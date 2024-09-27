@extends('site.layout.layout')
@section('content')
    @if(session('message'))
        {{session('message')}}
    @endif

    <form action="{{route('placeOrder')}}" method="POST">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic details</h6>

                                <div class="row">
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="name">Name : </label>
                                        <input type="text" class="form-control" id="name" name="name"  placeholder="name" required value="{{$userAddress ? $userAddress->name : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="surname">Surname:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required value="{{$userAddress ? $userAddress->surname : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required value="{{$userAddress ? $userAddress->address : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required value="{{$userAddress ? $userAddress->city : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required value="{{$userAddress ? $userAddress->state : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="country">Country:</label>
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" required value="{{$userAddress ? $userAddress->country : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="Postal Code">Postal Code:</label>
                                        <input type="text" class="form-control" id="Postal Code" name="postal_code" placeholder="Postal Code" required value="{{$userAddress ? $userAddress->postal_code : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="Phone" name="phone" placeholder="Phone" required value="{{$userAddress ? $userAddress->phone : ''}}">
                                    </div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{$userAddress ? $userAddress->email : ''}}">
                                    </div>

                                </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details </h6>
                            <hr>

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->price}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>

                                <h5>Total Price : {{$total}} EGP
                                    @if($total>0)
                                    <button type="submit" class="btn btn-primary float-right"> Place The Order</button>
                                    @endif
                                </h5>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
