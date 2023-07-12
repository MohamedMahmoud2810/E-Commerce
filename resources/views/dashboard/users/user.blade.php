@extends('dashboard.layout.layout')


@section ('content')

<div class="container-fluid">
    <div class="cart">

        <div class="cart-header">
            <h3>عرض المستخدمين</h3>
        </div>

        <div class="cart-body p-5" >
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <table class="table table-striped table-bordered user_datatable mb-4 table-dark">
                <thead>
                    <tr>
                        <th  scope="col">ID</th>
                        <th  scope="col">Name</th>
                        <th  scope="col">Email</th>
                        <th  scope="col">Type</th>
                        <th  scope="col" width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @if(!empty($users) && $users->count())
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            <td><a href="{{Route('dashboard.user.edit', $user->id)}}" class="edit btn btn-success btn-sm" ><i class="fa
                                fa-edit"></i>Edit</a>
                                <a href="{{route('dashboard.user.delete' , $user->id)}}" class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="6">There is no data</td>
                            </tr>
                        @endif
                </tbody>
            </table>

                <div class="row">
                    <div class="col-6">
                        {{$users->links()}}
                    </div>
                </div>
        </div>


    </div>
</div>


@endsection


