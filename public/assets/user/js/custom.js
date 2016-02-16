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

/*tooltip*/

$( document ).tooltip();
/*
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});*/
