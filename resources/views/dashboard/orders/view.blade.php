@extends('dashboard.layout.layout')


@section ('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View
                        <a href="{{route('dashboard.order.index')}}" class="btn btn-primary float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>تفاصيل التسوق</h4><hr>
                            <label >الاسم الاول</label>
                            <div class="border p-2">{{$orders->name}}</div>
                            <label >الاسم الاخير</label>
                            <div class="border p-2">{{$orders->surname}}</div>
                            <label >البريد الالكتروني</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label >التليفون</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label >عنوان الشحن</label>
                            <div class="border p-2">
                                {{$orders->address}}
                                {{$orders->city}}
                                {{$orders->state}}
                                {{$orders->country}}
                            </div>
                            <label >كود البريد</label>
                            <div class="border p-2">{{$orders->potal_code}}</div>
                        </div>

                        <div class="col-md-6">
                            <h4>تفاصيل الطلب</h4><hr>
                            <table class="table table-striped table-bordered mb-4">
                                <thead>
                                    <tr>
                                        <th>رقم المنتج</th>
                                        <th>الكمية</th>
                                        <th>سعر القطعة</th>
                                        <th>الصورة</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderDetails as $order)
                                    <tr class="text-center">
                                        <td class="text-white">{{$order->products->id}}</td>
                                        <td class="text-white">{{$order->quantity}}</td>
                                        <td class="text-white">{{$order->price}}</td>
                                        <td class="text-white">
                                            <img  src="{{asset($order->products->image)}}" alt="">
                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <h4>القيمة الكلية المستحقة : {{$orders->totlal_price}} جنيه</h4>
                            <div class="mt-5 p-2">
                                <label for="">حالة المنتج</label>
                                <form action="{{route('dashboard.order.update' , $orders->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select w-50" name="status">
                                        <option {{$orders->status == '0' ? 'selected' : ''}} value="0">Pending</option>
                                        <option {{$orders->status == '1' ? 'selected' : ''}} value="1">Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-3">تحديث حالة المنتج</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>


        </div>
        </div>
    </div>

</div>

@endsection
