@extends('user::layouts.signup')

@section('content')
        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'signup','id'=>'abc-jq-validation-form']) !!}

        <div class="signup-text">
            <span>Create an account</span>
        </div>

    <div class="form-group">
        {!! Form::text('username', Input::old('username'), ['name'=>'username', 'class' => 'form-control input-lg','required','placeholder'=>'Username']) !!}
    </div>

        <div class="form-group">
            {!! Form::email('email', Input::old('email'), ['id'=>'email','class' => 'form-control input-lg','required','placeholder'=>'E-mail']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-lg','required','placeholder'=>'Password']) !!}
        </div>

        <div class="form-actions">
            <input type="submit" value="SIGN UP" class="signup-btn bg-primary">
        </div>
    {!! Form::close() !!}
    <!-- / Form -->
</div>

{{--@include('user::signup._script')--}}
@stop


