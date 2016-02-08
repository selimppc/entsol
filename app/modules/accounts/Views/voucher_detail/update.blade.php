
    <div class="modal-header">
        <a href="{{ URL::previous() }}" class="close" type="button"> × </a>
        <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
    </div>

    <div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-voucher-detail', $data->id]]) !!}
           @include('accounts::voucher_detail._form')
        {!! Form::close() !!}
    </div>
    <script>

        init.push(function () {
            // Javascript code here
        })
        window.LanderApp.start(init);
    </script>

    @include('accounts::voucher_detail._script')


