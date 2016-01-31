<link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css" >

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-group-one', $data->id],'id' => 'jq-validation-form']) !!}
    @include('accounts::group_one._form')
    {!! Form::close() !!}
</div>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>


<script type="text/javascript">
    var init = [];

    init.push(function () {
        $("#jq-validation-form").validate({
            ignore: '.ignore, .select2-input',
            focusInvalid: false,
            rules: {
                'code': {
                    required: true
                },'title': {
                    required: true
                },
                'status': {
                    required: true
                }
            }
        });
    });
    window.LanderApp.start(init);
</script>






