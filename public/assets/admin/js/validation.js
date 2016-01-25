/**
 * Created by etsb on 1/25/16.
 */

$( document ).ready(function() {
    $("#jq-validation-form").validate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'jq-validation-email': {
                required: true,
                email: true
            }
        }
    });
});
