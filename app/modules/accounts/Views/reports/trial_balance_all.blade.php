<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-10">
            <div class="col-sm-3">
                {!! Form::label('Branch', 'Branch:', ['class' => 'control-label']) !!}
                {!! Form::select('pBranch', $branch_id,null,['class' => 'form-control','required','title'=>'select  branch, example :: Main Branch']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('FromDate', 'FromDate:', ['class' => 'control-label']) !!}
                {!! Form::text('pFromDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select from date']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('ToDate', 'ToDate:', ['class' => 'control-label']) !!}
                {!! Form::text('pToDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select to date']) !!}
            </div>
        </div>
    </div>
</div>

