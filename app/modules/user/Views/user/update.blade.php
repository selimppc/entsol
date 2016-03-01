<script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/custom.min.js') }}"></script>

<div class="modal-header">
    <a href="{{ URL::previous() }}" class="close" type="button" title="click x button for close this entry form"> × </a>
    <h4 class="modal-title" id="myModalLabel">{{$pageTitle}}</h4>
</div>


<div class="modal-body">
        {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['update-user', $data->id],'id'=>'user-jq-validation-form']) !!}
        {!! Form::hidden('id', $data->id) !!}
        {{--@include('user::user._form')--}}

    <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('username', 'UserName:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::text('username',Input::old('username'),['class' => 'form-control','placeholder'=>'User Name','required','autofocus', 'title'=>'Enter User Name']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('email', 'Email Address:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                {!! Form::email('email',Input::old('email'),['class' => 'form-control','placeholder'=>'Email Address','required', 'title'=>'Enter User Email Address']) !!}
            </div>
        </div>
    </div>

    <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
               {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                <div class="checkbox" style="margin: 0;">
                    <label>
                        <input type="checkbox" value="yes" class="px" id="checkbox">
                        <span class="lbl narration">Do you want to change password?</span>
                    </label>
                </div>
                <div id="pass-old">
                    {!! Form::hidden('password',$data['password']) !!}
                    {!! Form::text('password1',null,['class' => 'form-control','placeholder'=>'Password','title'=>'Enter User Password','readonly']) !!}
                </div>
                <div style="display: none;" id="field-password">
                    {!! Form::password('password2',['id'=>'edit-user-password','class' => 'form-control','placeholder'=>'Password','title'=>'Enter User Password']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div style="margin-top: 20px;">
                    {!! Form::label('confirm_password', 'Confirm Password') !!}
                    <div id="re-pass">
                        {!! Form::password('re_password',['class' => 'form-control','placeholder'=>'Re-Enter New Password','name'=>'re_password','onkeyup'=>"validation()",'title'=>'Enter Confirm Password That Must Be Match With New Passowrd.','readonly']) !!}
                    </div>
                    <div style="display: none" id="field-con-password">
                        {!! Form::password('re_password',['class' => 'form-control','placeholder'=>'Re-Enter New Password','id'=>'user-re-password','name'=>'re_password','onkeyup'=>"validation()",'title'=>'Enter Confirm Password That Must Be Match With New Passowrd.']) !!}
                    </div>
                </div>
                <span id='user-show-message'></span>

            </div>
        </div>
    </div>
    <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::label('branch_id', 'Branch:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                @if(isset($data->branch_id))
                    {!! Form::text('branch_title',isset($data->relBranch->title)?$data->relBranch->title:'' ,['class' => 'form-control','required','title'=>'select branch name','readonly']) !!}
                    {!! Form::hidden('branch_id', $data->relBranch->id) !!}
                @else
                    {!! Form::Select('branch_id', $branch_data, Input::old('branch_id'),['class' => 'form-control','required','title'=>'select branch name']) !!}
                @endif
            </div>
        </div>
    </div>
    <div class="form-group form-group no-margin-hr panel-padding-h no-padding-t no-border-t">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('expire_date', 'Expire Date:', ['class' => 'control-label']) !!}
                <small class="required">(Required)</small>
                <div class="input-group date">
                    @if(isset($data->expire_date))
                        {!! Form::text('expire_date', Input::old('expire_date'), ['class' => 'form-control bs-datepicker-component','required','title'=>'select expire date']) !!}
                    @else
                        {!! Form::text('expire_date', $days, ['class' => 'form-control bs-datepicker-component','required','title'=>'select expire date']) !!}
                    @endif

                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <div class="col-sm-6">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                <small class="narration">(Inactive status Selected)</small>
                {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel'=>'Cancel'),Input::old('status'),['class'=>'form-control ','required']) !!}
            </div>
        </div>
    </div>

    <div class="form-margin-btn">
        {!! Form::submit('Save changes', ['id'=>'user-btn-disabled','class' => 'btn btn-primary','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}
        <a href="{{route('user-list')}}" class=" btn btn-default" data-placement="top" data-content="click close button for close this entry form">Close</a>
    </div>

        {!! Form::close() !!}
</div>




<script>

    $(".btn").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });


    $(".form-control").tooltip();
    $('input:disabled, button:disabled').after(function (e) {
        d = $("<div>");
        i = $(this);
        d.css({
            height: i.outerHeight(),
            width: i.outerWidth(),
            position: "absolute",
        })
        d.css(i.offset());
        d.attr("title", i.attr("title"));
        d.tooltip();
        return d;
    });

    function validation() {
        $('#user-re-password').on('keyup', function () {
            if ($(this).val() == $('#edit-user-password').val()) {

                $('#user-show-message').html('');
                document.getElementById("user-btn-disabled").disabled = false;
                return false;
            }
            else $('#user-show-message').html('confirm password do not match with new password,please check.').css('color', 'red');
            document.getElementById("user-btn-disabled").disabled = true;
        });
    }
    //edit-user...........
    $("#user-jq-validation-form").validate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'jq-validation-email': {
                required: true,
                email: true
            },
            'jq-validation-password': {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            'jq-validation-password-confirmation': {
                required: true,
                minlength: 6,
                equalTo: "#jq-validation-password"
            },
            'jq-validation-required': {
                required: true
            },
            'jq-validation-url': {
                required: true,
                url: true
            },
            'jq-validation-phone': {
                required: true,
                phone_format: true
            },
            'email': {
                required: true,
                email: true
            },
            'currency_id': {
                required: true
            },
            'status': {
                required: true
            },'pBranch': {
                required: true
            },

            'jq-validation-multiselect': {
                required: true,
                minlength: 2
            },
            'jq-validation-select2': {
                required: true
            },
            'jq-validation-select2-multi': {
                required: true,
                minlength: 2
            },
            'jq-validation-text': {
                required: true
            },
            'jq-validation-simple-error': {
                required: true
            },
            'jq-validation-dark-error': {
                required: true
            },
            'jq-validation-radios': {
                required: true
            },
            'jq-validation-checkbox1': {
                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
            },
            'jq-validation-checkbox2': {
                require_from_group: [1, 'input[name="jq-validation-checkbox1"], input[name="jq-validation-checkbox2"]']
            },
            'jq-validation-policy': {
                required: true
            }
        },
        messages: {
            'jq-validation-policy': 'You must check it!'
        }
    });
    //change password checkbox....
    $('#checkbox').change(function (){

        var check_value = $("#checkbox").is(":checked");
        if(check_value){
            $('#pass-old').hide();
            $('#re-pass').hide();
            $('#field-password').show();
            $('#field-con-password').show();
        }else{
            $('#pass-old').show();
            $('#re-pass').show();
            $('#field-password').hide();
            $('#field-con-password').hide();
        }

    })

</script>


