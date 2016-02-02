<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Type</th>
                <td>{{ isset($data->type)?$data->type:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Code</th>
                <td>{{ isset($data->code)?$data->code:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Title</th>
                <td>{{ isset($data->title)?$data->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Last Number</th>
                <td>{{ isset($data->last_number)?$data->last_number:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Increment</th>
                <td>{{ isset($data->increment)?$data->increment:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($data->status)?$data->status:'' }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
</div>




