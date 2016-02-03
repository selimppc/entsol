<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="narration">(Journal Voucher Type Selected)</small>
            {!! Form::text('account_type', 'journal-voucher', ['class' => 'form-control','required','readonly','style'=>'font-weight:bold']) !!}
            {{--{!! Form::Select('account_type',array('journal-voucher'=>'Journal Voucher'),Input::old('account_type'),['class'=>'form-control','readonly','style'=>'font-weight:bold']) !!}--}}
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
                {!! Form::text('date', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','required']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::label('reference', 'Reference:', ['class' => 'control-label']) !!}
            <small class="narration">(Narration for Journal Voucher Informations)</small>
            {!! Form::text('reference', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
            {{--old('date', Carbon\Carbon::today()->format('Y/m/d'))--}}
            {!! Form::selectrange('year',2010,2030, Input::old('year', date('Y')),['class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectrange('period', 1,12,Input::old('period', date('m')),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="narration">(Open status Selected)</small>
            {!! Form::Select('status',array('open'=>'Open'),Input::old('status'),['class'=>'form-control ','required','readonly']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            <small class="narration">(Note for Journal Voucher Informations)</small>
            {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}&nbsp;
    <a href="{{route('voucher-head')}}" class=" btn btn-default">Close</a>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>

