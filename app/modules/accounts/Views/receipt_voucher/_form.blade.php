<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="narration">(Receipt Voucher Type Selected)</small>
            {!! Form::text('account_type', ucfirst('receipt-voucher'), ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('voucher_number', 'Voucher Number:', ['class' => 'control-label']) !!}
            <small class="narration">(Auto Generated From Settings)</small>
            {!! Form::text('voucher_number', @$generate_voucher_number? $generate_voucher_number : Input::old('voucher_number'), ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
            {!! Form::hidden('number', @$number? $number : 0) !!}
            {!! Form::hidden('settings_id', @$settings_id? $settings_id : 0) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('date', 'Date:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            <div class="input-group date">
                {!! Form::text('date', @$generate_voucher_number? date('Y/m/d') : Input::old('date'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select receipt voucher date']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
            <small class="narration">(Narration for Receipt Voucher Informations)</small>
            {!! Form::text('reference', Input::old('reference'), ['class' => 'form-control','autofocus','title'=>'enter narration for receipt voucher informations']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {{--old('date', Carbon\Carbon::today()->format('Y/m/d'))--}}
            {!! Form::selectrange('year',2010,2030, @$generate_voucher_number? Input::old('year', date('Y')) : Input::old('year'),['class' => 'form-control','required','title'=>'select receipt voucher year']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectrange('period', 1,12,@$generate_voucher_number? Input::old('period', date('m')) : Input::old('period'),['class' => 'form-control','required','title'=>'select receipt voucher month']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','title'=>'select receipt voucher branch']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="narration">(Open status Selected)</small>
            {!! Form::text('status', @$generate_voucher_number? ucfirst('open') : Input::old('status'), ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
            {{--{!! Form::Select('status',array('open'=>'Open'),Input::old('status'),['class'=>'form-control ','required','readonly']) !!}--}}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            <small class="narration">(Note for Receipt Voucher Informations)</small>
            {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3','title'=>'enter receipt voucher note']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save receipt voucher information']) !!}&nbsp;
    <a href="{{route('receipt-voucher')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>

