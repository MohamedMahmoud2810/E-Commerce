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
                <form class="needs-validation" action="{{route('dashboard.product.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form">
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">الإسم</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="text" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">الوصف</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="text" name="description" value="{{$product->description}}">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">السعر</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="number" name="price" value="{{$product->price}}">
                        </div>
                        <div class="form-group ">
                            <label for="validationCustom01" class="mb-1 me-5">السعر بعد الخصم</label>
                            <input class="form-control w-75 me-5" id="validationCustom01" type="number" name="discount_price" value="{{$product->discount_price}}">
                        </div>
                        <div class="form-group">
                            <label for="validationCustom02" class="mb-1 me-5">القسم الرئيسي</label>
                            <select name="category_id" id="validationCustom02" class="form-control me-5 w-75 text-light" >
                                <option value="" >اختر القسم</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @if ($category->id == $product->category_id) selected @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-0 w-75 me-5">
                            <label for="validationCustom03" class="mb-1">الصورة</label>
                            <input class="form-control dropify" id="validationCustom03" type="file" name="image" data-default-file="{{asset($product->image)}}">
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الالوان المتاحة للمنتج</label>
                            <select class="form-control colors text-light" multiple="multiple" name="colors[]">
                                @foreach ($selectedColors as $color)
                                    <option value="{{ $color }}" {{ in_array($color, $selectedColors) ? 'selected' : '' }}>
                                        {{ $color }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الاحجام المتوفرة </label>
                            <select class="form-control sizes text-light" multiple="multiple" name="sizes[]">
                                @foreach ($selectedSizes as $size)
                                    <option value="{{ $size }}" {{ in_array($size, $selectedSizes) ? 'selected' : '' }}>
                                        {{ $size }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3 w-75 me-5">
                            <label for="validationCustom02" class="mb-1 col-form-label">الكمية المتاحة </label>
                            <input class="form-control quantity text-light" type="number" name="quantity" value="{{$product->quantity}}">
                        </div>

                        <div class="form-group mb-0 w-75 me-5">
                            <label for="validationCustom03" class="mb-1"> صور المنتج</label>
                                <div class="input-group">
                                    <input class="form-control dropify" id="validationCustom03" type="file" name="images[]" multiple="multiple" value="{{asset($product->images)}}">
                                </div>
                        </div>

                    </div>
                    <div>
                        <button class="btn btn-primary m-4 me-5" type="submit">Save</button>
                    </div>

                </form>


                    <div class="mt-4">
                        <h4>الصور المرفقة:</h4>
                        <div class="row">
                            @foreach ($uploadedImages as $uploadedImage)
                                <div class="col-md-3">
                                    <img src="{{ asset($uploadedImage->image) }}" alt="" class="img-fluid">
                                    <form action="{{ route('dashboard.deleteImage', $uploadedImage->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>





            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(".colors").select2({
            tags :true
        });
        $(".sizes").select2({
            tags :true
        });
    </script>

@endpush
