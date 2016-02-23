@extends('user::layouts.signup')

@section('content')
        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'user-save-new-password','id' => '']) !!}

    <div class="signup-text">
        <span>Forgot Password</span>
    </div>
    {!! Form::hidden('id', $id, array('class'=>'form-control')) !!}
    <div class="form-group">
        {!! Form::password('password',  array('id'=>'456','class'=>'form-control input-lg','required','name'=>'password','placeholder'=>'Password')) !!}
    </div>

    <div class="form-group">
        {!! Form::password('confirm_password', array('id'=>'123','class'=>'form-control input-lg','required','id'=>'confirm_password','name'=>'confirm_password','placeholder'=>'Confirm-password','onkeyup'=>"password_validation()")) !!}
        <span id='tanin'></span>
    </div>

    <div class="form-actions">
        <input type="submit" value="SUBMIT" class="signup-btn bg-primary" id="submit-btn-disabled">
    </div>
    {!! Form::close() !!}
            <!-- / Form -->
</div>

@stop
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>


<script type="text/javascript">

    function password_validation() {
        $('#123').on('keyup', function () {
            if ($(this).val() == $('#456').val()) {

                $('#tanin').html('');
//                document.getElementById("submit-btn-disabled").disabled = false;
//                return false;
            }
            else $('#tanin').html('confirm password do not match with new password,please check.').css('color', 'red');
//            document.getElementById("submit-btn-disabled").disabled = true;
        });
    }

</script>
