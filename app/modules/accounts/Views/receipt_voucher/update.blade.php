<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>


{!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-receipt-voucher', $data[0]['id'] ]]) !!}

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
    <h4 class="modal-title" id="myModalLabel">{{ $pageTitle }} &nbsp;&nbsp;<span style="color: #A54A7B" class="user-guideline" data-content="<em>system fill account type and voucher number <br> Must Fill <b>Required</b> Field.    <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
</div>

<div class="modal-body">

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            {!! Form::hidden('account_type', 'receipt-voucher') !!}
            <div class="col-sm-3">
                {!! Form::label('voucher_number', 'Voucher Number:', []) !!}
                <small class="narration">(Auto Generated)</small>
                {!! Form::text('voucher_number', @$generate_voucher_number? $generate_voucher_number : @$data[0]['voucher_number'], ['required', 'class' => 'form-control','readonly','title'=>'system generated "voucher number", example :: REC-0000001','style'=>'font-weight:bold']) !!}
                {!! Form::hidden('number', @$number? $number : '') !!}
                {!! Form::hidden('settings_id', @$settings_id? $settings_id : '') !!}

                @if(@$data[0]['id'])
                    {!! Form::hidden('id', @$data[0]['id']) !!}
                @endif
            </div>
            <div class="col-sm-3">
                {!! Form::label('date', 'Date:', []) !!}
                <small class="required">(Required)</small>
                <div class="input-group date">
                    {!! Form::text('date', @$generate_voucher_number? date('Y/m/d') : @$data[0]['date'], ['class' => 'form-control bs-datepicker-example','required','title'=>'select receipt voucher date']) !!}
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <div class="col-sm-3">
                {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
                {{--old('date', Carbon\Carbon::today()->format('Y/m/d'))--}}
                {!! Form::selectrange('year',2010,2030, @$generate_voucher_number? Input::old('year', date('Y')) : @$data[0]['year'],['required', 'class' => 'form-control','title'=>'select receipt voucher year']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
                {!! Form::selectrange('period', 1,12,@$generate_voucher_number? Input::old('period', date('m')) : @$data[0]['period'],['required', 'class' => 'form-control','title'=>'select receipt voucher month']) !!}
            </div>
        </div>
    </div>

    <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-3">
                {!! Form::label('hd_branch_id', 'Branch:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::Select('hd_branch_id', $branch_data, @$data[0]['branch_id'],['required', 'class' => 'form-control','title'=>'select receipt voucher branch']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
                <small class="narration">(Voucher Informations)</small>
                {!! Form::text('reference', @$data[0]['reference'], ['autofocus', 'class' => 'form-control','title'=>'enter narration for receipt voucher informations']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
                <small class="narration">(Note for Receipt Voucher Informations)</small>
                {!! Form::textarea('note', @$data[0]['note'], ['size' => '6x2', 'class' => 'form-control','title'=>'enter receipt voucher note']) !!}
            </div>
        </div>
    </div>

    <hr>
    {{--------------Voucher Details------------------------}}

    <div>
        <h4 class="text-center">Debit/Credit</h4>
    </div>

    <table width="100%" id="update-table" class="table" cellpadding="0" cellspacing="0">
        <thead  style="background-color: whitesmoke;">
        <tr>
            <th>Chat Of Accounts:</th>
            <th></th>
            <th>Branch:</th>
            <th>Currency:</th>
            <th>Debit:</th>
            <th>Credit:</th>
        </tr>
        </thead>
        <tbody>

        @if(@$data[0]['relVoucherDetail'])
            @foreach($data[0]['relVoucherDetail'] as $value_dt )
                <tr>
                    <td>
                        <div>
                            {!! Form::text('ac_title[]', @$value_dt['relChartOfAccounts']['title'], ['class'=>'update-auto-search-ac','placeholder'=>'Search By account head or code','title'=>'type your require account head and code']) !!}
                            {{--{!! Form::text('dt_id[]',@$value_dt['relChartOfAccounts']['id'], ['class'=>'coa-id-val']) !!}--}}
                            {!! Form::hidden('dt_id[]',@$value_dt['id'], ['class'=>'update-coa-id-val']) !!}
                        </div>
                    </td>
                    <td>
                        <div> {!! Form::hidden('coa_id[]',@$value_dt['coa_id'], ['class'=>'coa-id-val']) !!} </div>
                    </td>
                    <td>
                        <div>
                            {!! Form::Select('branch_id[]', $branch_data, @$value_dt['branch_id'],['required', 'class' => 'form-control','title'=>'select branch name']) !!}
                        </div>
                    </td>
                    <td>
                        <div>
                            {!! Form::Select('currency_id[]', $currency_data, @$value_dt['currency_id'], ['id'=>'currency-data', 'class' => 'form-control','required','title'=>'select currency name']) !!}
                        </div>
                    </td>
                    <td>
                        <div>
                            {!! Form::text('debit[]', @$value_dt['prime_amount']>0?$value_dt['prime_amount']:'', ['class' => 'form-control', 'title'=>'enter debit']) !!}
                        </div>
                    </td>
                    <td>
                        <div>
                            {!! Form::text('credit[]', @$value_dt['prime_amount']< 0? substr($value_dt['prime_amount'], 1):'', ['title'=>'enter credit', 'class' => 'form-control']) !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif

        <tr>
            <td>
                <div>
                    {!! Form::text('ac_title[]', Input::old('coa_id'), ['class'=>'upd-auto-search-ac form-control','placeholder'=>'Search By account head or code','title'=>'type your require account head and code']) !!}
                </div>
            </td>
            <td>
                <div> {!! Form::hidden('coa_id[]',null, ['class'=>'upd-coa-id-val']) !!} </div>
            </td>
            <td>
                <div>
                    {!! Form::Select('branch_id[]', $branch_data, Input::old('branch_id'),[ 'class' => 'form-control','title'=>'select branch name']) !!}
                </div>
            </td>
            <td>
                <div>
                    {!! Form::Select('currency_id[]', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','class' => 'form-control','title'=>'select currency name']) !!}
                </div>
            </td>

            <td>
                <div>
                    {!! Form::text('debit[]', Input::old('debit'), ['title'=>'enter debit', 'class' => 'form-control']) !!}
                </div>
            </td>

            <td>
                <div>
                    {!! Form::text('credit[]', Input::old('credit'), ['title'=>'enter credit', 'class' => 'form-control']) !!}
                </div>
            </td>
        </tr>
        </tbody>
    </table>

</div>

<div class="panel-heading help-text-color message-width">

    @if(isset($status['status']))
        @if(@$status['status'] == 'balanced')
            <h4 class="balanced-text-color" style="background-color:lightblue">
                <strong>The Receipt Voucher is Balanced.</strong>
                <a href="{{route('journal-post',@$status['voucher_number'])}}" class="btn btn-primary " title=""><strong class="text-center">POST to Ledger</strong></a>
            </h4>
        @elseif(@$status['status'] == 'posted')
            <h4 class="text-dark-green">
                <strong>Receipt Voucher({{@$status['voucher_number']}}) is Posted.</strong>
            </h4>
        @else
            <h4 class="warning-report-text-color">
                <strong>WARNING Report :</strong>
                <span class="required"><strong>The receipt voucher must be balance ie. debits equal to credits before it can be processed.</strong></span>
            </h4>
        @endif
    @else
        <h4 class="warning-report-text-color">
            <strong>WARNING Report :</strong>
            <span class="required"><strong>The receipt voucher must be balance ie. debits equal to credits before it can be processed.</strong></span>
        </h4>
    @endif
</div>

<div class="modal-footer">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save receipt voucher information']) !!}&nbsp;
    <a href="{{route('receipt-voucher')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form" onclick="close_modal();">Close</a>
</div>

{!! Form::close() !!}

<script>
    function close_modal(){
        document.getElementById('addData').style.visibility="hidden";
        document.getElementById('etsbModal').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
    }
</script>

@include('accounts::receipt_voucher.update_script')