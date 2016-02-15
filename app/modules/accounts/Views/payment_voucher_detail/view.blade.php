<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    <div style="padding:15px;">
        <table class="table table-bordered table-hover table-striped">
            <h4 class="text-center">Payment Voucher Information</h4>
            <tr>
                <th class="col-lg-4">Voucher Number</th>
                <td>{{ isset($data->relVoucherHead->voucher_number)?$data->relVoucherHead->voucher_number:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Account Type</th>
                <td>{{ isset($data->relVoucherHead->account_type)?ucfirst($data->relVoucherHead->account_type):''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Branch</th>
                <td>{{ isset($data->relVoucherHead->relBranch->title)?$data->relVoucherHead->relBranch->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Status</th>
                <td>{{ isset($data->relVoucherHead->status)?ucfirst($data->relVoucherHead->status):''}}</td>
            </tr>
        </table>
        <table class="table table-bordered table-hover table-striped">
            <h4 class="text-center">Payment Voucher Detail</h4>
            <tr>
                <th class="col-lg-4">Chart Of Account</th>
                <td>{{ isset($data->relChartOfAccounts->title)?$data->relChartOfAccounts->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Account Code</th>
                <td>{{ isset($data->relChartOfAccounts->account_code)?$data->relChartOfAccounts->account_code:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Sub Account Code</th>
                <td>{{ isset($data->sub_account_code)?ucfirst($data->sub_account_code):'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Currency</th>
                <td>{{isset($data->relCurrency->title)?$data->relCurrency->title:'' }}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Exchange Rate</th>
                <td>{{isset($data->relCurrency->exchange_rate)?$data->relCurrency->exchange_rate:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Prime Amount</th>
                <td>{{isset($data->prime_amount)?$data->prime_amount:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Base Amount</th>
                <td>{{isset($data->base_amount)?$data->base_amount:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Branch</th>
                <td>{{isset($data->relBranch->title)?$data->relBranch->title:''}}</td>
            </tr>
            <tr>
                <th class="col-lg-4">Note</th>
                <td>{{ isset($data->note)?ucfirst($data->note):'' }}</td>
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




