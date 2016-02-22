<!DOCTYPE html>
<html class="gt-ie8 gt-ie9 not-ie pxajs"><!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title> {{isset($pageTitle)?$pageTitle:'ENTSOL'}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >

    <!---generate.min.css  refers to landerapp.min.css ----->
    <link href="{{ URL::asset('assets/admin/css/generate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/rtl.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/pages.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/widgets.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/themes.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ URL::asset('assets/admin/css/bootstrap-duallistbox.css') }}" rel="stylesheet" type="text/css" >
    {{--<link href="{{ URL::asset('assets/admin/css/styles.min.css') }}" rel="stylesheet" type="text/css" >--}}

</head>

<body class="theme-dust main-menu-animated">
<script>var init = [];</script>

   <div id="main-wrapper">
        @include('admin::layouts.header')

        <div id="main-menu" role="navigation">
            @section('sidebar')
            @show
        </div>

        <div id="content-wrapper">

            <ul class="breadcrumb breadcrumb-page">
                <div class="breadcrumb-label text-light-gray">You are here: </div>
                <li>
                    <i class="fa fa-home"></i>
                    <a href="{{route('dashboard')}}">Home</a>
                </li>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    <li>
                        <a href="{{Request::segment($i)}}">{!! ucfirst(Request::segment($i)) !!}</a>
                    </li>
                @endfor
            </ul>

            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {{--set some message after action--}}
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get("message")}}</div>

            @elseif(Session::has('error'))
                <div class="alert alert-warning">{{Session::get("error")}}</div>

            @elseif(Session::has('info'))
                <div class="alert alert-info">{{Session::get("info")}}</div>

            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{Session::get("danger")}}</div>

            @endif
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
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>


<script type="text/javascript">
    /*--------data table-----------*/
    init.push(function () {
        $('#jq-datatables-example').dataTable({
            "aaSorting": [[ 0, "desc" ]],
            "bPaginate": false,
        });
        $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Filter...');
    });
    init.push(function () {
        $('.bs-datepicker-component').datepicker();
    });
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);

    //sidebar open in menu items in nav;
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.navigation li ul li a[href="'+ url +'"]').parent().parent().parent().addClass('open');
    $('ul.navigation li ul li a[href="'+ url +'"]').addClass('active');



</script>
