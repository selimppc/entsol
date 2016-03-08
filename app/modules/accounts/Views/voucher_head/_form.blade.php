
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<style>
    table tr td{
        padding-right: 0;
        padding-left: 0;
        padding: -3px;
    }

    table tr td input, table tr td select{
        width: 100%;
        padding: 2px;
    }
    .form-group{
        margin-bottom: 0px;
    }

    .form-group input, .form-group select, .form-group textarea{
        width: 100%;
        padding: 2px;
    }


</style>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::hidden('account_type', 'journal-voucher') !!}
        <div class="col-sm-3">
            {!! Form::label('voucher_number', 'Voucher Number:', []) !!}
            <small class="narration">(Auto Generated)</small>
            {!! Form::text('voucher_number', @$generate_voucher_number? $generate_voucher_number : @$data[0]['voucher_number'], ['required','readonly','style'=>'font-weight:bold']) !!}
            {!! Form::hidden('number', @$number? $number : 0) !!}
            {!! Form::hidden('settings_id', @$settings_id? $settings_id : 0) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('date', 'Date:', []) !!}
            <small class="required">*</small>
            <div class="input-group date">
                {!! Form::text('date', @$generate_voucher_number? date('Y/m/d') : @$data[0]['date'], ['class' => 'bs-datepicker-component','required','title'=>'select journal voucher date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-3">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {{--old('date', Carbon\Carbon::today()->format('Y/m/d'))--}}
            {!! Form::selectrange('year',2010,2030, @$generate_voucher_number? Input::old('year', date('Y')) : @$data[0]['year'],['required','title'=>'select journal voucher year']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectrange('period', 1,12,@$generate_voucher_number? Input::old('period', date('m')) : @$data[0]['period'],['required','title'=>'select journal voucher month']) !!}
        </div>


    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-3">
            {!! Form::label('hd_branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('hd_branch_id', $branch_data, @$data[0]['branch_id'],['required','title'=>'select journal voucher branch']) !!}
        </div>
        <div class="col-sm-3">
            {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
            <small class="narration">(Voucher Informations)</small>
            {!! Form::text('reference', @$data[0]['reference'], ['autofocus','title'=>'enter narration for journal voucher informations']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            <small class="narration">(Note for Journal Voucher Informations)</small>
            {!! Form::textarea('note', @$data[0]['note'], ['size' => '6x2','title'=>'enter journal voucher note']) !!}
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

                        {!! Form::text('ac_title[]', @$value_dt['relChartOfAccounts']['title'], ['class'=>'auto-search-ac','required','placeholder'=>'Search By account head or code','title'=>'type your require account head and code']) !!}

                    </div>
                </td>
                <td>
                    <div> {!! Form::hidden('coa_id[]',@$value_dt['coa_id'], ['class'=>'coa-id-val']) !!} </div>
                </td>
                <td>
                    <div>
                        {!! Form::Select('branch_id[]', $branch_data, @$value_dt['branch_id'],['required','title'=>'select branch name']) !!}
                    </div>
                </td>
                <td>
                    <div>
                        {!! Form::Select('currency_id[]', $currency_data, @$value_dt['currency_id'], ['id'=>'currency-data','required','title'=>'select currency name']) !!}
                    </div>
                </td>

                <td>
                    <div>
                        {!! Form::text('debit[]', @$value_dt['prime_amount']>0?$value_dt['prime_amount']:'', ['title'=>'enter debit']) !!}
                    </div>
                </td>

                <td>
                    <div>
                        {!! Form::text('credit[]', @$value_dt['prime_amount']< 0? substr($value_dt['prime_amount'], 1):'', ['title'=>'enter credit']) !!}
                    </div>
                </td>
            </tr>
        @endforeach
    @endif

    <tr>
        <td>
            <div>

                {!! Form::text('ac_title[]', Input::old('coa_id'), ['class'=>'auto-search-ac','required','placeholder'=>'Search By account head or code','title'=>'type your require account head and code']) !!}

            </div>
        </td>
        <td>
            <div> {!! Form::hidden('coa_id[]',null, ['class'=>'coa-id-val']) !!} </div>
        </td>
        <td>
            <div>
                {!! Form::Select('branch_id[]', $branch_data, Input::old('branch_id'),['required','title'=>'select branch name']) !!}
            </div>
        </td>
        <td>
            <div>
                {!! Form::Select('currency_id[]', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','required','title'=>'select currency name']) !!}
            </div>
        </td>

        <td>
            <div>
                {!! Form::text('debit[]', Input::old('debit'), ['title'=>'enter debit']) !!}
            </div>
        </td>

        <td>
            <div>
                {!! Form::text('credit[]', Input::old('credit'), ['title'=>'enter credit']) !!}
            </div>
        </td>
    </tr>
    </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="footer-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save journal voucher information']) !!}&nbsp;
    <a href="{{route('voucher-head')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>




<script>

$(".auto-search-ac").autocomplete({
    source: "{{Route('coa-list')}}",
    minLength: 1,
    select: function( event, ui ) {
        $('.auto-search-ac').val(ui.item.value);
        $('.coa-id-val').val(ui.item.coa_id);
    }
});

$(document).on("focus",'#table tr:last-child td:last-child',function(e) {

         e.preventDefault();
            //append the new row here.
            var table = $("#table");
            var element = '<tr>\
		<td><div> {!! Form::text('ac_title[]', Input::old('coa_id'), ['class'=>'ac-auto-search-ac','required','placeholder'=>'Search By account head or code','autofocus','title'=>'type your require account head and code']) !!}\
         </td>\
         <td class="hide-td"><div> </div></td>\
		<td><div>{!! Form::Select('branch_id[]', $branch_data, Input::old('branch_id'),['required','title'=>'select branch name']) !!}</div>\
		</td>\
		<td><div>{!! Form::Select('currency_id[]', $currency_data, Input::old('currency_id'), ['class'=>'curr','required','onclick'=>"myFunction()"]) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('debit[]', Input::old('debit'), ['title'=>'enter debit']) !!}</div>\
		</td>\
		<td>\
		<div>{!! Form::text('credit[]', Input::old('credit'), ['title'=>'enter credit']) !!}</div>\
		</td>\
		</tr>';

    table.append(element);

    console.log($("#table tr:last-child").find(".ac-auto-search-ac"));
    //console.log($("#table tr:last-child").find(".coa-id-val"));
    $("#table tr:last-child").find(".ac-auto-search-ac").autocomplete({
        source: "{{Route('coa-list')}}",
        minLength: 1,
        select: function(event, ui) {

            $('<td width="5"><div><input type="hidden" name="coa_id[]"  value=" '+ui.item.coa_id+' " ></div></td>').insertAfter($(this).closest('td'));
            $(".hide-td").css("display", "none");
        }
    });



});

/*
function myFunction() {

    var curr_id = $('select[class=curr]').val();

    $.ajax({
        url: "{{--{{Route('exchange-rate')}}--}}",
        type: 'POST',
        data: {_token: '{!! csrf_token() !!}',currency_id: curr_id },
        success: function(data){
            $('#rate-of-ex').val(data);
        }
    });
}*/

</script>




<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
@include('accounts::voucher_detail._script')

