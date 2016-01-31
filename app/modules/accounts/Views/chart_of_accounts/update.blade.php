<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>

<div class="modal-body">
    @section('content_update')
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-chart-of-accounts', $data->id]]) !!}
        @include('accounts::chart_of_accounts._form')
        {!! Form::close() !!}
</div>

