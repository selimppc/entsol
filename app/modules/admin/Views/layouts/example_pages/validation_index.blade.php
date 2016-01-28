<!DOCTYPE html>
<head>

</head>

<body>
<div class="row">
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-heading">
                <a class="btn btn-primary btn-xs pull-left" data-toggle="modal" href="#addData" title="Add">
                    <strong>Add +</strong>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="addData" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Add Info.</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['class' => 'form-horizontal','id' => 'jq-validation-form']) !!}
                @include('admin::layouts.example_pages.validation_form')
                {!! Form::close() !!}
            </div> <!-- / .modal-body -->
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>

</body>
</html>

