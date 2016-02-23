@extends('user::layouts.signup')

@section('content')
        <!-- Form -->
<div class="signup-form">

    {!! Form::open(['route' => 'signup','id'=>'signup-data-validation']) !!}

        <div class="signup-text">
            <span>Create an account</span>
        </div>

    <div class="form-group">
        {!! Form::text('username', Input::old('username'), ['name'=>'username', 'class' => 'form-control input-lg','required','placeholder'=>'Username','autofocus', 'title'=>'Enter User Name']) !!}
    </div>

        <div class="form-group">
            {!! Form::email('email', Input::old('email'), ['id'=>'email','class' => 'form-control input-lg','required','placeholder'=>'E-mail','title'=>'Enter Email Address']) !!}
        </div>

        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-lg','required','placeholder'=>'Password','title'=>'Enter Password']) !!}
        </div>

        <div class="form-actions">
            <input type="submit" value="SIGN UP" class="signup-btn bg-primary">
        </div>
    {!! Form::close() !!}
    <!-- / Form -->
</div>

{{--@include('user::signup._script')--}}
@stop

<script>
    $(".btn").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });


    $(".form-control").tooltip();
    $('input:disabled, button:disabled').after(function (e) {
        d = $("<div>");
        i = $(this);
        d.css({
            height: i.outerHeight(),
            width: i.outerWidth(),
            position: "absolute",
        })
        d.css(i.offset());
        d.attr("title", i.attr("title"));
        d.tooltip();
        return d;
    });
</script>
