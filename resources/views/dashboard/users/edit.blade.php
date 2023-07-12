@extends('dashboard.layout.layout')

@section('content')
    <section  style="background-color: #303235;">
        <div class="container">
            <form action="{{route('dashboard.user.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                    <h1 class="text-white mb-4">إضافة مستخدم جديد</h1>

                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">

                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                            <h6 class="mb-0">رقم المستخدم</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                                <input type="number" class="form-control form-control-lg text-dark" name="id" disabled placeholder="Full Name" value="{{$users->id}}" />

                            </div>
                        </div>
                        <hr class="mx-n3">

                        <div class="row align-items-center pt-4 pb-3">
                            <div class="col-md-3 ps-5">

                            <h6 class="mb-0">الاسم كامل</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                            <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" value="{{$users->name}}" />

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                            <h6 class="mb-0">البريد الالكتروني</h6>

                            </div>
                            <div class="col-md-9 pe-5">

                            <input type="email" name="email" class="form-control form-control-lg" placeholder="user@example.com" value="{{$users->email}}" />

                            </div>
                        </div>

                        <hr class="mx-n3">

                        <div class="row align-items-center py-3">
                            <div class="col-md-3 ps-5">

                            <h6 class="mb-0">نوع المستخدم</h6>

                            </div>
                            <div class="col-md-9 pe-5">
                                    <select name="type" class="form-control form-control-lg text-white">
                                        <option value="user" {{$users->type == 'user' ? 'selected' : ''}}>user</option>
                                        <option value="admin" {{$users->type == 'admin' ? 'selected' : ''}}>admin</option>
                                    </select>

                            </div>
                        </div>

                        <hr class="mx-n3">


                        <div class="px-5 py-4">
                            <button type="submit" class="btn btn-primary btn-lg">تعديل المستخدم</button>
                        </div>

                        </div>
                    </div>

                    </div>

                    </div>

                    </form>
            </div>
    </section>
@endsection
