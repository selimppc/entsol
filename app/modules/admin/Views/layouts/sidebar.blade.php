<div id="main-menu-inner">
    <div class="menu-content top animated fadeIn" id="menu-content-demo">
        <!-- Menu custom content demo
             Javascript: html/assets/demo/demo.js
         -->
        <div>
            <div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">User</span></div>

            <img src="assets/admin/img/avatar1.jpg" alt="" class="">
            <div class="btn-group">
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-envelope"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-cog"></i></a>
                <a href="#" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
            </div>
            <a href="#" class="close">×</a>
        </div>
    </div>
    <ul class="navigation">
        <li class="active">
            <a href="./"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
        </li>

        <li class="mm-dropdown mm-dropdown-root">
            <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Layouts</span></a>
            <ul class="mmc-dropdown-delay animated fadeInLeft">
                <li>
                    <a tabindex="-1" href="form-elements"><span class="mm-text">Example Pages</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="index"><span class="mm-text">Content Page Sample</span></a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="reg-sample"><i class="menu-icon fa fa-barcode"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Registration Form Sample</span></a>
        </li>
        <li class="mm-dropdown mm-dropdown-root">
            <a href="#"><i class="menu-icon fa fa-user-md"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">User</span></a>
            <ul class="mmc-dropdown-delay animated fadeInLeft">

                <li>
                    <a tabindex="-1" href="{{route('create-sign-up')}}"><span class="mm-text">Sign Up</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('get-user-login')}}"><span class="mm-text">Sign In</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('user-profile')}}"><span class="mm-text">Profile</span></a>
                </li>
            </ul>
        </li>
        <li class="mm-dropdown mm-dropdown-root">
            <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Crud</span></a>
            <ul class="mmc-dropdown-delay animated fadeInLeft">
                <li>
                    <a tabindex="-1" href="{{route('voucher-head')}}"><span class="mm-text">Voucher Head</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('group-one')}}"><span class="mm-text">Group One</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('branch')}}"><span class="mm-text">Branch</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('currency')}}"><span class="mm-text">Currency</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('default-offset')}}"><span class="mm-text">Default Offset</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('chart-of-accounts')}}"><span class="mm-text">Chart of Accounts</span></a>
                </li>
            </ul>
        </li>

    </ul> <!-- / .navigation -->
    {{--<div class="menu-content animated fadeIn">
        <a href="#" class="btn btn-primary btn-block btn-outline dark">Create Invoice</a>
    </div>--}}
</div> <!-- / #main-menu-inner -->