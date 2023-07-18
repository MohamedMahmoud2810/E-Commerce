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
                <form class="needs-validation" action="{{route('dashboard.product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form">
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">الإسم</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="text" name="name">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">الوصف</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="text" name="description">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">السعر</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="number" name="price">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">السعر بعد الخصم</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="number" name="discount_price">
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02" class="mb-1 me-5">القسم الرئيسي</label>
                            <select name="category_id" id="validationCustom02" class="form-control me-5 w-75 text-light">
                                <option value="" >اختر القسم</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-0 w-75 me-5">
                            <label for="validationCustom03" class="mb-1"> الصورة الرئيسية</label>
                            <input class="form-control dropify" id="validationCustom03" type="file" name="image">
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الالوان المتاحة للمنتج</label>
                            <select class="form-control colors text-light" multiple="multiple" name="colors[]">
                            </select>
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الاحجام المتوفرة </label>
                            <select class="form-control colors text-light" multiple="multiple" name="sizes[]">
                            </select>
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الكمية المتاحة </label>
                            <input class="form-control quantity text-light" type="number " name="quantity">
                        </div>

                        <div class="form-group mb-0 w-75 me-5">
                            <label for="validationCustom03" class="mb-1"> صور المنتج</label>
                            <input class="form-control dropify" id="validationCustom03" type="file" name="images[]" multiple="multiple">
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

@push('script')
    <script>
        $(".colors").select2({
            tags :true
        });
    </script>
@endpush

