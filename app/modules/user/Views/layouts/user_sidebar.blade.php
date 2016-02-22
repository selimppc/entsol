<?php  ?>
<li class="mm-dropdown open mm-dropdown-root ">
    <a href="#"><i class="menu-icon fa fa-user-md"></i><span class="mm-text">User</span></a>
    <ul>
        <li class="active">
            <a tabindex="-1" href="{{route('user-list')}}"><span class="mm-text">User List</span></a>
        </li>
        <li>
            <a tabindex="-1" href="{{route('role')}}"><span class="mm-text">Role</span></a>
        </li>
        {{--<li>
            <a tabindex="-1" href="{{route('index-role-user')}}"><span class="mm-text">Role User</span></a>
        </li>--}}
        <li>
            <a tabindex="-1" href="{{route('index-permission')}}"><span class="mm-text">Permission</span></a>
        </li>
        {{--<li>
            <a tabindex="-1" href="{{route('index-permission-role')}}"><span class="mm-text">Permission Role</span></a>
        </li>--}}
        <li>
            <a tabindex="-1" href="{{route('create-sign-up')}}"><span class="mm-text">Sign Up</span></a>
        </li>
        <li>
            <a tabindex="-1" href="{{route('get-user-login')}}"><span class="mm-text">Sign In</span></a>
        </li>
        <li>
            <a tabindex="-1" href="{{route('create-user-info')}}"><span class="mm-text">Profile</span></a>
        </li>
    </ul>
</li>
<script type="text/javascript">
    $(document).on('click', '.nav-list li', function() {
        $(".nav-list li").removeClass("active");
        $(this).addClass("active");
    });
</script>