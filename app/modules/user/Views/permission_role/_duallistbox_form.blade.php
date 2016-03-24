<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/multiselect.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/multiselect.min.js') }}"></script>


<div class="row">
    <div class="col-sm-5">
        <select name="permission_id" id="optgroup" class="form-control" size="20" multiple="multiple">
            @foreach($not_exists_permission as $key=>$value)
                   <option value="{{$key}}">{{$value}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-2">
        <button type="button" id="optgroup_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
        <button type="button" id="optgroup_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="optgroup_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        <button type="button" id="optgroup_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
    </div>

    <div class="form-group col-sm-5">
        {{--{!! Form::label('to', 'Select Permission :', ['class' => 'control-label']) !!}
        {!! Form::select('to',$exists_permission,Input::old('permission_id'),['class' => 'route-list','id'=>'optgroup_to','multiple' => 'multiple','size'=>'']) !!}--}}

        <select name="permissions_id" id="optgroup_to" class="form-control" size="20" multiple="multiple">
            @foreach($exists_permission as $ex_per)
                <option value="">{{$ex_per}}</option>
            @endforeach
        </select>
    </div>

</div>


<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save information']) !!}
    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>

<p> &nbsp; </p>


<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#optgroup").multiselect({
            search: {
                left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
            }
        });
    });
</script>










