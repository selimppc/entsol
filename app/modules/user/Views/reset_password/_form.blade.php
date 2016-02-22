@extends('user::layouts.signup')

@section('content')

        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'update-new-password']) !!}


    <div class="signup-text">
        <span>Reset Password</span>
    </div>

    <div class="form-group">
        {!! Form::password('password',['id'=>'reset-password','class' => 'form-control','placeholder'=>'New Password','required','name'=>'password','title'=>'Enter your password at least 3 characters.','minlength'=>'3']) !!}
    </div>


    <div class="form-group">
        {!! Form::password('confirm_password', array('class'=>'form-control input-lg','required','id'=>'password-confirm','name'=>'confirm_password','placeholder'=>'Confirm-password','title'=>'Enter your confirm password that must be match with password.','minlength'=>'3','onkeyup'=>"validation()")) !!}
        <span id='message'></span>
    </div>

    <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
        <label class="checkbox-inline">
            {!! Form::checkbox('remember_me', null,['name'=>'signup_confirm','class'=>'px','id'=>'confirm_id']) !!}
            <span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>
        </label>
    </div>

    <div class="form-actions">
        <input type="submit" value="SUBMIT" class="signup-btn bg-primary">
    </div>
    {!! Form::close() !!}
            <!-- / Form -->
</div>

@stop

@include('user::reset_password._script')