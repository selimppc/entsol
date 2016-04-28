<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-ui.min.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    {!! Form::model($model, ['method' => 'PATCH', 'route'=> ['update-profile-image',$user_image_id],'files'=>'true','id' => 'jq-validation-form']) !!}
    @include('user::user_info.profile_image.add_image')
    {!! Form::close() !!}
</div>

<script>
    $('#jq-validation-form').submit(function() {
        $('#gif').css('visibility', 'visible');
        //return true;
    });
</script>

