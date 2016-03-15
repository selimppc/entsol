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

        @foreach($side_bar_menu as $module)
            <li class="mm-dropdown">

                <a href="#"><i class="menu-icon fa fa-columns"></i><span class="mm-text">Administration </span></a>
                <ul>
                    @foreach($module['sub-menu'] as $sub_module)
                        <li>
                            <a tabindex="-1" href="{{route('menu-panel')}}"><span class="mm-text">Menu Panel</span></a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    @endif
@endif

@stop