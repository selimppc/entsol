
<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('account_type',array('account-payable'=>'Account Payable','account-receivable'=>'Account Receivable','account-adjustment'=>'account Adjustment','journal-vouche'=>'Journal Voucher','receipt-voucher'=>'Receipt Voucher','reverse-entry'=>'Reverse Entry'),Input::old('account_type'),['class'=>'form-control ','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required']) !!}
        </div>

    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('date', 'Date:', ['class' => 'control-label']) !!}
            <div class="input-group date">
                {!! Form::text('date', null, ['class' => 'form-control bs-datepicker-component','required']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {!! Form::select('year',$year, Input::old('year'),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectRange('period', 1, 12,Input::old('year'),['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
            {!! Form::text('reference', null, ['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="modal-footer">
    <a href="{{route('voucher-head')}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>
