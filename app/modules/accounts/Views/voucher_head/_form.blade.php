
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::hidden('account_type', 'journal-voucher') !!}
        <div class="col-sm-3">
            {!! Form::label('voucher_number', 'Voucher Number:', ['class' => 'control-label']) !!}
            <small class="narration">(Auto Generated)</small>
            {!! Form::text('voucher_number', @$generate_voucher_number? $generate_voucher_number : Input::old('voucher_number'), ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
            {!! Form::hidden('number', @$number? $number : 0) !!}
            {!! Form::hidden('settings_id', @$settings_id? $settings_id : 0) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('date', 'Date:', ['class' => 'control-label']) !!}
            <small class="required">*</small>
            <div class="input-group date">
                {!! Form::text('date', @$generate_voucher_number? date('Y/m/d') : Input::old('date'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select journal voucher date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-3">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {{--old('date', Carbon\Carbon::today()->format('Y/m/d'))--}}
            {!! Form::selectrange('year',2010,2030, @$generate_voucher_number? Input::old('year', date('Y')) : Input::old('year'),['class' => 'form-control','required','title'=>'select journal voucher year']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectrange('period', 1,12,@$generate_voucher_number? Input::old('period', date('m')) : Input::old('period'),['class' => 'form-control','required','title'=>'select journal voucher month']) !!}
        </div>
        {{--<div class="col-sm-3">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="narration">(Open status Selected)</small>
            {!! Form::text('status', @$generate_voucher_number? ucfirst('open') : Input::old('status'), ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
        </div>--}}

    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','title'=>'select journal voucher branch']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
            <small class="narration">(Voucher Informations)</small>
            {!! Form::text('reference', Input::old('reference'), ['class' => 'form-control','autofocus','title'=>'enter narration for journal voucher informations']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            <small class="narration">(Note for Journal Voucher Informations)</small>
            {!! Form::textarea('note', Input::old('note'), ['class' => 'form-control','size' => '6x2','title'=>'enter journal voucher note']) !!}
        </div>
    </div>
</div>

<hr>
{{--------------Voucher Details------------------------}}

<div>
    <h4 class="text-center">Debit/Credit</h4>
</div>

<table width="100%" id="table" class="table" border="1" cellpadding="0" cellspacing="0">
    <thead  style="background-color: white">
    <tr>
        <th>Chat Of Accounts:</th>
        <th>Branch:</th>
        <th>Currency:</th>
        <th>Exchange Rate:</th>
        <th>Debit:</th>
        <th>Credit:</th>
    </tr>
    </thead>
    <tr>
        <td style="width:250px;">
            <div>
                {!! Form::text('ac_title', Input::old('coa_id'), ['id'=>'auto-search-ac','required','placeholder'=>'Search By Name of Chart of account OR account-code','autofocus','title'=>'type your require chart of account "code" or "title" then select one and press enter','style'=>'width:250px;']) !!}
                {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}
            </div>
        </td>
        <td style="width:150px;">
            <div>
                {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['required','title'=>'select branch name','style'=>'width:150px;']) !!}
            </div>
        </td>
        <td style="width: 150px;">
            <div>
                {!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','required','title'=>'select currency name','style'=>'width:170px;']) !!}
            </div>
        </td>
        <td style="width:90px;">
            <div>
                {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'ex-rate','class' => '','readonly','required','title'=>'disabled field ! exchange rate auto populate by select currency','style'=>'width:90px']) !!}
            </div>
        </td>
        <td style="width:60px;">
            <div>
                {!! Form::text('debit', Input::old('debit'), ['title'=>'enter debit']) !!}
            </div>
        </td>

        <td style="width:60px;">
            <div>
                {!! Form::text('credit', Input::old('credit'), ['title'=>'enter credit']) !!}
            </div>
        </td>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="footer-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save journal voucher information']) !!}&nbsp;
    <a href="{{route('voucher-head')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>


Username: <input type="text" name="user" />
<a href="#" class="reset">reset</a>


<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>

<script>
$(document).on("focus",'#table tr:last-child td:last-child',function() {
            //append the new row here.
            var table = $("#table");

            table.append('<tr>\
		<td style="width:250px;"><div> {!! Form::text('ac_title', Input::old('coa_id'), ['id'=>'auto-search-ac','required','placeholder'=>'Search By Name of Chart of account OR account-code','autofocus','title'=>'type your require chart of account "code" or "title" then select one and press enter','style'=>'width:250px;']) !!}\
                {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}</div>\
         </td>\
		<td><div>{!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['required','title'=>'select branch name','style'=>'width:150px;']) !!}</div>\
		</td>\
		<td><div>{!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['class'=>'curr','required','style'=>'width:170px;','onclick'=>"myFunction()"]) !!}</div>\
		</td>\
		<td style="width:90px;"><div> {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'rate-of-ex','class' => '','readonly','required','title'=>'disabled field ! exchange rate auto populate by select currency','style'=>'width:90px']) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('debit', Input::old('debit'), ['title'=>'enter debit']) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('credit', Input::old('credit'), ['title'=>'enter credit']) !!}</div>\
		</td>\
		</tr>');
});

</script>
<script>
    function myFunction() {

        var curr_id = $('select[class=curr]').val();

        $.ajax({
            url: "{{Route('exchange-rate')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',currency_id: curr_id },
            success: function(data){
                $('#rate-of-ex').val(data);
            }
        });
    }

</script>

@include('accounts::voucher_detail._script')

