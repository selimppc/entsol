
<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('account_code', Input::old('account_code'), ['id'=>'account_code', 'class' => 'form-control','required','autofocus','title'=>'enter account code, example :: 101-004']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::text('title', Input::old('title'), ['id'=>'title', 'class' => 'form-control','required', 'style'=>'text-transform:capitalize','title'=>'enter title, example :: Medical & Lab equipment']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', Input::old('description'), ['id'=>'description', 'class' => 'form-control','size' => '12x3','title'=>'enter descriptions of chart of accounts']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('account_type', 'Account Type:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('account_type', array(''=>'Select Account Type','asset'=>'Asset','liability'=>'Liability','income'=>'Income','expenses'=>'Expenses'),Input::old('account_type'),['class' => 'form-control','required','title'=>'select  account type, example :: Asset']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::label('account_usage', 'Account Usage:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('account_usage', array(''=>'Select Account Usage','ledger'=>'Ledger','ap'=>'Ap','ar'=>'Ar'),Input::old('account_usage'),['class' => 'form-control','required','title'=>'select  account usage, example :: Leger']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('group_one_id', 'Group One Title:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($group_one_id)>0)
                {!! Form::select('group_one_id', $group_one_id,Input::old('group_one_id'),['class' => 'form-control','required','title'=>'select  group, example :: Cash & Bank']) !!}
            @else
                {!! Form::text('group_one_id', 'No Group One ID available',['id'=>'group_one_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        <div class="col-sm-6">
            {!! Form::label('analytical_code', 'Analytical Code:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('analytical_code', array(''=>'Select Analytical Code','cash'=>'Cash','non-cash'=>'Non Cash'),Input::old('analytical_code'),['class' => 'form-control','required','title'=>'select  analytical code, example :: Cash']) !!}
        </div>
    </div>
</div>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-6">
            {!! Form::label('branch_id', 'Branch :', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            @if(count($branch_id)>0)
                {!! Form::select('branch_id', $branch_id,Input::old('branch_id'),['class' => 'form-control','required','title'=>'select  branch, example :: Main Branch']) !!}
            @else
                {!! Form::text('branch_id', 'No Branch ID available',['id'=>'branch_id','class' => 'form-control','required','disabled']) !!}
            @endif
        </div>
        <div class="col-sm-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            <small class="required">(Required)</small>
            {!! Form::select('status', array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class' => 'form-control','required','title'=>'select  status, example :: active']) !!}
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
    {!! Form::submit('Save changes', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save chart of accounts information']) !!}
    <a href="{{route('chart-of-accounts')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>
