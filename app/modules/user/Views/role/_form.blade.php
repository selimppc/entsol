<div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">

            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            {!! Form::text('title',Input::old('title'),['class' => 'form-control','placeholder'=>'Role Name','required','autofocus', 'title'=>'Enter Role Name']) !!}

            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="narration">(Active status Selected)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}

    </div>
</div>

<div class="footer-form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
    <a href="{{route('role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

