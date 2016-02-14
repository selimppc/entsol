@extends('admin::layouts.master')
@section('sidebar')
    @include('admin::layouts.sidebar')
@stop

@section('content')
    <div class="row theme-default main-menu-animated page-profile">
        <!-- 5. $PROFILE ===================================================================================

                Profile
        -->
        <div class="profile-full-name">
            <span class="text-semibold">User</span>'s profile
        </div>
        <div class="profile-row">
            <div class="left-col">
                <div class="profile-block">
                    <div class="panel profile-photo">
                        <img src="assets/user/img/avatar.jpg" alt="">
                    </div><br>
                    <a href="#" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</a>&nbsp;&nbsp;
                    <a href="#" class="btn"><i class="fa fa-comment"></i></a>
                </div>

                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title">About me</span>
                    </div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et <a href="#">dolore magna</a> aliqua.
                    </div>
                </div>

                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title">Statistics</span>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item"><strong>126</strong> Likes</a>
                        <a href="#" class="list-group-item"><strong>579</strong> Followers</a>
                        <a href="#" class="list-group-item"><strong>100</strong> Following</a>
                    </div>
                </div>

                <div class="panel panel-transparent profile-skills">
                    <div class="panel-heading">
                        <span class="panel-title">Skills</span>
                    </div>
                    <div class="panel-body">
                        <span class="label label-primary">UI/UX</span>
                        <span class="label label-primary">Web design</span>
                        <span class="label label-primary">Photoshop</span>
                        <span class="label label-primary">HTML</span>
                        <span class="label label-primary">CSS</span>
                    </div>
                </div>

                <div class="panel panel-transparent">
                    <div class="panel-heading">
                        <span class="panel-title">Social</span>
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item"><i class="profile-list-icon fa fa-twitter" style="color: #4ab6d5"></i> @dsteiner</a>
                        <a href="#" class="list-group-item"><i class="profile-list-icon fa fa-facebook-square" style="color: #1a7ab9"></i> Denise Steiner</a>
                        <a href="#" class="list-group-item"><i class="profile-list-icon fa fa-envelope" style="color: #888"></i> dsteiner@example.com</a>
                    </div>
                </div>

            </div>
            <div class="right-col">

                <hr class="profile-content-hr no-grid-gutter-h">

                <div class="profile-content">

                    <ul id="profile-tabs" class="nav nav-tabs">
                        <li class="active"><a href="" data-target="#profile" class="media_node span" id="new_tab" data-toggle="ajax-tab" rel="tooltip">Profile</a></li>
                        <li><a href="{{route('user-info',['user_id'=>$user_id,'value'=>'meta'])}}" data-target="#meta" class="media_node span" id="open_tab" data-toggle="ajax-tab" rel="tooltip"> Meta Information</a></li>
                        <li><a href="{{route('user-info',['user_id'=>$user_id,'value'=>'acc-settings'])}}" data-target="#acc-settings" class="media_node span" id="replied_tab" data-toggle="ajax-tab" rel="tooltip">Account Settings</a></li>

                    </ul>

                    <div class="tab-content tab-content-bordered panel-padding">
                        <div class="widget-article-comments tab-pane panel no-padding no-border fade in active" id="profile-tabs-board">

                            <div class="comment">
                                <img src="assets/user/img/avatar.jpg" alt="" class="comment-avatar">
                                <div class="comment-body">
                                    <form action="#" id="leave-comment-form" class="comment-text no-padding no-border">
                                        <textarea class="form-control" rows="1"></textarea>
                                        <div class="expanding-input-hidden" style="margin-top: 10px;">
                                            <label class="checkbox-inline pull-left">
                                                <input type="checkbox" class="px">
                                                <span class="lbl">Private message</span>
                                            </label>
                                            <button class="btn btn-primary pull-right">Leave Message</button>
                                        </div>
                                    </form>
                                </div> <!-- / .comment-body -->
                            </div>

                            <hr class="no-panel-padding-h panel-wide">

                            <div class="tab-pane active" id="profile">

                            </div>
                        </div> <!-- / .tab-pane -->
                        <div class="tab-pane" id="meta">

                        </div>
                        <div class="tab-pane" id="acc-settings">

                        </div>
                    </div> <!-- / .tab-content -->
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('assets/user/js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>



    <script>
        $(document).ready(function(){
            $(function(){

                $('[data-toggle="ajax-tab"]').click(function(e) {
                    var $this = $(this),
                            loadurl = $this.attr('href'),
                            targ = $this.attr('data-target');

                    $.get(loadurl, function(data) {
                        $(targ).html(data);
                    });

                    $this.tab('show');
                    return false;
                });

                $(window).load(function() {
                    $.ajax({
                        url : 'user-info/user_id',
                        dataType: 'json'
                    }).done(function (data) {
                        $('#profile').html(data);
                    }).fail(function () {
                        alert('Posts could not be loaded.');
                        return false;
                    });
                });
            });
        });

</script>
@stop