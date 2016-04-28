<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<img src="assets/admin/img/loading.gif" id="gif" style="display: block; margin: 0 auto; width: 100px; visibility: hidden;">

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('type',array(''=>'select Accounts Type','account-payable'=>'Account Payable','account-receivable'=>'Account Receivable','account-adjustment'=>'Account Adjustment','journal-voucher'=>'Journal Voucher','payment-voucher'=>'Payment Voucher','receipt-voucher'=>'Receipt Voucher','reverse-entry'=>'Reverse Entry'),Input::old('type'),['class'=>'form-control ','required','autofocus','title'=>'select accounts type, example :: journal voucher']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('code', Input::old('code'), ['id'=>'code', 'class' => 'form-control','maxlength'=>'4','minlength'=>'4','required', 'style'=>'text-transform:uppercase','title'=>'enter settings code, example :: -JV']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', Input::old('title'), ['id'=>'title', 'class' => 'form-control','required', 'style'=>'text-transform:capitalize','title'=>'enter settings title, example :: journal voucher']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('last_number', 'Last Number:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','last_number', isset($data->last_number)? Input::old('last_number') : 0 , ['id'=>'last_number', 'class' => 'form-control','required','title'=>'enter settings last number, example :: first time must enter 0']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('increment', 'Increment:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::input('number','increment', Input::old('increment'), ['id'=>'increment', 'class' => 'form-control','required','title'=>'enter settings increment, example :: increment number add last number then generate next number']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class' => 'form-control','title'=>'choose active option']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>


<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save group one information']) !!}
    <a href="{{route('settings')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form" onclick="close_modal();">Close</a>
</div>


<script>
    function close_modal(){
        document.getElementById('addData').style.visibility="hidden";
        document.getElementById('etsbModal').style.visibility="hidden";
        document.getElementById('load').style.visibility="visible";
    }
</script>
