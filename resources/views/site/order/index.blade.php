@extends('site.layout.layout')
@section('content')

<div class="container py-5">
    <div class="card">
            <div class="card-header">
                <h4>My Orders</h4>
            </div>
            <div class="card-body p-5">
                <table class="table table-striped table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>Order_ID</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Payment Method</th>
                            <th>payment ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->totlal_price}}</td>
                            <td>{{$order->status == '0' ? 'Pending' : 'completed'}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->payment_id}}</td>
                            <td>
                                <a href="{{route('order.show', $order->id)}}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


    </div>
</div>

@endsection
