<link href="{{ URL::asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ URL::asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css" >

@include('admin::layouts.example_pages.form_test')

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
                },
                'status': {
                    required: true
                }
            }
        });
    });
    window.LanderApp.start(init);
</script>
