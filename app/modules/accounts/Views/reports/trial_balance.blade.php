<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-10">
            <div class="col-sm-3">
                {!! Form::label('pBranch', 'Branch:', ['class' => 'control-label']) !!}
                {!! Form::select('pBranch', $branch_id,null,['class' => 'form-control','required', 'title'=>'select branch']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('pFromDate', 'From Date:', ['class' => 'control-label']) !!}
                {!! Form::text('pFromDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select from date']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('pToDate', 'To Date:', ['class' => 'control-label']) !!}
                {!! Form::text('pToDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select to date']) !!}
            </div>
        </div>
    </div>
</div>