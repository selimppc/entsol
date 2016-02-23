<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign In - ETSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Open Sans font from Google CDN -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

    <!---generate.min.css  refers to landerapp.min.css ----->
    <link href="{{ URL::asset('assets/admin/css/generate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/rtl.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/pages.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/widgets.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/themes.min.css') }}" rel="stylesheet" type="text/css" >
    <!--[if lt IE 9]>
    <script src="assets/javascripts/ie.min.js"></script>
    <![endif]-->


    <style>
        #signin-demo {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 10000;
            background: rgba(0,0,0,.6);
            padding: 6px;
            border-radius: 3px;
        }
        #signin-demo img { cursor: pointer; height: 40px; }
        #signin-demo img:hover { opacity: .5; }
        #signin-demo div {
            color: #fff;
            font-size: 10px;
            font-weight: 600;
            padding-bottom: 6px;
        }
    </style>
    <!-- / $DEMO -->

</head>

<body class="theme-default page-signin">

    <script>
        var init = [];
    </script>

    @yield('content')

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="assets/admin/js/jquery.min.js">'+"<"+"/script>"); </script>
<!-- <![endif]-->
{{--<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->--}}


    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>

    <script type="text/javascript">
        $("#login-data-validation").validate({
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
</body>
</html>