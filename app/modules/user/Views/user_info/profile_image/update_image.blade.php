

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
    {!! Form::model($model, ['method' => 'PATCH', 'route'=> ['update-profile-image',$user_image_id],'files'=>'true']) !!}
    @include('user::user_info.profile_image.add_image')
    {!! Form::close() !!}
</div>

