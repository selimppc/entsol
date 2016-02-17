<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                {!! Form::label('account_code_title', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
                {!! Form::text('account_code_title', Input::old('coa_id'), ['id'=>'auto-search-ac','class' => 'form-control','required','placeholder'=>'search by name of Chart of account/account-code','title'=>'type your require chart of account "code" or "title"']) !!}
                {!! Form::hidden('coa_id',null, ['id'=>'coa-id-val']) !!}
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
        </div>
    </div>
</div>


@include('accounts::voucher_detail._script')