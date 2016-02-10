<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3">
                {!! Form::label('pVoucherNo', 'Voucher No:', ['class' => 'control-label']) !!}
                {!! Form::text('pVoucherNo', null, ['id'=>'pVoucherNo', 'class' => 'form-control','required','title'=>'enter pVoucherNo']) !!}
            </div>
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="modal-footer">
    {!! Form::submit('PDF Report', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save chart of accounts information']) !!}
    <a href="{{route('account-reports')}}" class=" btn btn-primary" data-placement="top" data-content="click close button for close this entry form">PDF Report</a>
    <a href="{{route('account-reports')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>



<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>






