<div id="main-menu-inner">
    <div class="menu-content top animated fadeIn" id="menu-content-demo">
        <!-- Menu custom content demo
             Javascript: html/assets/demo/demo.js
         -->
        <div>
            <div class="text-bg"><span class="text-slim">Welcome,</span><br> <span class="text-semibold">{{isset(Auth::user()->username)?ucfirst(Auth::user()->username):''}}</span></div>

            @if(Session::has('user_image'))
                {!! HTML::image(Session::get('user_image')) !!}
            @else
                {!! HTML::image('assets/admin/img/avatar1.jpg') !!}
            @endif

            <div class="btn-group btn-left">
                <a href="{{Route('user-profile')}}" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
                <a href="{{Route('user-logout')}}" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
            </div>
            <a href="#" class="close">×</a>
        </div>
    </div>

    <ul class="navigation"> {{--navigation--}}
        <li class="active">
            <a href="{{URL::to('dashboard')}}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
        </li>

        @if(\Illuminate\Support\Facades\Session::has('sidebar_menu_user'))
            <?php $side_bar_menu = \Illuminate\Support\Facades\Session::get('sidebar_menu_user'); ?>
            @if($side_bar_menu)
                @foreach($side_bar_menu as $module)
                        @foreach($module['sub-menu'] as $sub_module)

                            @if(count($sub_module['sub-menu'])>0)
                            <li class="mm-dropdown">
                                <a tabindex="-1" href="{{URL::to($sub_module['route'])}}">
                                    <i class="{{@$sub_module['icon_code']}}"> </i>
                                    <span class="mm-text">{{$sub_module['menu_name']}}</span>
                                </a>
                                <ul>
                                    @foreach($sub_module['sub-menu'] as $sub_sub_module)
                                        <li>
                                            <a tabindex="-1" href="{{URL::to($sub_sub_module['route'])}}">
                                                <i class="{{@$sub_sub_module['icon_code']}}"> </i>
                                                <span class="mm-text">{{$sub_sub_module['menu_name']}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif

                        @endforeach
                @endforeach
            @endif
        @endif

    </ul>   {{--navigation--}}


        {{--<li class="active">
            <a href="{{URL::to('dashboard')}}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
        </li>

        <li class="mm-dropdown">
            <ul class="mmc-dropdown-delay animated fadeInLeft">
                <li>
                    <a tabindex="-1" href="{{URL::to('form-elements')}}"><span class="mm-text">Example Pages</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{URL::to('content-page')}}"><span class="mm-text">Content Page Sample</span></a>
                </li>
                <li class="">
                    <a href="{{URL::to('reg-sample')}}"><i class="menu-icon fa fa-barcode"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Registration Form Sample</span></a>
                </li>
            </ul>
        </li>

        <li class="mm-dropdown">
            <a href="#"><i class="menu-icon fa fa-columns"></i><span class="mm-text">Administration </span></a>
            <ul>
                <li>
                    <a tabindex="-1" href="{{route('menu-panel')}}"><span class="mm-text">Menu Panel</span></a>
                </li>
            </ul>
        </li>

        @if(file_exists(app_path().'/modules/user/Views/layouts/user_sidebar.blade.php'))
            @include('user::layouts.user_sidebar')
        @endif

        <li class="mm-dropdown">
            <a href="#"><i class="menu-icon fa fa-columns"></i><span class="mm-text">Master Setup </span></a>
            <ul>
                <li>
                    <a tabindex="-1" href="{{route('group-one')}}"><span class="mm-text">Group One</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('branch')}}"><span class="mm-text">Branch</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('currency')}}"><span class="mm-text">Currency</span></a>
                </li>
            </ul>
        </li>

        @if(file_exists(app_path().'/modules/accounts/Views/layouts/ac_sidebar.blade.php'))
            @include('accounts::layouts.ac_sidebar')
        @endif--}}

                        <!--
    </ul>  / .navigation -->
    {{--<div class="menu-content animated fadeIn">
        <a href="#" class="btn btn-primary btn-block btn-outline dark">Create Invoice</a>
    </div>--}}
</div> <!-- / #main-menu-inner -->