<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>--}}

{!! Form::hidden('voucher_head_id',$id) !!}

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="help-text-top">
            <em>You will get account code and exchange rate according to Chart of Accounts and Currency.</em>
        </div>

        <div class="col-sm-6">

            {!! Form::label('coa_id', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
          {{--  {!! Form::Select('coa_id', [''=>'Select Chart Of Account']+$attributes,Input::old('coa_id'), ['id'=>'coa-account','class' => 'form-control','required']) !!}--}}

            <select id="coa_id" name="coa_id" class="form-control select2-offscreen">
                @foreach ( $attributes as $key => $attr )
                    <optgroup label="{{strtoupper($key)}}">
                        @foreach ( $attr as $id => $values )
                            <option value="{{$id}}">{{$values}}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>

        </div>
        <div class="col-sm-6">
            {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
            {!! Form::text('account_code', Input::old('account_code'), ['id'=>'auto-search-ac','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('sub_account_code', 'Sub Account Code:', ['class' => 'control-label']) !!}
            <small>(Optional)</small><br>
            <small class="narration">Resource Person/Organization</small>
            {!! Form::text('sub_account_code', Input::old('sub_account_code'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
            <br>
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'currency-data','class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'ex-rate','class' => 'form-control','readonly','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('amount', 'Amount(Debit/Credit):', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small><br>
            <small class="narration">For credit add minus sign(-) before numeric digit(s).</small>
            {!! Form::text('amount', Input::old('amount'), ['class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            <br>
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3']) !!}
        </div>
    </div>
</div>

<div class="ui-widget">
    <p>Type two letter for e.g:ja,sc etc</p>
    <label for="automplete-3">Tags: </label>
    <input id="automplete-3">
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
    <a href="" class=" btn btn-default" style="">Close</a>
</div>

@include('accounts::voucher_detail._script')


<script>


</script>