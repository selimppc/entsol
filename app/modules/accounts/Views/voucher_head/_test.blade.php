<link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >


<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('assets/admin/js/demo.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ URL::asset('assets/admin/js/validation.js') }}"></script>--}}

<table width="100%" id="table" class="table" border="1" cellpadding="0" cellspacing="0">
    <thead  style="background-color: white">
    <tr>
        <th>Chat Of Accounts:</th>
        <th>Currency:</th>
        <th>Exchange Rate:</th>
    </tr>
    </thead>
    <tr>
        <td style="width:250px;">
            <div>
                {!! Form::text('ac_title', Input::old('coa_id'), ['id'=>'auto-search-ac','required','placeholder'=>'Search By Name of Chart of account OR account-code','autofocus','title'=>'type your require chart of account "code" or "title" then select one and press enter','style'=>'width:250px;']) !!}
                {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}
            </div>
        </td>
        <td style="width:500px;">
            <div>
                {!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','required','title'=>'select currency name','style'=>'width:500px;']) !!}
            </div>
        </td>
        <td style="width:190px;">
            <div>
                {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'ex-rate','class' => '','readonly','required','title'=>'disabled field ! exchange rate auto populate by select currency','style'=>'width:200px']) !!}
            </div>
        </td>
</table>



<script>
    $(document).on("focus",'#table tr:last-child td:last-child',function() {
        //append the new row here.
        var table = $("#table");

        table.append('<tr>\
		<td style="width:250px;"><div> {!! Form::text('ac_title', Input::old('coa_id'), ['id'=>'auto-search-ac','required','placeholder'=>'Search By Name of Chart of account OR account-code','autofocus','title'=>'type your require chart of account "code" or "title" then select one and press enter','style'=>'width:250px;']) !!}\
                {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}</div>\
         </td>\
		<td style="width:500px;"><div>{!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'xxx','required','style'=>'width:500px;','onclick'=>"myFunction()"]) !!}</div>\
		</td>\
		<td style="width:90px;"><div> {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'xyz','class' => '','readonly','required','title'=>'disabled field ! exchange rate auto populate by select currency','style'=>'width:200px']) !!}</div>\
		</td>\
		</tr>');
    });

</script>

<script>
    function myFunction() {

        var curr_id = $('select[id=xxx]').val();

        $.ajax({
            url: "{{Route('exchange-rate')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',currency_id: curr_id },
            success: function(data){
                $('#xyz').val(data);
            }
        });
    }

</script>

@include('accounts::voucher_detail._script')