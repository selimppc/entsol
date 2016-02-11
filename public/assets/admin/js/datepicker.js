/**
 * Created by etsb on 1/26/16.
 */

/*----------Date picker------------*/

init.push(function () {
    var options = {
        todayBtn: "linked",
        orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
    }

    $('.bs-datepicker-component').datepicker({
        format: 'yyyy/mm/dd (D)',
        autoclose: true,
    });

    $('.bs-datepicker-example').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
    });



});
/*----------Date picker------------*/
