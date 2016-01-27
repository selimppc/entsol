<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Offset</th>
                <td>{{ isset($data->offset)?$data->offset:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Pnl Account</th>
                <td>{{ isset($data->pnl_account)?$data->pnl_account:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Year</th>
                <td>{{ isset($data->year)?$data->year:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Period</th>
                <td>{{ isset($data->period)?$data->period:'' }}</td>
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

