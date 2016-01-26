@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('account_type',array('account-payable'=>'Account Payable','account-receivable'=>'Account Receivable','account-adjustment'=>'account Adjustment','journal-vouche'=>'Journal Voucher','receipt-voucher'=>'Receipt Voucher','reverse-entry'=>'Reverse Entry'),Input::old('account_type'),['class'=>'form-control ','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('date', 'Date:', ['class' => 'control-label']) !!}
        <div class="input-group date" id="bs-datepicker-component">
            {!! Form::text('date', null, ['class' => 'form-control','required']) !!}
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
        {!! Form::text('reference', null, ['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
        {!! Form::text('year',null, ['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
        {!! Form::text('period', null, ['class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
        {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required']) !!}
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

<!-- Javascript -->
<script>
    init.push(function () {
        var options = {
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $('#bs-datepicker-example').datepicker(options);

        $('#bs-datepicker-component').datepicker();

        var options2 = {
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
    });
</script>

<!-- / Javascript -->
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);
</script>