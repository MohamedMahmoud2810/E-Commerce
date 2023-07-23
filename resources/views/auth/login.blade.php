@extends('auth.layouts.app')

@section('content')
    <div class=" bg-light">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class=" d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5 ">
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" class="form-control p_input" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" class="form-control p_input" name="password">
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check  ">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                                </div>

                                <p class="sign-up">Don't have an Account?<a href="#"> <a href="{{ route('register') }}">Sign Up</a></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
