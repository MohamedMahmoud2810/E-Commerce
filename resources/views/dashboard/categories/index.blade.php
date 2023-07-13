@extends('dashboard.layout.layout')


@section ('content')

<div class="page-body">
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>اقسام المنتجات</h3>
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
                <a href="{{route('dashboard.category.create')}}" class="btn btn-primary mt-md-0 mt-2">
                    اضافة قسم جديد
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mainCategories as $category)
                                        <tr>
                                            <td class="text-light">{{$category->id}}</td>
                                            <td class="text-light">{{$category->name}}</td>
                                            <td class="text-light">@if ($category->image)
                                                                        <img width="200px" src="{{asset($category->image)}}" alt="{{ $category->image}}">
                                                                    @else
                                                                        No Image Available
                                                                    @endif</td>
                                            <td class="text-light"><a href="{{Route('dashboard.category.edit', $category->id)}}" class="edit btn btn-success btn-sm" ><i class="fa
                                                fa-edit"></i>Edit</a>
                                                <a href="{{route('dashboard.category.delete' , $category->id)}}" class="delete btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="col mt-3">
                                <div class="col-6">
                                    {{$mainCategories->links()}}
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



