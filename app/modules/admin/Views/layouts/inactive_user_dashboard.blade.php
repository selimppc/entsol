@extends('admin::layouts.master')

@section('content')
    {{--<ul class="breadcrumb breadcrumb-page">
        <div class="breadcrumb-label text-light-gray">You are here: </div>
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Dashboard</a></li>
    </ul>--}}
    <div class="panel-heading message-width">
        <p style="color:cadetblue;font-size: medium">Your account is inactive.To activate your account you should reset your password.<a href="{{ route('forget-password-view') }}" class="btn btn-info btn-xs" data-placement="top" data-content="Reset Your Password">Reset Password</a></p>

    </div>
@stop