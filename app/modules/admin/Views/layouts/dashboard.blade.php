@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop
<div style="background-image:url('{{ URL::asset("assets/user/img/chain.jpg")}}') ;height: 100%; width: 100%; ">
@section('content')



        <h2>Welcome To Dashboard.....</h2>
    </div>




@if(\Illuminate\Support\Facades\Session::has('sidebar_menu_user'))
    <?php $side_bar_menu = \Illuminate\Support\Facades\Session::get('sidebar_menu_user'); ?>
    @if($side_bar_menu)
        <?php //print_r($side_bar_menu); exit(); ?>
        @foreach($side_bar_menu as $module)
                @foreach($module['sub-menu'] as $sub_module)
                <?php // print_r($sub_module['menu_name']);  ?>
                    <li class="mm-dropdown">
                        <a tabindex="-1" href="{{route('menu-panel')}}"><span class="mm-text">{{$sub_module['menu_name']}}</span></a>
                        <ul>
                            @foreach($sub_module['sub-menu'] as $sub_sub_module)
                            <?php // print_r($sub_sub_module['menu_name']);  ?>
                                <li>
                                    <a tabindex="-1" href="{{route('menu-panel')}}"><span class="mm-text">{{$sub_sub_module['menu_name']}}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
        @endforeach
    @endif
@endif

@stop