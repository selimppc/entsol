/**
 * Created by etsb on 1/20/16.
 */

/*Write message in Profile*/
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
