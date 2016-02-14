@extends('user::layouts.signup')

@section('content')
        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'user-save-new-password','id' => 'jq-validation-form']) !!}

    <div class="signup-text">
        <span>Reset Password</span>
    </div>
    {!! Form::hidden('id', $id, array('class'=>'form-control')) !!}
    <div class="form-group">
        {!! Form::password('password',  array('class'=>'form-control input-lg','required','name'=>'password','placeholder'=>'Password')) !!}
    </div>

    <div class="form-group">
        {!! Form::password('confirm_password', array('class'=>'form-control input-lg','required','id'=>'confirm_password','name'=>'confirm_password','placeholder'=>'Confirm-password')) !!}
    </div>

    <div class="form-actions">
        <input type="submit" value="SUBMIT" class="signup-btn bg-primary">
    </div>
    {!! Form::close() !!}
            <!-- / Form -->
</div>

@stop