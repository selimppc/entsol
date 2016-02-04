<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    <div style="padding: 10px;">
        <table id="" class="table table-bordered table-hover table-striped">
            <h4 class="text-center">Journal Voucher Informations</h4>
            <tr>
                <th class="col-lg-2">Account Type</th>
                <td class="col-lg-4">{{ isset($data->account_type)?	'Journal Voucher' : ''}}</td>

                <th class="col-lg-2">Voucher Number</th>
                <td class="col-lg-4">{{ isset($data->voucher_number)?$data->voucher_number:''}}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Date</th>
                <td class="col-lg-4">{{ isset($data->date)?$data->date:''}}</td>

                <th class="col-lg-2">Reference</th>
                <td class="col-lg-4">{{ isset($data->reference)?$data->reference:'' }}</td>
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
                <td class="col-lg-4">{{ isset($data->status)?'Open' :'' }}</td>
            </tr>

            <tr>
                <th class="col-lg-2">Note</th>
                <td colspan="3">{{ isset($data->note)?$data->note:'' }}</td>
            </tr>
        </table>

        @if(count($voucher_details_data)>0)

        <div class="table-primary">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="jq-datatables-example">
            <h4 class="text-center">Journal Voucher Detail Informations</h4>
            <thead>
            <tr>
                <th>Voucher Number </th>
                <th>COA(Account Code) </th>
                <th> Currency (Exchange Rate)</th>
                <th> Amount </th>
                <th> Branch </th>
                <th> Status </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($voucher_details_data))
                @foreach($voucher_details_data as $values)
                    <tr class="gradeX">
                        <td>{{isset($values->relVoucherHead->voucher_number)?$values->relVoucherHead->voucher_number:''}}</td>
                        <td>{{isset($values->relChartOfAccounts->title)?$values->relChartOfAccounts->title:''}}  ({{isset($values->relChartOfAccounts->account_code)?$values->relChartOfAccounts->account_code:''}})</td>
                        <td>{{isset($values->relCurrency->title)?$values->relCurrency->title:''}} ({{isset($values->relCurrency->exchange_rate)?$values->relCurrency->exchange_rate:''}})</td>
                        <td>{{$values->base_amount}}</td>
                        <td>{{isset($values->relBranch->title)?$values->relBranch->title:''}}</td>
                        <td>{{ucfirst($values->status)}}
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
        @endif
    </div>
</div>

<div class="modal-footer">
    <a href="{{ URL::previous()}}" class="btn btn-default" type="button"> Close </a>
</div>




