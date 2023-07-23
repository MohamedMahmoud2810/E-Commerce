<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="{{ asset('site/images/favicon.png') }}"  type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('site/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('site/css/responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('admin')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    @livewireStyles

</head>

<body>
<div class="hero_area">
    <!-- header section starts -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html"><img width="250" src="{{ asset('site/images/logo.png') }}" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{asset('site')}}/index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('site')}}/product.html">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('site')}}/blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('site')}}/contact.html">Contact</a>
                        </li>
                        <li class="nav-item">
                                @livewire('cart-counter')
                        </li>
                        <form class="form-inline">
                            <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>

                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0  sm:block">
                                @auth
                                    <ul class="navbar-nav">
                                        <li class="nav-item d-flex align-items-center">
                                            <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                                            <a href="{{ route('logout') }}" class="btn btn-primary ml-2">Logout</a>
                                        </li>
                                    </ul>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm btn btn-primary text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 btn btn-success text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div>
                    <div>
                        <div class="carousel-item active">
                            @yield('product-image')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                @yield('product-details')
            </div>
        </div>
    </div>
    <!-- end slider section -->
    <!-- rest of the elements -->
    @yield('content')
    <!-- end rest of the elements -->
</div>
@livewireScripts
</body>
</html>
