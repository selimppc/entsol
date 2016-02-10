<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('username', 'UserName:', ['class' => 'control-label']) !!}
            {!! Form::text('username',Input::old('username'),['class' => 'form-control','placeholder'=>'username','required', 'title'=>'Enter Username']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}
            {!! Form::email('email', Input::old('email'), ['class' => 'form-control','required','placeholder'=>'E-mail','title'=>'Enter User Email Address']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control','required','placeholder'=>'Password','title'=>'Enter User Password']) !!}
            </div>
        </div>
        <div class="col-sm-6">
           {{-- {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','placeholder'=>'Branch','title'=>'Enter User Branch']) !!}--}}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
            {!! Form::label('period', 'Period:', ['class' => 'control-label']) !!}
            {!! Form::selectrange('period', 1,12,Input::old('period', date('m')),['class' => 'form-control','required','title'=>'select journal voucher month']) !!}
        </div>
    </div>
</div>


<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
            <small class="narration">(Note for Journal Voucher Informations)</small>
            {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3','title'=>'enter journal voucher note']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save journal voucher information']) !!}&nbsp;
    <a href="{{route('user')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

