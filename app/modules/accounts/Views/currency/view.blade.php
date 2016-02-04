<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Code</th>
                <td>{{ isset($data->code)?$data->code:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Title</th>
                <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Description</th>
                <td>{{ isset($data->description)?$data->description:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Exchange Rate</th>
                <td>{{ isset($data->exchange_rate)?$data->exchange_rate:'' }}</td>
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




