
<link href="{{ URL::asset('assets/admin/css/bootstrap-duallistbox.css') }}" rel="stylesheet" type="text/css" >


<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="form-group col-sm-12">
            {!! Form::label('permission_id', 'Select Permission :', ['class' => 'control-label']) !!}
            {!! Form::select('permission_id',$permission_id,Input::old('permission_id'),['id' => 'route-list','class'=>'permission_list','required'=>'required','multiple' => 'multiple']) !!}
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.bootstrap-duallistbox.js') }}"></script>

<script type="text/javascript">
    $(".permission_list").bootstrapDualListbox();
</script>