<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3">
                {!! Form::label('(pType', 'Type:', ['class' => 'control-label']) !!}
                {!! Form::select('pType', array(''=>'Select Account Type','asset'=>'Asset','liability'=>'Liability','income'=>'Income','expenses'=>'Expenses'),Input::old('account_type'),['class' => 'form-control','required','title'=>'select  account type, example :: Asset']) !!}
            </div>
        </div>
    </div>
</div>