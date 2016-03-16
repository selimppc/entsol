<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">UserName</th>
                <td>{{ isset($model->relUser->username)?ucfirst($model->relUser->username):''}}</td>
            </tr>
            {{--<tr>
                <th class="col-lg-4">User Role</th>
                <td>{{isset($model->relUser->relRole->title)?ucfirst($model->relUser->relRole->title):''}}</td>
            </tr>--}}
            <tr>
                <th class="col-lg-4">Login Time</th>
                <td>{{ isset($model->login_time)?$model->login_time:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Logout Time </th>
                <td>{{ isset($model->logout_time)?$model->logout_time:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">IP Address</th>
                <td>{{ isset($model->ip_address)?$model->ip_address:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Date</th>
                <td>{{ isset($model->date)?$model->date:'' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button" data-placement="top" data-content="click close button for close this entry form"> Close </a>
</div>

<script>
    $(".btn").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });
</script>




