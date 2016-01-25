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

<p> &nbsp; </p>

{{--<a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>--}}
{{--<a href=""  class="btn btn-default" type="button"> Close </a>
{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}--}}

<div class="modal-footer">
    <a href="{{ URL::previous()}}"  class="btn btn-default" type="button"> Close </a>
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
</div>

