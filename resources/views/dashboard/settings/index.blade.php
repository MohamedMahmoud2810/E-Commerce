@extends('dashboard.layout.layout')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="page-header-left">
                            <h3>اعدادات الموقع</h3>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <ol class="breadcrumb pull-right ">
                            <li class="breadcrumb-item">
                                <a href="/"><i class="mdi mdi-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                لوحة التحكم
                            </li>
                            <li class="breadcrumb-item">
                                اعدادات الموقع
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>الاعدادات</h5>
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{route('dashboard.settings.update' , $setting->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @if($errors->any())
                                {!! implode('' , $errors->all('<div>:message</div>')) !!}
                                @endif
                                    <div class="form-group">
                                        <label for="validationcustom05" class="col-form-label pt-0">لوجو الموقع</label>
                                        <input type="file" class="form-control dropify"  id="validationcustom05" name="logo" value="{{$setting->logo}}" data-default-file="{{asset($setting->logo)}}">

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">الصورة المصغرة</label>
                                        <input type="file" class="form-control dropify" id="validationcustom05" name="favicon" value="{{$setting->favicon}}" data-default-file="{{asset($setting->favicon)}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> اسم الموقع</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="name" value="{{$setting->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label"> وصف الموقع</label>
                                        <textarea cols="130" rows="10" name="description">{{$setting->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> البريد الالكتروني</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="email" value="{{$setting->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="phone" value="{{$setting->phone}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">العنوان</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="address" value="{{$setting->address}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رابط الفيس بوك</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="facebook" value="{{$setting->facebook}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رابط تويتر</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="twitter" value="{{$setting->twitter}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رابط انستجرام</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="instagram" value="{{$setting->instagram}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رابط يوتيوب</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="youtube" value="{{$setting->youtube}}">
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">رابط تيكتوك</label>
                                        <input type="text" class="form-control" id="validationcustom05" name="tiktok" value="{{$setting->tiktok}}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
