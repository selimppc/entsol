<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
        <div class="col-sm-10">
            <div class="col-sm-3">
                {!! Form::label('Branch', 'Branch:', ['class' => 'control-label']) !!}
                {!! Form::select('pBranch', $branch_id,Input::old('pBranch'),['class' => 'form-control','required','title'=>'select  branch, example :: Main Branch']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('FromDate', 'FromDate:', ['class' => 'control-label']) !!}
                {!! Form::text('pFromDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select from date']) !!}
            </div>
            <div class="col-sm-3">
                {!! Form::label('ToDate', 'ToDate:', ['class' => 'control-label']) !!}
                {!! Form::text('pToDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select to date']) !!}
            </div>
        </div>
    </div>
</div>

<p> &nbsp; </p>

<div class="modal-footer" >
    {!! Form::submit('PDF Report', ['name'=>'PDF', 'class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save chart of accounts information']) !!}
    {!! Form::submit('Excel Report', ['name'=>'Excel', 'class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save chart of accounts information']) !!}


    <a href="{{route('account-reports')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
</div>



<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>






