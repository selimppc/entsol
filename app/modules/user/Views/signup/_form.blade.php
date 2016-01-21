@extends('user::layouts.signup')

@section('content')

        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'signup','id'=>'signup-form_id']) !!}

        <div class="signup-text">
            <span>Create an account</span>
        </div>

    <div class="form-group">
        {!! Form::text('username', null, ['id'=>'username_id','name'=>'username', 'class' => 'form-control input-lg','required','placeholder'=>'Username']) !!}
    </div>

        <div class="form-group">
            {!! Form::email('email', null, ['id'=>'email_id','name'=>'email', 'class' => 'form-control input-lg','required','placeholder'=>'E-mail']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', null, ['id'=>'password_id','name'=>'password', 'class' => 'form-control input-lg','required','placeholder'=>'Password']) !!}
        </div>

        <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                {!! Form::checkbox('remember_me', null,['name'=>'signup_confirm','class'=>'px','id'=>'confirm_id']) !!}
                <span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>
            </label>
        </div>

        <div class="form-actions">
            <input type="submit" value="SIGN UP" class="signup-btn bg-primary">
        </div>
    {!! Form::close() !!}
    <!-- / Form -->
</div>

@stop