<!DOCTYPE html>
<!-- saved from url=(0119)file:///home/sr/Dropbox/Edu%20Tech%20Solutions/Admin%20Theme%20Custom%20Bootstrap%203.3/admin_templage/theme/index.html -->
<html class="gt-ie8 gt-ie9 not-ie pxajs"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard - ENTSOL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Open Sans font from Google CDN -->
    <link href="assets/dist/css/custom.css" rel="stylesheet" type="text/css">

    <!--css -->
    <link href="assests/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assests/dist/css/styles.min.css" rel="stylesheet" type="text/css">
    <link href="assests/dist/css/widgets.min.css" rel="stylesheet" type="text/css">
    <link href="assests/dist/css/rtl.min.css" rel="stylesheet" type="text/css">
    <link href="assests/dist/css/themes.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <!--<script src="assets/javascripts/ie.min.js"></script>-->

</head>

<body class="theme-dust main-menu-animated" style="">

<script>var init = [];</script>
<script src="assests/dist/js/demo.js"></script>

<div id="main-wrapper">


    <!-- 2. $MAIN_NAVIGATION ===========================================================================

        Main navigation
    -->
    <div id="main-navbar" class="navbar navbar-inverse" role="navigation">
        <!-- Main menu toggle -->
        <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>

        <div class="navbar-inner">
            <!-- Main navbar header -->
            <div class="navbar-header">

                <!-- Logo -->
                <a href="#" class="navbar-brand">
                    <strong>ETSB</strong>
                </a>

                <!-- Main navbar toggle -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

            </div> <!-- / .navbar-header -->

            <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
                <div>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">First item</a></li>
                                <li><a href="#">Second item</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Third item</a></li>
                            </ul>
                        </li>
                    </ul> <!-- / .navbar-nav -->

                    <div class="right clearfix">
                        <ul class="nav navbar-nav pull-right right-navbar-nav">

                            <li class="nav-icon-btn nav-icon-btn-danger dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="label">5</span>
                                    <i class="nav-icon fa fa-bullhorn"></i>
                                    <span class="small-screen-text">Notifications</span>
                                </a>

                                <!-- NOTIFICATIONS -->

                                <!-- Javascript -->
                                <script>
                                    init.push(function () {
                                        $('#main-navbar-notifications').slimScroll({ height: 250 });
                                    });
                                </script>
                                <!-- / Javascript -->

                                <div class="dropdown-menu widget-notifications no-padding" style="width: 300px">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="notifications-list" id="main-navbar-notifications" style="overflow: hidden; width: auto; height: 250px;">

                                            <div class="notification">
                                                <div class="notification-title text-danger">SYSTEM</div>
                                                <div class="notification-description"><strong>Error 500</strong>: Syntax error in index.php at line <strong>461</strong>.</div>
                                                <div class="notification-ago">12h ago</div>
                                                <div class="notification-icon fa fa-hdd-o bg-danger"></div>
                                            </div> <!-- / .notification -->

                                            <div class="notification">
                                                <div class="notification-title text-info">STORE</div>
                                                <div class="notification-description">You have <strong>9</strong> new orders.</div>
                                                <div class="notification-ago">12h ago</div>
                                                <div class="notification-icon fa fa-truck bg-info"></div>
                                            </div> <!-- / .notification -->

                                            <div class="notification">
                                                <div class="notification-title text-default">CRON DAEMON</div>
                                                <div class="notification-description">Job <strong>"Clean DB"</strong> has been completed.</div>
                                                <div class="notification-ago">12h ago</div>
                                                <div class="notification-icon fa fa-clock-o bg-default"></div>
                                            </div> <!-- / .notification -->

                                            <div class="notification">
                                                <div class="notification-title text-success">SYSTEM</div>
                                                <div class="notification-description">Server <strong>up</strong>.</div>
                                                <div class="notification-ago">12h ago</div>
                                                <div class="notification-icon fa fa-hdd-o bg-success"></div>
                                            </div> <!-- / .notification -->

                                            <div class="notification">
                                                <div class="notification-title text-warning">SYSTEM</div>
                                                <div class="notification-description"><strong>Warning</strong>: Processor load <strong>92%</strong>.</div>
                                                <div class="notification-ago">12h ago</div>
                                                <div class="notification-icon fa fa-hdd-o bg-warning"></div>
                                            </div> <!-- / .notification -->

                                        </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div> <!-- / .notifications-list -->
                                    <a href="#" class="notifications-link">MORE NOTIFICATIONS</a>
                                </div> <!-- / .dropdown-menu -->
                            </li>
                            <li class="nav-icon-btn nav-icon-btn-success dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="label">10</span>
                                    <i class="nav-icon fa fa-envelope"></i>
                                    <span class="small-screen-text">Income messages</span>
                                </a>

                                <!-- MESSAGES -->

                                <!-- Javascript -->
                                <script>
                                    init.push(function () {
                                        $('#main-navbar-messages').slimScroll({ height: 250 });
                                    });
                                </script>
                                <!-- / Javascript -->

                                <div class="dropdown-menu widget-messages-alt no-padding" style="width: 300px;">
                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="messages-list" id="main-navbar-messages" style="overflow: hidden; width: auto; height: 250px;">

                                            <div class="message">
                                                <img src="./Dashboard - LanderApp_files/2.jpg" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                                                <div class="message-description">
                                                    from <a href="#">Robert Jang</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                                <div class="message-description">
                                                    from <a href="#">Michelle Bortz</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
                                                <div class="message-description">
                                                    from <a href="#">Timothy Owens</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                                <div class="message-description">
                                                    from <a href="#">Denise Steiner</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
                                                <div class="message-description">
                                                    from <a href="#">Robert Jang</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
                                                <div class="message-description">
                                                    from <a href="#">Robert Jang</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                                <div class="message-description">
                                                    from <a href="#">Michelle Bortz</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
                                                <div class="message-description">
                                                    from <a href="#">Timothy Owens</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                                <div class="message-description">
                                                    from <a href="#">Denise Steiner</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                            <div class="message">
                                                <img src="" alt="" class="message-avatar">
                                                <a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
                                                <div class="message-description">
                                                    from <a href="#">Robert Jang</a>
                                                    &nbsp;&nbsp;·&nbsp;&nbsp;
                                                    2h ago
                                                </div>
                                            </div> <!-- / .message -->

                                        </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div> <!-- / .messages-list -->
                                    <a href="#" class="messages-link">MORE MESSAGES</a>
                                </div> <!-- / .dropdown-menu -->
                            </li>
                            <!-- /3. $END_NAVBAR_ICON_BUTTONS -->

                            <li>
                                <form class="navbar-form pull-left">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
                                    <img src="assests/dist/img/avatar1.jpg" alt="">
                                    <span>User</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile <span class="label label-warning pull-right">new</span></a></li>
                                    <li><a href="#">Account <span class="badge badge-primary pull-right">new</span></a></li>
                                    <li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                </ul>
                            </li>
                        </ul> <!-- / .navbar-nav -->
                    </div> <!-- / .right -->
                </div>
            </div> <!-- / #main-navbar-collapse -->
        </div> <!-- / .navbar-inner -->
    </div> <!-- / #main-navbar -->
    <!-- /2. $END_MAIN_NAVIGATION -->

    <div id="main-menu" role="navigation">
        <div id="main-menu-inner">
            <div class="menu-content top animated fadeIn" id="menu-content-demo">
                <!-- Menu custom content demo
                     Javascript: html/assets/demo/demo.js
                 -->
                <div>
                    <div class="text-bg"><span class="text-slim">Welcome,</span> <span class="text-semibold">User</span></div>

                    <img src="assests/dist/img/avatar1.jpg" alt="" class="">
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
                    <a href="#"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Dashboard</span></a>
                </li>
                <li class="mm-dropdown mm-dropdown-root">
                    <a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">Layouts</span></a>
                    <ul class="mmc-dropdown-delay animated fadeInLeft">
                        <li>
                            <a tabindex="-1" href="#"><span class="mm-text">Layout</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="#"><i class="menu-icon fa fa-th-list"></i><span class="mm-text">Main menu</span></a>
                        </li>
                    </ul>
                </li>
                <li class="mm-dropdown mm-dropdown-root">
                    <a href="#"><i class="menu-icon fa fa-user-md"></i><span class="mm-text mmc-dropdown-delay animated fadeIn">User</span></a>
                    <ul class="mmc-dropdown-delay animated fadeInLeft">
                        <li>
                            <a tabindex="-1" href="#"><span class="mm-text">Sign Up</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="#"><span class="mm-text">Sign In</span></a>
                        </li>
                        <li>
                            <a tabindex="-1" href="#"><span class="mm-text">Profile</span></a>
                        </li>
                    </ul>
                </li>



            </ul> <!-- / .navigation -->
            <div class="menu-content animated fadeIn">
                <a href="#" class="btn btn-primary btn-block btn-outline dark">Create Invoice</a>
            </div>
        </div> <!-- / #main-menu-inner -->
    </div> <!-- / #main-menu -->
    <!-- /4. $MAIN_MENU -->

    <div id="content-wrapper">
        <ul class="breadcrumb breadcrumb-page">
            <div class="breadcrumb-label text-light-gray">You are here: </div>
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Dashboard</a></li>
        </ul>
        Welcome To Dashboard...
    </div> <!-- / #content-wrapper -->
    <div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<!-- Get jQuery from Google CDN -->
