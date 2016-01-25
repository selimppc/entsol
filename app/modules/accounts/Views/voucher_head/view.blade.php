<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Account Type</th>
                <td>{{ isset($data->account_type)?$data->account_type:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Date</th>
                <td>{{ isset($data->date)?$data->date:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Reference</th>
                <td>{{ isset($data->reference)?$data->reference:'' }}</td>
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
                <th class="col-lg-4">note</th>
                <td>{{ isset($data->note)?$data->note:'' }}</td>
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




