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
            <form class="needs-validation" action="{{route('dashboard.category.update' , $category->id )}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form">

                <div class="form-group w-50">
                    <label for="validationCustom01" class="mb-1 me-5">الإسم</label>
                    <input class="form-control me-5" id="validationCustom01" type="text" name="name" value="{{$category->name}}">
                </div>

                @if($category->chiled_count <1)

                <div class="form-group w-50">
                    <label for="validationCustom02" class="mb-1 me-5">القسم الرئيسي</label>
                    <select name="parent_id" id="validationCustom02" class="form-control me-5 ">
                        <option @if ($category->parent_id == null) selected @endif>قسم رئيسي</option>
                        @foreach ($mainCategories as $item)
                            <option value="{{$category->id}}" @if ($item->id == $category->parent_id)
                                selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group mb-0 w-50 me-5">
                    <label for="validationCustom03" class="mb-1">الصورة</label>
                    <input class="form-control dropify " id="validationCustom03" type="file" name="image" data-default-file="{{asset($category->image)}}">
                </div>
                </div>
                <div>
                    <button class="btn btn-primary me-5 mt-3" type="submit">حفظ</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection
