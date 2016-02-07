<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
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
                <td>{{ isset($data->description)?$data->description:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Currency</th>
                <td>{{ isset($data->relCurrency->title)?$data->relCurrency->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Exchange Rate</th>
                <td>{{ isset($data->exchange_rate)?$data->exchange_rate:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Contact Person</th>
                <td>{{ isset($data->contact_person)?$data->contact_person:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Billing Address</th>
                <td>{{ isset($data->billing_address)?$data->billing_address:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Phone</th>
                <td>{{ isset($data->phone)?$data->phone:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Mobile</th>
                <td>{{ isset($data->mobile)?$data->mobile:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Fax</th>
                <td>{{ isset($data->fax)?$data->fax:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Email</th>
                <td>{{ isset($data->email)?$data->email:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
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

