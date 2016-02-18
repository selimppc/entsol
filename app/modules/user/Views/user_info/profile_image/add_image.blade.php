
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('image', 'Profile Picture:', ['class' => 'control-label']) !!}
            <p class="narration">System will allow these types of image(png,gif,jpeg,jpg Format) </p>
            @if(isset($model))
                <img src="{{ URL::to($model->thumbnail) }}" width="100px" height="100px">
            @endif
            {!! Form::file('image',Input::old('image'), [ 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>


<div class="form-margin-btn">
    {!! Form::submit('Save', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save branch information']) !!}
    <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true" data-placement="top" data-content="click close button for close this entry form">Close</button>
</div>