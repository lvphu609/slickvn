$(function(){
    var url = $('#hid_url').val();
    $('#' + $('#curr_page').val()).addClass('curr_page');
    $('#tab').tabs();
    $('#btn_save_new_register').click(function(){
        var arr_id_yes = '',
            arr_id_no = '';
        $('.choice_control_yes').each(function(){
            if($(this).prop('checked')){
                arr_id_yes += ($(this).attr('name') + ';');
            } 
        });
        $('.choice_control_no').each(function(){
            if($(this).prop('checked')){
                arr_id_no += ($(this).attr('name') + ';');
            } 
        });
        $('#hid_id_yes').val(arr_id_yes);
        $('#hid_id_no').val(arr_id_no);
        $('#frm_restaurant_commit').submit();
    });
    
    $('#btn_banner_upload').button({
        icons: {
            primary: "ui-icon-folder-open"
        }
    });
    $('#btn_banner_upload').click(function(){
        if($('#fle_banner_upload').val() == ''){
            alert("Vui lòng chọn hình cần upload!")
        }else{
            var file_type = $('#fle_banner_upload').val();
            file_type = file_type.substr(parseInt(file_type.lastIndexOf('.')) + 1, parseInt(file_type.length) - parseInt(file_type.lastIndexOf('.')));
            
            if($.trim(file_type.toLowerCase()) == 'jpg' || $.trim(file_type.toLowerCase()) == 'png' || $.trim(file_type.toLowerCase()) == 'gif'){
                $('#frm_banner_upload').submit();
            }else{
                alert('Định dạng file không hợp lệ!');
            }
        }
    });
    $('.banner_default').click(function(){
        var id = $(this).parent().parent().attr('id');
        $.get(url + 'index.php/administrator/index_administrator_control/banner_default?id=' + id);
    });
    $('.table_banner tbody tr td span').click(function(){
        var id = $(this).parent().parent().attr('id'),
            image_name = $(this).parent().parent().data('url');
        if($('#' + id + ' input').prop('checked')){
            alert('Không thể xóa Banner mặc định!');
        }else{
            var dk = confirm('Bạn có chắc chắn muốn xóa Banner này?');
            if(dk){
                $.get(url + 'index.php/administrator/index_administrator_control/banner_delete?id=' + id + '&image_name=' + image_name, function(){
                    window.location.reload();
                });
            }           
        }
    });
    
    load_restaurant_old();
    load_restaurant_lock();
    
    function load_restaurant_old(){
        $('#tabs-2_content').html('<center><img src="' + url + 'images/loading.gif" width="20px" height="15px"></center>');
        $.get(url + 'index.php/administrator/restaurant_administrator_control/list_restaurant_old', function(data){
            $('#tabs-2_content').html(data);
            $('.control').hide();
            $('#tabs-2 table tbody tr').hover(
                function(){
                    var id = $(this).attr('id');
                    $('#' + id + ' div').show();
                },
                function(){
                    var id = $(this).attr('id');
                    $('#' + id + ' div').hide();
                }
            );
            $('#dialog_view').dialog({
                'autoOpen': false,
                'title': 'Thông tin nhà hàng',
                'modal': true,
                'width': 600,
                'height': 350,
                'buttons': {
                    'Close': function(){
                        $(this).dialog('close');
                    }
                }
            });
            $('#dialog_edit').dialog({
                'autoOpen': false,
                'title': 'Cập nhật thông tin nhà hàng',
                'modal': true,
                'width': 600,
                'height': 465,
                'buttons': [
                    {
                        'text': 'Hủy',
                        'title': 'Hủy bỏ thay đổi!',
                        'click': function(){
                            $('#lbl_edit_error').html('');
                            $('#btn_edit_luu').prop('disabled', false);
                            $(this).dialog('close');
                        }
                    },
                    {
                        'text': 'Lưu',
                        'id': 'btn_edit_luu',
                        'title': 'Lưu tất cả thay đổi',
                        'click': function(){
                            var name = $('#txt_restaurant_edit_name').val(),
                                province = $('#cbo_restaurant_edit_province').val(),
                                address = $('#txt_restaurant_edit_address').val(),
                                owner = $('#txt_restaurant_edit_owner').val(),
                                email = $('#txt_restaurant_edit_email').val(),
                                pass = $('#txt_restaurant_edit_pass').val(),
                                phone = $('#txt_restaurant_edit_phone').val(),
                                note = $('#txt_restaurant_edit_note').val(),
                                id = $('#hid_edit_id').val();
                            var value = id + ';' + name + ';' + province + ';' + address + ';' + owner + ';' + email + ';' + pass + ';' + phone + ';' + note;
                            $('#btn_edit_luu').prop('disabled', true);
                            $('#lbl_edit_error').html('<img src="' + url + 'images/loading.gif" width="20px" height="15px">');
                            $.get(url + 'index.php/administrator/restaurant_administrator_control/edit_save?value=' + value, function(data){
                                if(data == 'true'){
                                    $('#lbl_edit_error').html('');
                                    $('#btn_edit_luu').prop('disabled', false);
                                    load_restaurant_old();
                                    $('#dialog_edit').dialog('close');
                                }
                            });                
                        }
                    }
                ]
            });
            $('#dialog_lock').dialog({
                'autoOpen': false,
                'title': 'Cảnh báo',
                'modal': true,
                'width': 350,
                'height': 230,
                'buttons': [
                    {
                        'text': 'Chấp nhận',
                        'id': 'btn_lock_ok',
                        'title': 'Khóa nhà hàng này!',
                        'click': function(){
                            $('#btn_lock_luu').prop('disabled', true);
                            $('#lbl_lock_error').html('<img src="' + url + 'images/loading.gif" width="20px" height="15px">');
                            var id = $('#dialog_lock_content').data('id');
                            $.get(url + 'index.php/administrator/restaurant_administrator_control/lock?id=' + id, function(data){
                                if(data == 'true'){
                                    $('#lbl_lock_error').html('');
                                    $('#btn_lock_luu').prop('disabled', false);
                                    load_restaurant_old();
                                    load_restaurant_lock();
                                    $('#dialog_lock').dialog('close');
                                }
                            });
                        }
                    },
                    {
                        'text': 'Hủy',
                        'title': 'Quay lại...',
                        'click': function(){
                            $('#btn_lock_luu').prop('disabled', false);
                            $('#lbl_lock_error').html('');
                            $(this).dialog('close');
                        }
                    }
                ]
            });
            $('.control span').click(function(){
                var id = $(this).data('id');
                if($(this).data('action') == 'btn_view'){            
                    $.get(url + 'index.php/administrator/restaurant_administrator_control/view?id=' + id, function(data){
                        $('#dialog_view').html(data);
                    });
                    $('#dialog_view').dialog('open');
                }
                if($(this).data('action') == 'btn_edit'){
                    $.get(url + 'index.php/administrator/restaurant_administrator_control/edit?id=' + id, function(data){
                        $('#dialog_edit').html(data);
                        $('#cbo_restaurant_edit_province').val($('#hid_curr_province').val());
                    });
                    $('#dialog_edit').dialog('open');
                }
                if($(this).data('action') == 'btn_lock'){
                    $('#dialog_lock_content').data('id', id);
                    $('#dialog_lock_content').html('Bạn có muốn khóa nhà hàng ' + $(this).parent().data('name') + '?');
                    $('#dialog_lock').dialog('open');
                }
            });
        });
    }
    
    function load_restaurant_lock(){
        $('#tabs-3_content').html('<center><img src="' + url + 'images/loading.gif" width="20px" height="15px"></center>');
        $.get(url + 'index.php/administrator/restaurant_administrator_control/list_restaurant_lock', function(data){
            $('#tabs-3_content').html(data);
            $('.control_unlock').hide();
            $('#tabs-3 table tbody tr').hover(
                function(){
                    var id = $(this).attr('id');
                    $('#' + id + '_icon').hide();
                    $('#' + id + ' div').show();
                },
                function(){
                    var id = $(this).attr('id');
                    $('#' + id + ' div').hide();
                    $('#' + id + '_icon').show();
                }
            );
            $('#dialog_unlock').dialog({
                'autoOpen': false,
                'title': 'Cảnh báo',
                'modal': true,
                'width': 350,
                'height': 230,
                'buttons': [
                    {
                        'text': 'Chấp nhận',
                        'id': 'btn_unlock_ok',
                        'title': 'Mở khóa nhà hàng này!',
                        'click': function(){
                            $('#btn_unlock_ok').prop('disabled', true);
                            $('#lbl_unlock_error').html('<img src="' + url + 'images/loading.gif" width="20px" height="15px">');
                            var id = $('#dialog_unlock_content').data('id');
                            $.get(url + 'index.php/administrator/restaurant_administrator_control/unlock?id=' + id, function(data){
                                if(data == 'true'){
                                    $('#lbl_unlock_error').html('');
                                    $('#btn_unlock_ok').prop('disabled', false);
                                    load_restaurant_old();
                                    load_restaurant_lock();
                                    $('#dialog_unlock').dialog('close');
                                }
                            });
                        }
                    },
                    {
                        'text': 'Hủy',
                        'title': 'Quay lại...',
                        'click': function(){
                            $('#btn_unlock_ok').prop('disabled', false);
                            $('#lbl_unlock_error').html('');
                            $(this).dialog('close');
                        }
                    }
                ]
            });
            
            $('#dialog_delete').dialog({
                'autoOpen': false,
                'title': 'Cảnh báo',
                'modal': true,
                'width': 350,
                'height': 230,
                'buttons': [
                    {
                        'text': 'Chấp nhận',
                        'id': 'btn_delete_ok',
                        'title': 'Xóa nhà hàng này khỏi danh sách!',
                        'click': function(){
                            $('#btn_delete_ok').prop('disabled', true);
                            $('#lbl_delete_error').html('<img src="' + url + 'images/loading.gif" width="20px" height="15px">');
                            var id = $('#dialog_delete_content').data('id');
                            $.get(url + 'index.php/administrator/restaurant_administrator_control/delete?id=' + id, function(data){
                                if(data == 'true'){
                                    $('#lbl_delete_error').html('');
                                    $('#btn_delete_ok').prop('disabled', false);
                                    load_restaurant_lock();
                                    $('#dialog_delete').dialog('close');
                                }
                            });
                        }
                    },
                    {
                        'text': 'Hủy',
                        'title': 'Quay lại...',
                        'click': function(){
                            $('#btn_delete_ok').prop('disabled', false);
                            $('#lbl_delete_error').html('');
                            $(this).dialog('close');
                        }
                    }
                ]
            });
            $('.control_unlock span').click(function(){
                var id = $(this).data('id');                
                if($(this).data('action') == 'btn_unlock'){
                    $('#dialog_unlock_content').data('id', id);
                    $('#dialog_unlock_content').html('Bạn có muốn mở khóa nhà hàng ' + $(this).parent().data('name') + '?');
                    $('#dialog_unlock').dialog('open');
                }
                if($(this).data('action') == 'btn_delete'){
                    $('#dialog_delete_content').data('id', id);
                    $('#dialog_delete_content').html('Bạn có muốn xóa nhà hàng ' + $(this).parent().data('name') + '?');
                    $('#dialog_delete').dialog('open');
                }
            });
        });
    }
});