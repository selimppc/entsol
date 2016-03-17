{{--{!! Form::select('permission_id', array(''=>'permission'),Input::old('permission_id'),['id'=>'avc','class' => 'form-control']) !!}--}}
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('role_id', 'Role :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($role_id)>0)
                {!! Form::select('role_id', $role_id,Input::old('role_id'),['id'=>'role_id','style'=>'text-transform:capitalize','class' => 'form-control','required','title'=>'select  role']) !!}
            @else
                {!! Form::text('role_id', 'No role available',['style'=>'text-transform:capitalize','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('permission_id', 'Select Permission :', ['class' => 'control-label']) !!}
                <div class="">
                    {!! Form::select('permission_id[]',$permission_id,null,['id' => 'route-list','class'=>'permission_list','required'=>'required','multiple' => 'multiple']) !!}
                </div>
            </div>
        </div>
</div>
{!! Form::hidden('status','active') !!}
<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save permission role information']) !!}
    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.bootstrap-duallistbox.js') }}"></script>
<script type="text/javascript">
    $(".permission_list").bootstrapDualListbox();
</script>

<script>

    $('select[id=role_id]').change(function () {
        var role_id =   $(this).val();
//alert(role_id);
        $.ajax({
            url: "{{Route('ajax-permission-role')}}",
            type: 'POST',
            data: {_token: '{!! csrf_token() !!}',role_id: role_id },
            success: function(data){
               // alert(data);
                var model = $('#route-list');
                model.empty();
                $.each(data, function(key, element) {
                    model.append("<option value='"+ key +"'>" + element + "</option>");
                });
            }

        });
    });

</script>


