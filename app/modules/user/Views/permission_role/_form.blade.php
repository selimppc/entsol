
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('role_id', 'Role :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($role_id)>0)
                {!! Form::select('role_id', $role_id,Input::old('role_id'),['class' => 'form-control','required','title'=>'select  role']) !!}
            @else
                {!! Form::text('role_id', 'No role available',['id'=>'role_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('module', 'Module Name:', ['class' => 'control-label']) !!}
            {{--{!! Form::select('module', $modules,Input::old('module'),['class' => 'form-control','title'=>'select module name']) !!}--}}

            <select class="form-control" name="option" id="select_module">
                <option value="" selected="selected" >Select One</option>
                <optgroup label="Admistration">
                    <option value="menu_panel"> Menu Panel </option>
                </optgroup>
                <optgroup label="User">
                    <option value="user_list"> User List</option>
                    <option value="role_user">Role User </option>
                    <option value="permission_role"> Permission Role</option>
                </optgroup>
                <optgroup label="Master Setup">
                    <option value="group_one">Group One</option>
                    <option value="branch">Branch</option>
                    <option value="currency">Currency</option>
                </optgroup>
                <optgroup label="General Ledger">
                    <option value="coa">Chart Of Accounts</option>
                    <option value="journal_voucher">Journal Voucher</option>
                    <option value="reverse_entry">Reverse Entry </option>
                    <option value="payment_voucher">Payment Voucher </option>
                    <option value="receipt_voucher">Receipt Voucher </option>
                    <option value="settings">Settings</option>
                    <option value="reports">Reports </option>
                </optgroup>
            </select>
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


@include('user::permission_role._script')