@extends('dashboard.layout.layout')


@section ('content')

    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>المنتجات</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline search-form search-box">

                            </form>
                            <a href="{{route('dashboard.product.create')}}" class="btn btn-primary mt-md-0 mt-2">
                                اضافة منتج جديد
                            </a>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Button trigger modal -->
                            <div class="card-body">
                                <div class="table-responsive table-desi text-center">
                                    <table class="table table-striped all-package table-category" id="editableTable">
                                        <thead >
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discount Price</th>
                                            <th>Category</th>
                                            <th>Colors</th>
                                            <th>sizes</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (isset($message))
                                            <p>{{$message}}</p>
                                        @else
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="text-light">{{$product->id}}</td>
                                                <td class="text-light">{{$product->name}}</td>
                                                <td class="text-light">@if ($product->image)
                                                        <img width="200px" src="{{asset($product->image)}}" alt="{{ $product->image}}">
                                                    @else
                                                        No Image Available
                                                    @endif</td>
                                                <td class="text-light">{{$product->description}}</td>
                                                <td class="text-light">{{$product->price}}</td>
                                                <td class="text-light">{{$product->discount_price}}</td>
                                                <td class="text-light">{{$product->category_id}}
                                                <td class="text-light">{{$product->color}}</td>
                                                <td class="text-light">{{$product->size}}</td>
                                                <td class="text-light"><a href="{{Route('dashboard.product.edit', $product->id)}}" class="edit btn btn-success btn-sm" ><i class="fa
                                                fa-edit"></i>Edit</a>

                                                    <form action="{{ route('dashboard.product.delete', $product->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="delete btn btn-danger btn-sm">
                                                            <i class="fa fa-trash"></i>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                        <div class="col mt-3">
                                            <div class="col-6">
                                                {{$products->links()}}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection



