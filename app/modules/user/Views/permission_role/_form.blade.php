
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('role_id', 'Role :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($role_id)>0)
                {!! Form::select('role_id', $role_id,Input::old('role_id'),['id'=>'role_id','style'=>'text-transform:capitalize','class' => 'form-control','required','title'=>'select  role']) !!}
                <span class="required" id='required-message'></span>
            @else
                {!! Form::text('role_id', 'No role available',['style'=>'text-transform:capitalize','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
    </div>
</div>

{!! Form::hidden('status','active') !!}
<p> &nbsp; </p>

<div class="form-margin-btn">

  {{--{!! Form::submit('Assign Permission', ['class' => 'btn btn-primary']) !!}--}}

    <button type="submit" id="btn" class="btn btn-primary" data-toggle="modal" data-target="">Assign Permission</button>

    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>

</div>

{{--Second modal--}}

<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel">Assign Permission<span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field. <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
              {!! Form::open(['route'=> ['post-permission']]) !!}
                     @include('user::permission_role._duallistbox_form')
              {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>


@if(isset($permission))
    <script type="text/javascript">
        $(document).ready(function(){
            $("#Modal2").modal();
        });
    </script>
@endif




