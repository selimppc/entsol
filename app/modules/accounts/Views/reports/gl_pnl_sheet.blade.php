<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3">
                {!! Form::label('(pYear', 'Year:', ['class' => 'control-label']) !!}
                {!! Form::selectrange('pYear', 2016,2030, null,['class' => 'form-control', 'title'=>'select your require "year", example :: 2016, then click "search" button']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('pPeriod', 'Period:', ['class' => 'control-label']) !!}
                {!! Form::Select('pPeriod', array(''=>'select','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12'), null,['class' => 'form-control','required', 'title'=>'select your require "period", example :: 6 (june), then click "search" button']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('pBranch', 'Branch:', ['class' => 'control-label']) !!}
                {!! Form::select('pBranch', $branch_id,Input::old('pBranch'),['class' => 'form-control','required','title'=>'select  Branch']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('pStyle', 'Style:', ['class' => 'control-label']) !!}
                {!! Form::Select('pStyle', array(''=>'select','Summary'=>'Summary','Detail'=>'Detail'), null,['class' => 'form-control','required', 'title'=>'select style']) !!}
            </div>
        </div>
    </div>
</div>