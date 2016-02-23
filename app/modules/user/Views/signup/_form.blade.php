@extends('user::layouts.signup')

@section('content')

        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'signup','id'=>'abc-jq-validation-form']) !!}

        <div class="signup-text">
            <span>Create an account</span>
        </div>

    <div class="form-group">
        {!! Form::text('username', null, ['id'=>'username_id','name'=>'username', 'class' => 'form-control input-lg','required','placeholder'=>'Username']) !!}
    </div>

        <div class="form-group">
            {!! Form::email('email', null, ['class' => 'form-control input-lg','required','placeholder'=>'E-mail']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-lg','required','placeholder'=>'Password']) !!}
        </div>

        {{--<div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
            <label class="checkbox-inline">
                {!! Form::checkbox('remember_me', null,['name'=>'signup_confirm','class'=>'px','id'=>'confirm_id']) !!}
                <span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>
            </label>
        </div>--}}

        <div class="form-actions">
            <input type="submit" value="SIGN UP" class="signup-btn bg-primary">
        </div>
    {!! Form::close() !!}
    <!-- / Form -->
</div>


{{--@include('user::signup._script')--}}
@stop

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>

<script>

    $("#abc-jq-validation-form").validate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'jq-validation-email': {
                required: true,
                email: true
            },
            'jq-validation-password': {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            'jq-validation-password-confirmation': {
                required: true,
                minlength: 6,
                equalTo: "#jq-validation-password"
            },
            'jq-validation-required': {
                required: true
            },
            'jq-validation-url': {
                required: true,
                url: true
            },
            'jq-validation-phone': {
                required: true,
                phone_format: true
            },
            'email': {
                required: true,
                email: true
            },
            'currency_id': {
                required: true
            },
            'signature': {
                required: true
            },
            'status': {
                required: true
            },'pBranch': {
                required: true
            },

            'jq-validation-multiselect': {
                required: true,
                minlength: 2
            },
            'jq-validation-select2': {
                required: true
            },
            'jq-validation-select2-multi': {
                required: true,
                minlength: 2
            },
            'jq-validation-text': {
                required: true
            },
            'jq-validation-simple-error': {
                required: true
            },
            'jq-validation-dark-error': {
                required: true
            },
            'jq-validation-radios': {
                required: true
            },
            'jq-validation-checkbox1': {
                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
            },
            'jq-validation-checkbox2': {
                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
            },
            'jq-validation-policy': {
                required: true
            }
        },
        messages: {
            'jq-validation-policy': 'You must check it!'
        }
    });
</script>