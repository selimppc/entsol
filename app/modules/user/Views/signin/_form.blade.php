@extends('user::layouts.login')

@section('content')

<div id="page-signup-bg">
    <!-- Background overlay -->
    <div class="overlay"></div>
    <!-- Replace this with your bg image -->
    <img src="assets/user/img/signin-bg-1.jpg" alt="">
</div>
<!-- Container -->
<div class="signin-container">

    <!-- Left side -->
    <div class="signin-info">
        <a href="#" class="logo">
            ETSB<span style="font-weight:100;"></span>
        </a> <!-- / .logo -->
        <div class="slogan">
            Simple. Flexible. Powerful.
        </div> <!-- / .slogan -->
        <ul>
            <li><i class="fa fa-sitemap signin-icon"></i> Flexible modular structure</li>
            <li><i class="fa fa-file-text-o signin-icon"></i> Well Commented Source</li>
            <li><i class="fa fa-outdent signin-icon"></i> RTL direction support</li>
            <li><i class="fa fa-heart signin-icon"></i> Crafted with love</li>
        </ul> <!-- / Info list -->
    </div>

    <div class="signin-form">
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

        {{-- Token Mis mathched exception  --}}
            @if ($errors->has('token_error'))
            {{$errors}}
                <div class="alert alert-warning"> {{ $errors->first('token_error') }} </div>
            @endif

        {!! Form::open(['route' => 'post-user-login','id'=>'login-data-validation']) !!}
            <div class="signin-text">
                <span>Sign In to your account</span>
            </div>

            <div class="form-group">
                {!! Form::text('email', Input::old('email'), ['class' => 'form-control input-lg','required','placeholder'=>'Username or email','autofocus','title'=>'Enter Email Address']) !!}
            </div>

            <div class="form-group">
                {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password', 'required'=>'required','title'=>'Enter Password']) !!}
            </div>
            <div class="form-actions">
                <input type="submit" value="SIGN IN" class="signin-btn bg-primary">
                <a href="{{ route('forget-password-view') }}" class="forgot-password" id="forgot-password-link">Forgot your password?</a>
            </div> <!-- / .form-actions -->
        {!! Form::close() !!}
        <!-- / Form -->

        <!-- "Sign In with" block -->
        {{--<div class="signin-with">
            <!-- Facebook -->
            <a href="#" class="signin-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">Sign In with <span>Facebook</span></a>
        </div>--}}
        <!-- / "Sign In with" block -->

        <!-- Password reset form -->
        <div class="password-reset-form" id="password-reset-form">
            <div class="header">
                <div class="signin-text">
                    <span>Password reset</span>
                    <div class="close">&times;</div>
                </div> <!-- / .signin-text -->
            </div> <!-- / .header -->

            <!-- Form -->
            {{--{!! Form::open(['route' => 'user-signup','id'=>'signin-form_id']) !!}--}}
                <div class="form-group w-icon">
                    <input type="text" name="password_reset_email" id="p_email_id" class="form-control input-lg" placeholder="Enter your email">
                    <span class="fa fa-envelope signin-form-icon"></span>
                </div> <!-- / Email -->

                <div class="form-actions">
                    <input type="submit" value="SEND PASSWORD RESET LINK" class="signin-btn bg-primary">
                </div> <!-- / .form-actions -->
                {{--{!! Form::close() !!}--}}
            <!-- / Form -->
        </div>
        <!-- / Password reset form -->
    </div>
    <!-- Right side -->
</div>
<!-- / Container -->

<div class="not-a-member">
    Not a member? <a href="{{ route('create-sign-up') }}">Sign up now</a>
</div>
@stop