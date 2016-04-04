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
                <th class="col-lg-4">Description</th>
                <td>{{ isset($model->description)?$model->description:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Address</th>
                <td>{{isset($model->address)?$model->address:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Contact Person</th>
                <td>{{ isset($model->contact_person)?$model->contact_person:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Email</th>
                <td>{{ isset($model->email)?$model->email:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Phone</th>
                <td>{{ isset($model->phone)?$model->phone:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Fax</th>
                <td>{{ isset($model->fax)?$model->fax:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Emergency Contact Person</th>
                <td>{{ isset($model->emergency_contact_person)?$model->emergency_contact_person:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Emergency Contact Number</th>
                <td>{{ isset($model->emergency_contact_number)?$model->emergency_contact_number:'' }}</td>
            </tr>


            <tr>
                <th class="col-lg-4">Is Sub Contact ?</th>
                <td>
                    @if(isset($model->is_sub_contact))
                        {{ $model['is_sub_contact']==1 ? 'Yes' : 'No'}}
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




