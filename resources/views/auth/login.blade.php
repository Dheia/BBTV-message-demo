@extends('layouts.vertical-menu.master2')

@section('css')

<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">

@endsection

@section('content')

        <!-- BACKGROUND-IMAGE -->

        <div class="login-img">



            <!-- GLOABAL LOADER -->

            <div id="global-loader">

                <img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">

            </div>

            <!-- /GLOABAL LOADER -->



            <!-- PAGE -->

            <div class="page">

                <div class="">

                    <!-- CONTAINER OPEN -->

                    <div class="col col-login mx-auto">

                        <div class="text-center">

                            <img src="{{URL::asset('assets/images/brand/logo.png')}}" class="header-brand-img" alt="">

                        </div>

                    </div>

                    <div class="container-login100">

                        <div class="wrap-login100 p-6">

                            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">

                                 @csrf

                                <span class="login100-form-title">

                                    Login

                                </span>

                                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">

                                    <input class="input100" type="text" name="email" placeholder="Email">

                                    <span class="focus-input100"></span>

                                    <span class="symbol-input100">

                                        <i class="zmdi zmdi-email" aria-hidden="true"></i>

                                    </span>

                                </div>

                                <div class="wrap-input100 validate-input" data-validate = "Password is required">

                                    <input class="input100" type="password" name="password" placeholder="Password">
                                   
                                    <span class="focus-input100"></span>

                                    <span class="symbol-input100">

                                        <i class="zmdi zmdi-lock" aria-hidden="true"></i>

                                    </span>

                                </div>

                                <div class="text-right pt-1">

                                    <p class="mb-0"><a href="{{ route('password.request') }}" class="text-primary ml-1">Forgot Password?</a></p>

                                </div>
                                @if (\Session::has('error'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{!! \Session::get('error') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="container-login100-form-btn">

                                    <button class="login100-form-btn btn-primary">Login</button>

                                </div>

                               {{-- <div class="text-center pt-3">

                                    <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>

                                </div>--}}

                                {{--<div class=" flex-c-m text-center mt-3">

                                    <p>Or</p>

                                    <div class="social-icons">

                                        <ul>

                                            <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>

                                            <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>

                                        </ul>

                                    </div>

                                </div>--}}

                            </form>

                        </div>

                    </div>

                    <!-- CONTAINER CLOSED -->

                </div>

            </div>

            <!-- End PAGE -->



        </div>

        <!-- BACKGROUND-IMAGE CLOSED -->

@endsection

@section('js')

@endsection

