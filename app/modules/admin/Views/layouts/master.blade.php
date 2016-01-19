<!DOCTYPE html>

<html class="gt-ie8 gt-ie9 not-ie pxajs"><!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard - ENTSOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" >
    {{--<link href="{{ URL::asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" >--}}
    <link href="{{ URL::asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/styles.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/rtl.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/pages.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/widgets.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/themes.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/component.css') }}" rel="stylesheet" type="text/css" >

</head>

<body class="theme-dust main-menu-animated" style="">

   <div id="main-wrapper">
        @include('admin::layouts.header')

        <div id="main-menu" role="navigation">
            @section('sidebar')
            @show
        </div>

        <div id="content-wrapper">
            <div>
                @yield('content')
            </div>
        </div>
        <div id="main-menu-bg">
        </div>
   </div>

</body>
</html>

<!-- javascripts -->

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo-mock.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.mockjax.js') }}"></script>

<script>var init = [];</script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo.js') }}"></script>

<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);
</script>
