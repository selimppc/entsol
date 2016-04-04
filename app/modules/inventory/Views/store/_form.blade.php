<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
        {!! Form::label('business_id', 'Business') !!}
        <small class="required">(Required)</small>
        {!!Form::select('business_id',$business,Input::old('business_id'),['class'=>'form-control','required','title'=>'Select Business'])  !!}
         </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Enter Buyer Title','required','autofocus', 'title'=>'Enter Title']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('code',Input::old('code'),['class' => 'form-control','placeholder'=>'','required','autofocus', 'title'=>'Enter Code']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', Input::old('description'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('phone',Input::old('phone'),['class' => 'form-control','placeholder'=>'Enter phone','required','autofocus', 'title'=>'Enter phone']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
            {!! Form::text('fax',Input::old('fax'),['class' => 'form-control','placeholder'=>'Enter Fax','autofocus', 'title'=>'Enter Fax']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::email('email',Input::old('email'),['class' => 'form-control','placeholder'=>'Email Address','required', 'title'=>'Enter Email Address']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('web', 'web:', ['class' => 'control-label']) !!}
            {!! Form::text('web',Input::old('web'),['class' => 'form-control','placeholder'=>'Enter Web','autofocus', 'title'=>'Enter Web']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('contact_person', 'Contact Person:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('contact_person',Input::old('contact_person'),['class' => 'form-control','placeholder'=>'Enter contact person','required','autofocus', 'title'=>'Enter contact person']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('contact_name', 'Contact Person:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('contact_name',Input::old('contact_name'),['class' => 'form-control','placeholder'=>'Enter contact name','required','autofocus', 'title'=>'Enter contact name']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}&nbsp;
    <a href="{{route('inv-store')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

