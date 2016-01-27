<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Account Code</th>
                <td>{{ isset($data->account_code)?$data->account_code:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Title</th>
                <td>{{ isset($data->title)?$data->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Description</th>
                <td>{{ isset($data->description)?$data->description:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Account Type</th>
                <td>{{ isset($data->account_type)?$data->account_type:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Account Usage</th>
                <td>{{ isset($data->account_usage)?$data->account_usage:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Group One Title</th>
                <td>{{ isset($data->relGroupOne->title)?$data->relGroupOne->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Analytical Code</th>
                <td>{{ isset($data->analytical_code)?$data->analytical_code:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Branch</th>
                <td>{{ isset($data->relBranch->title)?$data->relBranch->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($data->status)?$data->status:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Business Title</th>
                <td>{{ isset($data->business_id)?$data->business_id:'' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
</div>




