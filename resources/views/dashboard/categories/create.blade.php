@extends('dashboard.layout.layout')

@section('content')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
<div class="container bg-dark w-75 p-5">
    <div class="row justify-content-center">
        <div class="col-md-10 justify-content-center">
            <form class="needs-validation" action="{{route('dashboard.category.store')}}" method="POST">
                @csrf
                <div class="form">
                <div class="form-group ">
                    <label for="validationCustom01" class="mb-1 me-5">الإسم</label>
                    <input class="form-control w-50 me-5" id="validationCustom01" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="validationCustom02" class="mb-1 me-5">القسم الرئيسي</label>
                    <select name="parent_id" id="validationCustom02" class="form-control me-5 w-50">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-0 w-50 me-5">
                    <label for="validationCustom03" class="mb-1">الصورة</label>
                    <input class="form-control dropify" id="validationCustom03" type="file" name="image">
                </div>
                </div>
                <div>
                    <button class="btn btn-primary m-4 me-5" type="submit">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
