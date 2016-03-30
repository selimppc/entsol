<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Enter Buyer Title','required','autofocus', 'title'=>'Enter Buyer Title']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('country_id', 'Country') !!}
        <small class="required">(Required)</small>
        {!!Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required','title'=>'Select Country Name'])  !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', Input::old('description'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('details', 'Details:', ['class' => 'control-label']) !!}
        {!! Form::textarea('details', Input::old('details'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'']) !!}
    </div>
</div>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}&nbsp;
    <a href="{{route('buyer')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

