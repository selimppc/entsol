<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
            {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Enter Buyer Title','required','autofocus', 'title'=>'Enter Buyer Title']) !!}
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

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
            {!! Form::textarea('address', Input::old('address'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'Address']) !!}
        </div>
    </div>
</div>

<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('contact_person', 'Contact Person:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('contact_person',Input::old('title'),['class' => 'form-control','placeholder'=>'Enter Buyer Title','required','autofocus', 'title'=>'Enter contact person']) !!}
       </div>
        <div class="col-sm-6">
            {!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
            {!! Form::text('phone',Input::old('phone'),['class' => 'form-control','placeholder'=>'Enter phone','required','autofocus', 'title'=>'Enter phone']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('fax', 'Fax:', ['class' => 'control-label']) !!}
            {!! Form::text('fax',Input::old('fax'),['class' => 'form-control','placeholder'=>'Enter Fax','required','autofocus', 'title'=>'Enter Fax']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::email('email',Input::old('email'),['class' => 'form-control','placeholder'=>'Email Address','required', 'title'=>'Enter Email Address']) !!}
        </div>
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}&nbsp;
    <a href="{{route('buyer')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

