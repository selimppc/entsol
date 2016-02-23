<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign Up - LanderApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

    <!---generate.min.css  refers to landerapp.min.css ----->
    <link href="{{ URL::asset('assets/admin/css/generate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/rtl.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/pages.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/widgets.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/themes.min.css') }}" rel="stylesheet" type="text/css" >

    <style>
        #signup-demo {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 10000;
            background: rgba(0,0,0,.6);
            padding: 6px;
            border-radius: 3px;
        }
        #signup-demo img { cursor: pointer; height: 40px; }
        #signup-demo img:hover { opacity: .5; }
        #signup-demo div {
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding-bottom: 6px;
        }
    </style>
    <!-- / $DEMO -->

</head>

<body class="theme-default page-signup">

    <script>
        var init = [];
    </script>

    <div id="page-signup-bg">
        <!-- Background overlay -->
        <div class="overlay"></div>
        <!-- Replace this with your bg image -->
        <img src=" {{URL::to('assets/user/img/signin-bg-1.jpg')}}" alt="">

    </div>
<!-- / Page background -->

<!-- Container -->
    <div class="signup-container">
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{--set some message after action--}}
        @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get("message")}}</div>

        @elseif(Session::has('error'))
            <div class="alert alert-warning">{{Session::get("error")}}</div>

        @elseif(Session::has('info'))
            <div class="alert alert-info">{{Session::get("info")}}</div>

        @elseif(Session::has('danger'))
            <div class="alert alert-danger">{{Session::get("danger")}}</div>

            @endif
        <!-- Header -->
        <div class="signup-header">
            <a href="#" class="logo">
                ETSB<span style="font-weight:100;"></span>
            </a> <!-- / .logo -->
        </div>
        <!-- / Header -->
        @yield('content')
    </div>
    <div class="have-account">
        @if(!isset($user_id))
            Already have an account? <a href="{{Route('get-user-login')}}">Sign In</a>
        @endif
    </div>
<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="assets/admin/js/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>


@include('user::layouts._script')

</body>
</html>