/**
 * Created by etsb on 1/25/16.
 */

/*$( document ).ready(function() {
    $("#jq-validation-form").validate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'jq-validation-email': {
                required: true,
                email: true
            },
            'jq-validation-select': {
                required: true
            }
        }
    });
});*/




init.push(function () {
    $("#jq-validation-phone").mask("(999) 999-9999");
    $('#jq-validation-select2').select2({ allowClear: true, placeholder: 'Select a country...' }).change(function(){
        $(this).valid();
    });
    $('#jq-validation-select2-multi').select2({ placeholder: 'Select gear...' }).change(function(){
        $(this).valid();
    });

    // Add phone validator
    $.validator.addMethod(
        "phone_format",
        function(value, element) {
            var check = false;
            return this.optional(element) || /^\(\d{3}\)[ ]\d{3}\-\d{4}$/.test(value);
        },
        "Invalid phone number."
    );

    // Setup validation
    $("#jq-validation-form").validate({
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
            'status': {
                required: true
            },
            'currency_id': {
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
});




/*$( document ).ready(function() {
    $("#jq-validation-form").validate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'code': {
                required: true,
                email: true
            },
            'jq-validation-select': {
                required: true
            }
        }
    });
});*/
