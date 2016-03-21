
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
    {{--<a class="btn btn-primary btn-xs" data-toggle="modal" data-placement="top" data-content="" id="modal-button">
       Assign Permission
    </a>--}}
    <a href="{{route('get-permission')}}" class=" btn btn-default" data-toggle="modal" data-target="#Modal" data-placement="top" data-content="click close button for close this entry form">Assign Permission</a>

    <a href="{{route('index-permission-role')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>


<div id="Modal" class="modal fade" tabindex="" role="dialog">
    <div class="modal-dialog modal-lg" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="click x button for close this entry form">×</button>
                <h4 class="modal-title" id="myModalLabel"> Permission <span style="color: #A54A7B" class="user-guideline" data-content="<em>Must Fill <b>Required</b> Field. <b>*</b> Put cursor on input field for more informations</em>"><font size="2">(?)</font> </span></h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=> ['post-permission']]) !!}
                    @include('user::permission_role._duallistbox_form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>




<script>
    $('#modal-button').click(function(){
       if($('#role_id').val()==''){
           $('#required-message').html('Please Select Role To Assign Permission');
       }else {
           $('#required-message').html('');
           var $modal  = $('#Modal').clone(true);
//           $modal.find('> div').addClass('modal-dialog modal-sm animated ' + $('#role_id').find(":selected").attr('value'));
           $modal.modal('show');
       }
    });
</script>

