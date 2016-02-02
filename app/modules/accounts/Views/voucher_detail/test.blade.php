<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>

<div class="row">
    <div class="col-sm-6">
        {!! Form::label('coa_id', 'Chat Of Accounts:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('coa_id', $coa_data, Input::old('coa_id'), ['id'=>'coa-account','class' => 'form-control','required']) !!}
    </div>
    <div class="col-sm-6">
        {!! Form::label('account_code', 'Account Code:', ['class' => 'control-label']) !!}
        {!! Form::text('account_code', Input::old('account_code'), ['class' => 'form-control','required']) !!}
    </div>
</div>

<script type="text/javascript">
//    $(document).ready(function(){

        $('#coa-account').click(function () {
            alert( "123456" );
        });

//    });

</script>