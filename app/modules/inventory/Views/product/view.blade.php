<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding: 30px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <tr>
                <th class="col-lg-4">Title</th>
                <td>{{ isset($model->title)?$model->title:''}}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Code</th>
                <td>{{isset($model->code)?$model->code:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Business</th>
                <td>{{isset($model->relBusiness->title)?ucfirst($model->relBusiness->title):''}}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Product Group</th>
                <td>{{isset($model->relProductGroup->title)?ucfirst($model->relProductGroup->title):''}}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Product Category</th>
                <td>{{isset($model->relProductCategory->title)?ucfirst($model->relProductCategory->title):''}}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Description</th>
                <td>{{ isset($model->description)?$model->description:''}}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Cost Price</th>
                <td>{{ isset($model->cost_price)?$model->cost_price:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Purchase Unit</th>
                <td>{{ isset($model->purchase_unit)?$model->purchase_unit:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Purchase Unit Qty</th>
                <td>{{ isset($model->purchase_unit_qty)?$model->purchase_unit_qty:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Stock Unit</th>
                <td>{{ isset($model->stock_unit)?$model->stock_unit:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Stock Unit Qty</th>
                <td>{{ isset($model->stock_unit_qty)?$model->stock_unit_qty:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-4">Stock Type</th>
                <td>{{ isset($model->stock_type)?$model->stock_type:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($model->status)?$model->status:'' }}</td>
            </tr>
            <tr>
                <th>Product Image</th>
                <td>
                    @if(isset($model->image))
                        <img src="{{ URL::to($model->image) }}">
                    @else
                        <img src="{{ URL::to('/assets/img/default.jpg') }}" width="80px" height="80px">
                    @endif
                </td>
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




