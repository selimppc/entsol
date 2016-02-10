<div id="main-menu-inner">
    <div class="menu-content top animated fadeIn" id="menu-content-demo">
        <!-- Menu custom content demo
             Javascript: html/assets/demo/demo.js
         -->
        <div>
            <div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">User</span></div>

            <img src="{{URL::to('assets/admin/img/avatar1.jpg')}}" alt="User Image" >

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
            <a href="{{URL::to('dashboard')}}"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
        </li>

        <li class="mm-dropdown">
            <a><i class="menu-icon fa fa-th"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Layouts</span></a>
            <ul class="mmc-dropdown-delay animated fadeInLeft">
                <li>
                    <a tabindex="-1" href="{{URL::to('form-elements')}}"><span class="mm-text">Example Pages</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{URL::to('content-page')}}"><span class="mm-text">Content Page Sample</span></a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="{{URL::to('reg-sample')}}"><i class="menu-icon fa fa-barcode"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Registration Form Sample</span></a>
        </li>

        <li class="mm-dropdown">
            <a href="#"><i class="menu-icon fa fa-user-md"></i><span class="mm-text">User</span></a>
            <ul>
                <li>
                    <a tabindex="-1" href="{{route('index-user')}}"><span class="mm-text">User List</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('role')}}"><span class="mm-text">Role</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('index-role-user')}}"><span class="mm-text">Role User</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('index-permission')}}"><span class="mm-text">Permission</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('index-permission-role')}}"><span class="mm-text">Permission Role</span></a>
                </li>
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


        <li class="mm-dropdown">
            <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Accounts Module</span></a>
            <ul class="mmc-dropdown-delay animated fadeInLeft">
                <li>
                    <a tabindex="-1" href="{{route('voucher-head')}}"><span class="mm-text">Journal Voucher</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('reverse-voucher')}}"><span class="mm-text">Reverse Entry</span></a>
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
                <li>
                    <a tabindex="-1" href="{{route('settings')}}"><span class="mm-text">Settings</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('account-reports')}}"><span class="mm-text">Account Reports</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('gl-transaction')}}"><span class="mm-text">Gl Transaction</span></a>
                </li>
                <li>
                    <a tabindex="-1" href="{{route('voucher-history')}}"><span class="mm-text">Voucher History</span></a>
                </li>
            </ul>
        </li>

    </ul> <!-- / .navigation -->
    {{--<div class="menu-content animated fadeIn">
        <a href="#" class="btn btn-primary btn-block btn-outline dark">Create Invoice</a>
    </div>--}}
</div> <!-- / #main-menu-inner -->