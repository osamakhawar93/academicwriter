$(document).ready(function () {
    /*
     * Javascript Variables
     */

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Initialize IChecks
    $('input.icheck-blue').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('.flag-update').next('ins.iCheck-helper').click(function (e) {

        var id = $(this).parent().find('input[type="checkbox"]').attr('id');
        var token = $(this).parent().find('input[type="checkbox"]').attr('token');
        
        id = parseInt(id);
        var table = $(this).parent().find('input[type="checkbox"]').attr('data-table');
        var tid = $(this).parent().find('input[type="checkbox"]').attr('data-bind');
        var attribute = $(this).parent().find('input[type="checkbox"]').attr('data-attribute');
        var name = $(this).parent().find('input[type="checkbox"]').attr('data-name');
        //name = (name == undefined? attribute : name);

        var state = $(this).parent().hasClass("checked");
        state = (state == true ? 1 : 0);

        //console.log('clicked: ' + table + ' attr: ' + attribute + ' state: ' + state);
      
        var url = $(this).parent().find('input[type="checkbox"]').attr('url');
        console.log(table);
        $.post(url,{
                    _token: token,
                    id: id,
                    table: table,
                    tid: tid,
                    attribute: attribute,
                    state: state,
                    name: name
                },
                function (res) {
                    var result = JSON.parse(res);

                    if (!result.success) {
                        message_toast(result.message, 'error');
                    } else {
                        message_toast(result.message, 'success');
                    }
                    //console.log(result);
                });
    });

});
/*
 * Play Notification Sound
 */
function message_toast(message, type) {
    if (type == "success") {
        $.Notification.notify('success','top right', message);
    } else if (type == "error") {
        $.Notification.notify('error','top right', message);
    }
}