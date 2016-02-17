@extends('user::layouts.signup')

@section('content')

        <!-- Form -->
<div class="signup-form">


    <div class="signup-text">
        <span>Enter Your Email</span>
    </div>

    <div class="form-group">
        <p>Your Account Is Inactive.Please Reset Your Password To Active Your Account.To Activate Password.{{$link}}</p>
    </div>

    <div class="form-actions">
        <input type="submit" value="Reset Password" class="signup-btn bg-primary">
    </div>

</div>

@stop