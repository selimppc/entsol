<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">UserName</th>
                <td>{{ isset($data->username)?$data->username:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Email Address</th>
                <td>{{ isset($data->email)?$data->email:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Branch</th>
                <td>{{ isset($data->relBranch->title)?$data->relBranch->title:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">User Role</th>
                <td>{{ isset($data->relRole->title)?$data->relRole->title:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Expire Date</th>
                <td>{{ isset($data->expire_date)?$data->expire_date:'' }}</td>
            </tr>

        </table>
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
</div>




