<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('voucher_head_id', 'Voucher Head:', ['class' => 'control-label']) !!}
        {!! Form::Select('voucher_head_id', $branch_head_data, Input::old('voucher_head_id'),['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('coa_id', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
        {!! Form::text('coa_id', $coa_data, Input::old('coa_id'), ['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('sub_account_code', 'Sub Account Code:', ['class' => 'control-label']) !!}
        {!! Form::text('sub_account_code', Input::old('sub_account_code'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
        {!! Form::text('currency_id', $currency_data, Input::old('currency_id'), ['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('exchage_rate', 'exchage_rate:', ['class' => 'control-label']) !!}
        {!! Form::text('exchage_rate', Input::old('exchage_rate'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('prime_amount', 'Prime Amount:', ['class' => 'control-label']) !!}
        {!! Form::text('prime_amount', Input::old('prime_amount'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('base_amount', 'Base Amount:', ['class' => 'control-label']) !!}
        {!! Form::text('base_amount', Input::old('base_amount'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('base_amount', 'Base Amount:', ['class' => 'control-label']) !!}
        {!! Form::text('base_amount', Input::old('base_amount'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
        {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
    </div>
</div>
<p> &nbsp; </p>

<div class="modal-footer">
    <a href="{{route('voucher-head')}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
