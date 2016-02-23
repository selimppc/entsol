@extends('user::layouts.signup')

@section('content')

        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'forget-password']) !!}

        <div class="signup-text">
            <span>Enter Your Email</span>
        </div>

        <div class="form-group">
            {!! Form::email('email', null, ['class' => 'form-control input-lg','required','placeholder'=>'E-mail','title'=>'Enter Email Address']) !!}
        </div>

        <div class="form-actions">
            <input type="submit" value="Reset Password" class="signup-btn bg-primary">
        </div>
    {!! Form::close() !!}
    <!-- / Form -->
</div>

@stop
