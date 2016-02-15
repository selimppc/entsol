<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

{!! Form::hidden('voucher_head_id',$id) !!}

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">

        <div class="col-sm-12">

            {!! Form::label('ac_title', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('ac_title', Input::old('coa_id'), ['id'=>'auto-search-ac','class' => 'form-control','required','placeholder'=>'Search By Name of Chart of account OR account-code','autofocus','title'=>'type your require chart of account "code" or "title" then select one and press enter']) !!}
            {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}
            {{--<select id="coa_id" name="coa_id" class="form-control select2-offscreen">
                @foreach ( $attributes as $key => $attr )
                    <optgroup label="{{strtoupper($key)}}">
                        @foreach ( $attr as $id => $values )
                            <option value="{{$id}}">{{$values}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>--}}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('sub_account_code', 'Sub Account Code:', ['class' => 'control-label']) !!}
            <small>(Optional)</small><br>
            <small class="narration">Resource Person/Organization</small>
            {!! Form::text('sub_account_code', Input::old('sub_account_code'), ['class' => 'form-control','title'=>'enter sub account code']) !!}
        </div>
        <div class="col-sm-6">
            <br>
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','title'=>'select branch name']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','class' => 'form-control','required','title'=>'select currency name']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'ex-rate','class' => 'form-control','readonly','required','title'=>'disabled field ! exchange rate auto populate by select currency']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('amount', 'Amount(Debit/Credit):', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small><br>
            <small class="narration">For credit add minus sign(-) before numeric digit(s).</small>
            {!! Form::text('prime_amount', Input::old('prime_amount'), ['class' => 'form-control','required','title'=>"enter debit/credit amount : for debit amount enter (+) value example : 100, for credit amount enter (-) value example : -100"]) !!}
        </div>
        <div class="col-sm-6">
            <br>
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required','title'=>'select status active']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3','title'=>'enter note for voucher details information']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save voucher details information']) !!}
    <a href="" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form" style="">Close</a>
</div>

@include('accounts::voucher_detail._script')


