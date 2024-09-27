@extends('dashboard.layout.layout')


@section ('content')

    <div class="container">
        <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">New Orders</h4>
                </div>
                <div class="card-body p-5">
                    <table class="table table-striped table-bordered mb-4 table-dark">
                        <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th>السعر الكلي</th>
                                <th>حالة الطلب</th>
                                <th>طريقة الدفع</th>
                                @foreach ($orders as $order)
                                    @if ($order->payment_method === 'card')
                                        <th>رقم المعاملة</th>
                                    @endif
                                @endforeach
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Postal Code</th>
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
                                @if ($order->payment_method === 'card')
                                    <td>{{$order->payment_id}}</td>
                                @endif
                                <td>{{$order->address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->surname}}</td>
                                <td>{{$order->potal_code}}</td>
                                <td>
                                    <a href="{{route('dashboard.order.show' , $order->id)}}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            {{$orders->links()}}
                        </div>
                    </div>
                </div>


        </div>
    </div>

@endsection
