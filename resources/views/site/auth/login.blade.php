<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hotel - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img style="width: 100%; height: 100%" src="{{asset('assets/hotel/images/vip1.jpg')}}">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    @include('admin.includes.alerts.errors')
                                    @include('admin.includes.alerts.success')
                                </div>
                                <form class="user" action="{{route('site.postLogin')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" @if(Cookie::has('userEmail')) value="{{Cookie::get('userEmail')}}"@endif class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="E-mail" name="email">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" @if(Cookie::has('userPassword')) value="{{Cookie::get('userPassword')}}"@endif class="form-control form-control-user"
                                               id="exampleInputPassword" placeholder="Password" name="password">
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" @if(Cookie::has('userEmail')) checked @endif name="rememberme" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{route('site.forgetPassword')}}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{route('site.register')}}">Create Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
