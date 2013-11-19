$(function(){
    var url = $('#hid_url').val();
    $('#panel_admin_login').modal();
    $('#btn_login').click(function(){
        var email = $.trim($('#txt_email_login').val()),
            pass = $.trim($('#txt_pass_login').val()),
            check_mail = false,
            check_pass = false,
            save_password = $('#chk_save_password').prop('checked');
        if(email.indexOf('@') < 3 || email.indexOf('.') > (email.length - 3) || email.lastIndexOf('.') < (email.indexOf('@') + 4)){
            $('#lbl_error').html('<img src="' + url + '/images/false.png" width="20px" height="20px"> Email không hợp lệ!');
            check_mail = false;
            $('#txt_email_login').focus();
            return false;
        }else{
            check_mail = true;
            $('#lbl_error').html('');
        }
        if(parseInt(pass.length) < 5){
            $('#lbl_error').html('<img src="' + url + '/images/false.png" width="20px" height="20px"> Password không hợp lệ!');
            check_pass = false;
            $('#txt_email_login').focus();
            return false;
        }else{
            check_pass = true;
            $('#lbl_error').html('');
        }
        $('#lbl_error').html('<img src="' + url + 'images/loading.gif">');
        $('#btn_login').prop('disabled', true);
        $.get(url + 'index.php/index_control/user_login?email=' + email + '&pass=' + pass + '&save=' + save_password, function(data){
            if(data != 'false'){
                $('#lbl_error').html('');
                $('#btn_login').prop('disabled', false);
                window.location = (url + 'index.php/restaurant/menu_admin_res_control');
            }else{
                $('#lbl_error').html('<img src="' + url + '/images/false.png" width="20px" height="20px"> Tên đăng nhập hoặc mật khẩu không chính xác!');
                $('#btn_login').prop('disabled', false);
                $('#txt_pass_login').focus();
            }
        });
    });
    $('#panel_admin_login').on('hidden', function () {
        window.location = (url + 'index.php');
    })
});