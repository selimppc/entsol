
<link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<style>
    .bs-datepicker-component{z-index:1151 !important;}
</style>


    <div class="modal-header">
        <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
        <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
    </div>

    <div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-head', $data->id]]) !!}

        @include('accounts::voucher_head._form')
        {!! Form::close() !!}
    </div>

<!--[if !IE]> -->
<script type="text/javascript"> window.jQuery || document.write('<script src="{{ URL::asset('assets/admin/js/jquery.min.js') }}">'+"<"+"/script>"); </script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>


