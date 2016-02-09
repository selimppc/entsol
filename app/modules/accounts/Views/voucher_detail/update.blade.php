
    <div class="modal-header">
        <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
        <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
    </div>

    <div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-detail', $data->id]]) !!}
        <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row">

                <div class="col-sm-12">

                    {!! Form::label('ac_title', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small>
                    {!! Form::text('ac_title', isset($data->relChartOfAccounts->title)?$data->relChartOfAccounts->title:'', ['id'=>'update-auto-search-ac','class' => 'form-control','placeholder'=>'Search Chart of account OR account-code']) !!}
                    {!! Form::hidden('coa_id',null, ['id'=>'ac-coa-id-val']) !!}
                </div>
            </div>
        </div>

        <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('sub_account_code', 'Sub Account Code:', ['class' => 'control-label']) !!}
                    <small>(Optional)</small><br>
                    <small class="narration">Resource Person/Organization</small>
                    {!! Form::text('sub_account_code', Input::old('sub_account_code'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    <br>
                    {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small>
                    {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('currency_id', 'Currency:', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small>
                    {!! Form::Select('currency_id', $currency_data, Input::old('currency_id'), ['id'=>'update-currency-data','class' => 'form-control','required']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('exchange_rate', 'Exchange Rate:', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small>
                    {!! Form::input('number','exchange_rate', Input::old('exchange_rate'), ['id'=>'update-ex-rate','class' => 'form-control','readonly','required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::label('amount', 'Amount(Debit/Credit):', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small><br>
                    <small class="narration">For credit add minus sign(-) before numeric digit(s).</small>
                    {!! Form::text('amount', Input::old('amount'), ['class' => 'form-control','required']) !!}
                </div>
                <div class="col-sm-6">
                    <br>
                    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                    <small class="required">(Required)</small>
                    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::label('note', 'Note:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('note', null, ['class' => 'form-control','size' => '12x3']) !!}
                </div>
            </div>
        </div>

        <div class="form-margin-btn">
            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
            <a href="" class=" btn btn-default" style="">Close</a>
        </div>
        {!! Form::close() !!}
    </div>

@include('accounts::voucher_detail.update_script')

