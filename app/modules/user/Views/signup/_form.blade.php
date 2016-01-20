@extends('user::layouts.login')

@section('content')
    <script>
        var init = [];
    </script>
    <div id="page-signup-bg">
        <!-- Background overlay -->
        <div class="overlay"></div>
        <!-- Replace this with your bg image -->
        <img src="assets/user/img/signin-bg-1.jpg" alt="">
    </div>

    <!-- Container -->
    <div class="signup-container">
        <!-- Header -->
        <div class="signup-header">
            <a href="#" class="logo">
                ETSB<span style="font-weight:100;"></span>
            </a> <!-- / .logo -->
        </div>
        <!-- / Header -->

        <!-- Form -->
        <div class="signup-form">
            <form action="index.html" id="signup-form_id">

                <div class="signup-text">
                    <span>Create an account</span>
                </div>

                <div class="form-group w-icon">
                    <input type="text" name="signup_name" id="name_id" class="form-control input-lg" placeholder="Full name">
                    <span class="fa fa-info signup-form-icon"></span>
                </div>

                <div class="form-group w-icon">
                    <input type="text" name="signup_email" id="email_id" class="form-control input-lg" placeholder="E-mail">
                    <span class="fa fa-envelope signup-form-icon"></span>
                </div>

                <div class="form-group w-icon">
                    <input type="text" name="signup_username" id="username_id" class="form-control input-lg" placeholder="Username">
                    <span class="fa fa-user signup-form-icon"></span>
                </div>

                <div class="form-group w-icon">
                    <input type="password" name="signup_password" id="password_id" class="form-control input-lg" placeholder="Password">
                    <span class="fa fa-lock signup-form-icon"></span>
                </div>

                <div class="form-group" style="margin-top: 20px;margin-bottom: 20px;">
                    <label class="checkbox-inline">
                        <input type="checkbox" name="signup_confirm" class="px" id="confirm_id">
                        <span class="lbl">I agree with the <a href="#" target="_blank">Terms and Conditions</a></span>
                    </label>
                </div>

                <div class="form-actions">
                    <input type="submit" value="SIGN UP" class="signup-btn bg-primary">
                </div>
            </form>
        </div>
        <!-- Right side -->
    </div>

    <div class="have-account">
        Already have an account? <a href="sign-in">Sign In</a>
    </div>

    <script type="text/javascript">

        init.push(function () {
            $("#signup-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

            // Validate name
            $("#name_id").rules("add", {
                required: true,
                minlength: 1
            });

            // Validate email
            $("#email_id").rules("add", {
                required: true,
                email: true
            });

            // Validate username
            $("#username_id").rules("add", {
                required: true,
                minlength: 3
            });

            // Validate password
            $("#password_id").rules("add", {
                required: true,
                minlength: 6
            });

            // Validate confirm checkbox
            $("#confirm_id").rules("add", {
                required: true
            });
        });

        window.LanderApp.start(init);
    </script>
@stop