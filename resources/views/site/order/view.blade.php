@extends('site.layout.layout')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View
                        <a href="{{route('order.index')}}" class="btn btn-primary float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shopping Details</h4><hr>
                            <label >First Name</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label >Last Name</label>
                            <div class="border p-2">{{$orders->surname}}</div>
                            <label >Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label >Phone</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label >Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address}}
                                {{$orders->city}}
                                {{$orders->state}}
                                {{$orders->country}}
                            </div>
                            <label >Postal Code</label>
                            <div class="border p-2">{{$orders->potal_code}}</div>
                        </div>

                        <div class="col-md-6">
                            <h4>Order Details</h4><hr>
                            <table class="table table-striped table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Quantity</th>
                                        <th>price</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderDetails as $order)
                                    <tr>
                                        <td>{{$order->products->name}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            <img width="50px" src="{{asset($order->products->image)}}" alt="">
                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <h4>Grand Total : {{$orders->totlal_price}} EGP</h4>
                        </div>
                    </div>


                </div>


        </div>
        </div>
    </div>

</div>

@endsection

