
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('account_code', null, ['id'=>'account_code', 'class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['id'=>'description', 'class' => 'form-control','size' => '12x3']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('account_type', array('asset'=>'Asset','liability'=>'Liability','income'=>'Income','expenses'=>'Expenses'),Input::old('account_type'),['class' => 'form-control','required']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('account_usage', 'Account Usage:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('account_usage', array('ledger'=>'Ledger','ap'=>'Ap','ar'=>'Ar'),Input::old('account_usage'),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('group_one_id', 'Group One Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($group_one_id)>0)
                {!! Form::select('group_one_id', $group_one_id,Input::old('group_one_id'),['class' => 'form-control','required']) !!}
            @else
                {!! Form::text('group_one_id', 'No Group One ID available',['id'=>'group_one_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        <div class="col-sm-6">
            {!! Form::label('analytical_code', 'Analytical Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('analytical_code', array('cash'=>'Cash','non-cash'=>'Non Cash'),Input::old('analytical_code'),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($branch_id)>0)
                {!! Form::select('branch_id', $branch_id,Input::old('branch_id'),['class' => 'form-control','required']) !!}
            @else
                {!! Form::text('branch_id', 'No Branch ID available',['id'=>'branch_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('business_id', 'Business Title:', ['class' => 'control-label']) !!}
            {!! Form::select('business_id', array(''=>'---select---'),Input::old('business_id'),['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="form-margin-btn">
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
    <a href="{{route('chart-of-accounts')}}" class=" btn btn-default">Close</a>
</div>
