<script type="text/javascript" src="{{ URL::asset('assets/admin/js/datepicker.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-head', $data->id]]) !!}
    @include('accounts::voucher_head._form')
    {!! Form::close() !!}
</div>








