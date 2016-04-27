<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form" onclick="close_modal();"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <h4 class="text-center">Receipt Voucher Informations</h4>
            <tr>
                <th class="col-lg-2">Account Type</th>
                <td class="col-lg-4">{{ isset($data->account_type)?	'Receipt Voucher' : ''}}</td>

                <th class="col-lg-2">Voucher Number</th>
                <td class="col-lg-4">{{ isset($data->voucher_number)?$data->voucher_number:''}}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Date</th>
                <td class="col-lg-4">{{ isset($data->date)?$data->date:''}}</td>

                <th class="col-lg-2">Reference</th>
                <td class="col-lg-4">{{ isset($data->reference)?ucfirst($data->reference):'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Year</th>
                <td class="col-lg-4">{{ isset($data->year)?$data->year:'' }}</td>

                <th class="col-lg-2">Period</th>
                <td class="col-lg-4">{{ isset($data->period)?$data->period:'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Branch</th>
                <td class="col-lg-4">{{isset($data->relBranch->code)?$data->relBranch->code:''}}</td>

                <th class="col-lg-2">Status</th>
                <td class="col-lg-4">{{ isset($data->status)?ucfirst($data->status) :'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Note</th>
                <td colspan="3">{{ isset($data->note)?ucfirst($data->note):'' }}</td>
            </tr>
        </table>

        @if(count($voucher_details_data)>0)

            <div class="table-primary">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
                    <thead>
                    <tr>
                        <th> Voucher Number </th>
                        <th> Coa </th>
                        <th> Account Code </th>
                        <th> Title </th>
                        <th> Sub Account Code </th>
                        <th> Currency </th>
                        <th> Exchange Rate </th>
                        <th> Prime Debit </th>
                        <th> Prime Credit </th>
                        <th> Base Debit </th>
                        <th> Base Credit </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($voucher_details_data))
                        @foreach($voucher_details_data as $values)
                            <tr class="gradeX">
                                <td>{{$values->voucher_number}}</td>
                                <td>{{$values->relChartOfAccounts->title}}</td>
                                <td>{{$values->account_code}}</td>
                                <td>{{$values->	title}}</td>
                                <td>{{$values->	sub_account_code}}</td>
                                <td>{{$values->relCurrency->title}}</td>
                                <td>{{$values->exchange_rate}}</td>
                                <td>{{$values->	prime_debit}}</td>
                                <td>{{$values->	prime_credit}}</td>
                                <td>{{$values->	base_debit}}</td>
                                <td>{{$values->	base_credit}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

<div class="panel-heading help-text-color message-width">

    @if(isset($data->status))
        @if(@$data->status == 'balanced')
            <h4 class="balanced-text-color" style="background-color:lightblue">
                <strong>The Journal Voucher is Balanced.</strong>
                <a href="{{route('journal-post',@$data->voucher_number)}}" class="btn btn-primary " title=""><strong class="text-center">POST to Ledger</strong></a>
            </h4>
        @elseif(@$data->status == 'posted')
            <h4 class="text-dark-green">
                <strong>Journal Voucher({{@$data->voucher_number}}) is Posted.</strong>
            </h4>
        @else
            <h4 class="warning-report-text-color">
                <strong>WARNING Report :</strong>
                <span class="required"><strong>The journal voucher must be balance ie. debits equal to credits before it can be processed.</strong></span>
            </h4>
        @endif
    @else
        <h4 class="warning-report-text-color">
            <strong>WARNING Report :</strong>
            <span class="required"><strong>The journal voucher must be balance ie. debits equal to credits before it can be processed.</strong></span>
        </h4>
    @endif
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button" data-placement="top" data-content="click close button for close this entry form" onclick="close_modal();"> Close </a>
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

    function close_modal(){
        document.getElementById('etsbModal').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
    }
</script>
