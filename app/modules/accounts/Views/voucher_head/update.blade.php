<link href="{{ URL::asset('assets/admin/css/generate.min.css') }}" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>
<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-head', $data->id]]) !!}
    @include('accounts::voucher_head._form')
    {!! Form::close() !!}
</div>

<!-- Javascript -->
<script>
    init.push(function () {
        var options = {
            format: 'yyyy/mm/dd',
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
        $('#bs-datepicker-example').datepicker(options);

        $('#bs-datepicker-component').datepicker();

        var options2 = {
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }
    });
</script>

<!-- / Javascript -->
<script type="text/javascript">
    init.push(function () {
        // Javascript code here
    })
    window.LanderApp.start(init);
</script>






