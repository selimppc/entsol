<div class="form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
    <div class="row">
            <div class="col-sm-2">
                {!! Form::select('pBranch', $branch_id,Input::old('pBranch'),['class' => 'form-control','required','title'=>'select  branch, example :: Main Branch']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::text('pFromDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','title'=>'select from date']) !!}
            </div>
            <div class="col-sm-2">
                {!! Form::text('pToDate', date('Y/m/d'), ['class' => 'form-control bs-datepicker-component','title'=>'select to date']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::submit('Report Generate', ['class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save chart of accounts information']) !!}
                <a href="{{route('group-one')}}" class=" btn btn-primary" data-placement="top" data-content="click close button for close this entry form">PDF Report</a>
                <a href="{{route('group-one')}}" class=" btn btn-primary" data-placement="top" data-content="click close button for close this entry form">Excel Report</a>
            </div>
    </div>
</div>

<p> &nbsp; </p>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>






