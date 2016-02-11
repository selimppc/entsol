<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-2">
                {!! Form::label('pTrn', 'Account Type:', ['class' => 'control-label']) !!}
                {!! Form::Select('pTrn', array(''=>'select','JV--'=>'Journal Voucher','REV-'=>'Reverse Entry'), null,['class' => 'form-control','required', 'title'=>'select status']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::label('pBranch', 'Branch:', ['class' => 'control-label']) !!}
                {!! Form::select('pBranch', $branch_id,Input::old('pBranch'),['class' => 'form-control','required','title'=>'select  branch, example :: Main Branch']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::label('pFromDate', 'From Date:', ['class' => 'control-label']) !!}
                {!! Form::text('pFromDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select from date']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::label('pToDate', 'To Date:', ['class' => 'control-label']) !!}
                {!! Form::text('pToDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-example','required','title'=>'select to date']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::label('pStatus', 'Status:', ['class' => 'control-label']) !!}
                {!! Form::Select('pStatus', array(''=>'select','Open'=>'Open','Balanced'=>'Balanced','Suspend'=>'Suspend','Posted'=>'Posted'), null,['class' => 'form-control','required', 'title'=>'select status']) !!}
            </div>
        </div>
    </div>
</div>