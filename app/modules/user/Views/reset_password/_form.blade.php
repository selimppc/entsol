@extends('admin::layouts.master')

@section('content')

{!! Form::open(['route' => 'update-new-password']) !!}

{!! Form::hidden('user_id',$user_id) !!}
    <div class="panel-heading">
        <h4 class="text-center">Reset Password</h4>
    </div>
    <div class="panel-body">
        <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row col-lg-8 field-margin">
                {!! Form::label('password', 'New Password') !!}
                {!! Form::password('password',['id'=>'reset-password','class' => 'form-control','placeholder'=>'Enter New Password','required','name'=>'password','title'=>'Enter your password at least 3 characters.','minlength'=>'3']) !!}
            </div>
        </div>
        <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row col-lg-8 field-margin">
                {!! Form::label('confirm_password', 'Confirm Password') !!}
                {!! Form::password('confirm_password', array('class'=>'form-control input-lg','required','id'=>'password-confirm','name'=>'confirm_password','placeholder'=>'Confirm-password','title'=>'Enter your confirm password that must be match with password.','minlength'=>'3','onkeyup'=>"validation()")) !!}
                <span id='message'></span>
            </div>
        </div>
    </div>
    <div class="panel-footer text-right">
        <button class="btn btn-primary">Submit</button>
    </div>

{!! Form::close() !!}

@stop

@include('user::reset_password._script')