<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="assets/javascripts/jquery.min.js">'+"<"+"/script>"); </script><script src="assests/dist/js/jquery.min.js"></script>
<!-- <![endif]-->
<!--[if lte IE 9]>
<script type="text/javascript"> window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">'+"<"+"/script>"); </script>
<![endif]-->


<!-- LanderApp's javascripts -->
<script src="assests/dist/js/bootstrap.min.js"></script>
<script src="assests/dist/js/custom.min.js"></script>
<script src="assests/dist/js/demo.min.js"></script>
{{--<script src="assests/dist/js/jquery.min.js"></script>--}}

<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);
</script>


<div id="demo-settings">
    <a href="file:///home/sr/Dropbox/Edu%20Tech%20Solutions/Admin%20Theme%20Custom%20Bootstrap%203.3/admin_templage/theme/index.html#" id="demo-settings-toggler" class="fa fa-cogs"></a>
    <h5 class="header">SETTINGS</h5>
    <div>
        <ul id="demo-settings-list">
            <li class="clearfix">
                <span>Fixed navbar</span>
                <div class="demo-checkbox"><div class="switcher switcher-theme-square switcher-sm"><input type="checkbox" id="demo-fixed-navbar" class="demo-settings-switcher" data-class="switcher-sm"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div><div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div></div></div></div>
            </li>
            <li class="clearfix">
                <span>Fixed main menu</span>
                <div class="demo-checkbox"><div class="switcher switcher-theme-square switcher-sm"><input type="checkbox" id="demo-fixed-menu" class="demo-settings-switcher" data-class="switcher-sm"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div><div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div></div></div></div>
            </li>
            <li class="clearfix">
                <span>Right-to-left direction</span>
                <div class="demo-checkbox"><div class="switcher switcher-theme-square switcher-sm"><input type="checkbox" id="demo-rtl" class="demo-settings-switcher" data-class="switcher-sm"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div><div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div></div></div></div>
            </li>
            <li class="clearfix">
                <span>Main menu on the right</span>
                <div class="demo-checkbox"><div class="switcher switcher-theme-square switcher-sm"><input type="checkbox" id="demo-menu-rigth" class="demo-settings-switcher" data-class="switcher-sm"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div><div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div></div></div></div>
            </li>
            <li class="clearfix">
                <span>Hide main menu</span>
                <div class="demo-checkbox"><div class="switcher switcher-theme-square switcher-sm"><input type="checkbox" id="demo-no-menu" class="demo-settings-switcher" data-class="switcher-sm"><div class="switcher-toggler"></div><div class="switcher-inner"><div class="switcher-state-on"><span class="fa fa-check" style="font-size:11px;"></span></div><div class="switcher-state-off"><span class="fa fa-times" style="font-size:11px;"></span></div></div></div></div>
            </li>
        </ul>
    </div>
</div><div id="small-screen-width-point" style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div><div id="tablet-screen-width-point" style="position:absolute;top:-10000px;width:10px;height:10px;background:#fff;"></div></body></html>



<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);
</script>