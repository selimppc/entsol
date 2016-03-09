<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

{!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-head', $data[0]['id'] ]]) !!}

@include('accounts::voucher_head._form')



@include('accounts::voucher_head._script')
{!! Form::close() !!}


