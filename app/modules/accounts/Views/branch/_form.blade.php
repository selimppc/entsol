@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        {!! Form::label('code', 'Code:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('code', null, ['id'=>'code', 'class' => 'form-control','required']) !!}
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
        {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        @if(count($cat_gallery_id)>0)
            {!! Form::select('currency_id', $cat_gallery_id,Input::old('currency_id'),['class' => 'form-control','required']) !!}
        @else
            {!! Form::text('currency_id', 'No Category ID available',['id'=>'currency_id','class' => 'form-control','required','disabled']) !!}
        @endif
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
        {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
        {!! Form::input('number', 'exchange_rate', null, ['id'=>'exchange_rate', 'class' => 'form-control', 'step'=>'any']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>

<p> &nbsp; </p>

{{--<a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>--}}
{{--<a href=""  class="btn btn-default" type="button"> Close </a>
{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}--}}

<div class="modal-footer">
    <a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>

