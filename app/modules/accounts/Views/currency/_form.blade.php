
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('code', null, ['id'=>'code', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
        {!! Form::input('number', 'exchange_rate', null, ['id'=>'exchange_rate', 'class' => 'form-control', 'step'=>'any']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<p> &nbsp; </p>

<div class="modal-footer">
    <a href="{{route('currency')}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>

