<script type="text/javascript">

    function validation() {
        $('#password-confirm').on('keyup', function () {
            if ($(this).val() == $('#reset-password').val()) {
                $('#message').html('');
            } else $('#message').html('confirm password do not match with new password,please check.').css('color', 'red');
        });
    }

</script>