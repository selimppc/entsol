/**
 * Created by etsb on 1/20/16.
 */


init.push(function () {
    $('#profile-tabs').tabdrop();

    $("#leave-comment-form").expandingInput({
        target: 'textarea',
        hidden_content: '> div',
        placeholder: 'Write message',
        onAfterExpand: function () {
            $('#leave-comment-form textarea').attr('rows', '3').autosize();
        }
    });
})
window.LanderApp.start(init);
/*--------------- Write message in Profile ----------------------*/


/*------------- sign up validation ----------------------------- */
init.push(function () {
    $("#signup-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

    // Validate name
    $("#name_id").rules("add", {
        required: true,
        minlength: 1
    });

    // Validate email
    $("#email_id").rules("add", {
        required: true,
        email: true
    });

    // Validate username
    $("#username_id").rules("add", {
        required: true,
        minlength: 3
    });

    // Validate password
    $("#password_id").rules("add", {
        required: true,
        minlength: 6
    });

    // Validate confirm checkbox
    $("#confirm_id").rules("add", {
        required: true
    });
});

window.LanderApp.start(init);
/*-------------sign up validation----------------------------- */

/*tooltip*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});