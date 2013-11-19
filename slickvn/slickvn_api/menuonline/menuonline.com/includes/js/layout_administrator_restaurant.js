$(function(){
    var url = $('#hid_url').val();
    $('#' + $('#curr_page').val()).addClass('curr_page');
    $('#panel_cbo_drink, .control_panel').hide();
    $('.format_number').formatNumber({format:"#,### đ", locale:"us"});
    $('.icon').tooltip(); 
    $(".collapse").collapse();
    $('#btn_control_upload_frm').on('click', function(e){        
        $('#btn_control_upload_frm span').toggleClass('icon-chevron-down icon-chevron-up', 200);
        $(this).toggleClass('no_border');
    });
    
    $("#slide_food_sale").slider({
        range: "min",
        value: 0,
        min: 0,
        max: 100,
        slide: function( event, ui ) {
            $( "#txt_food_sale" ).val(ui.value );
        }
    });
    $("#txt_food_sale").blur(function() {
        $("#slide_food_sale").slider("value", $(this).val());
    });

    $('.rdo_choose_food').change(function(){
        if($(this).val() == 'food'){
            $('#panel_cbo_drink').hide();
            $('#panel_cbo_food').show();
            $('#add_kind_title').text('Thêm phân loại thức ăn...');
        }else{
            $('#panel_cbo_food').hide();
            $('#panel_cbo_drink').show();
            $('#add_kind_title').text('Thêm phân loại thức uống...');
        }
    });
    $('#btn_food_upload').click(function(){
        if($('#fle_food_upload').val() == ''){
            alert("Vui lòng chọn hình cần upload!")
            return false;
        }
        if($.trim($('#txt_food_name').val()) == '' || $.trim($('#txt_food_price').val()) == ''){
            alert('Vui lòng điền đầy đủ thông tin!');
            return false;
        }
        var file_type = $('#fle_food_upload').val();
        file_type = file_type.substr(parseInt(file_type.lastIndexOf('.')) + 1, parseInt(file_type.length) - parseInt(file_type.lastIndexOf('.')));

        if($.trim(file_type.toLowerCase()) == 'jpg' || $.trim(file_type.toLowerCase()) == 'png' || $.trim(file_type.toLowerCase()) == 'gif'){
            $('#frm_food_upload').submit();
        }else{
            alert('Định dạng file không hợp lệ!');
        }
    });
    $('.table_food tbody tr').hover(
        function(){
            $(this).children().find('.control_panel').show();
        },
        function(){
            $(this).children().find('.control_panel').hide();
        }
    );
    $('.icon').click(function(){
        var action = $(this).data('action'),
            id = $(this).data('id'),
            type = $(this).data('type'),
            kind = $(this).data('kind');
        if(action == 'edit'){
            $.get(url + 'index.php/restaurant/menu_admin_res_control/load_edit_value?id=' + id + '&type=' + type + '&kind=' + kind, function(data){
                $('#dialog_edit_food_content').html(data);
                $('#img_edit_food_add_image_loading').hide();
                $('#txt_edit_food_price').formatNumber({format:"#,### đ", locale:"us"});
                $('#txt_edit_food_price').focus(function(){
                    $(this).val($(this).parseNumber({format:"#,### đ", locale:"us"}));
                });
                $('#txt_edit_food_price').blur(function(){
                    $(this).formatNumber({format:"#,### đ", locale:"us"});
                });
                $('#box_food_image').hide();
                $('#btn_edit_food_change_image').click(function(){
                    $('#box_food_image').show();
                    $('#dialog_edit_food_content').scrollTop(1000);
                });
                $('#box_food_image img').click(function(){
                    var image_url = $(this).data('food_image'),
                        res_id = $('#hid_restaurant_id').val();
                    $('#img_edit_food_view').data('image', image_url);
                    $('#img_edit_food_view').attr('src', url + 'images/' + res_id + '/' + image_url);
                });

                $('#frm_edit_food_upload_image').submit(function(event){
                    event.preventDefault();                   
                    if($('#file_edit_food_new_image').val() == ''){
                        alert("Vui lòng chọn hình cần upload!")
                        return false;
                    }
                    var file_type = $('#file_edit_food_new_image').val();
                    file_type = file_type.substr(parseInt(file_type.lastIndexOf('.')) + 1, parseInt(file_type.length) - parseInt(file_type.lastIndexOf('.')));
                    if($.trim(file_type.toLowerCase()) == 'jpg' || $.trim(file_type.toLowerCase()) == 'png' || $.trim(file_type.toLowerCase()) == 'gif'){
                        $('#btn_edit_food_upload').hide();
                        $('#img_edit_food_add_image_loading').show();
                        $.ajaxFileUpload({
                            method: 'POST',
                            url: url + 'index.php/restaurant/menu_admin_res_control/add_image', 
                            secureuri: false,
                            fileElementId: 'file_edit_food_new_image',
                            dataType: 'json',
                            success: function(data, status){
                                $('#btn_edit_food_upload').show();
                                $('#img_edit_food_add_image_loading').hide();
                                $.get(url + 'index.php/restaurant/menu_admin_res_control/get_image', function(image_list){
                                    $('#box_edit_food_image').html(image_list);
                                });
                            }
                         });
                    }else{
                        alert('Định dạng file không hợp lệ!');
                    }
                    return false;
                });
            });
        }
    });
    
    $('#btn_add_food_type').click(function(){
        var id = $('#hid_restaurant_id').val(),
            value = $.trim($('#txt_name_kind_add').val()),
            type = 'food';
        if($('#rdo_food').prop('checked')){
            type = 'food';
        }else{
            type = 'drink';
        }
        if(value.length < 3){
            alert("Tên phân loại không đúng!");
            $('#txt_name_kind_add').focus();
            return false;
        }
        $('#btn_add_food_type').addClass('disabled');
        $('#lbl_add_kind_error').html('<img src="' + url + 'images/loading.gif">');
        $.get(url + 'index.php/restaurant/menu_admin_res_control/add_food_kind?id=' + id + '&type=' + type + '&value=' + value, function(data){
            if(data != 'false'){
                if(type == 'food'){
                    $('#panel_cbo_food').html(data);
                }else{
                    $('#panel_cbo_drink').html(data);
                }
                $('#btn_add_food_type').removeClass('disabled');
                $('#dialog_add_kind').modal('hide');
                $('#lbl_add_kind_error').html('');
                $('#txt_name_kind_add').val('');
            }else{
                $('#btn_add_food_type').removeClass('disabled');
                $('#txt_name_kind_add').focus();
                $('#lbl_add_kind_error').html('Phân loại thức ăn đã tồn tại!');
            }           
        });
    });
    
    $('#btn_edit_food_save').click(function(){
        var food_name = $.trim($('#txt_edit_food_name').val()),
            food_kind = $('#cbo_kind').val(),
            food_price = $('#txt_edit_food_price').parseNumber({format:"#,### đ", locale:"us"}),
            food_sale = $.trim($('#txt_edit_food_sale').val()),
            food_note = $.trim($('#txt_edit_food_note').val()),
            food_hot = $('#chk_edit_food_hot').prop('checked'),
            food_id = $('#hid_edit_food_id').val(),
            food_image = $('#img_edit_food_view').data('image');
        if(food_name.length < 3){
            $('#lbl_edit_food_error').text('Tên món không chính xác!');
            $('#txt_edit_food_name').focus();
            $('#txt_edit_food_price').formatNumber({format:"#,### đ", locale:"us"});
            return false;
        }
        if(food_price == 0){
            $('#lbl_edit_food_error').text('Giá không chính xác!');
            $('#txt_edit_food_price').focus();
            return false;
        }
        if($.isNumeric(food_sale)){
            if(food_sale < 0 || food_sale > 100){
                $('#lbl_edit_food_error').text('Khuyến mãi không chính xác!');
                $('#txt_edit_food_sale').focus();
                $('#txt_edit_food_price').formatNumber({format:"#,### đ", locale:"us"});
                return false;
            }
        }else{
            $('#lbl_edit_food_error').text('Khuyến mãi không chính xác!');
            $('#txt_edit_food_sale').focus();
            $('#txt_edit_food_price').formatNumber({format:"#,### đ", locale:"us"});
            return false;
        }
        if(food_hot){
            var food_status = 2;
        }else{
            var food_status = 1;
        }
        $('#btn_edit_food_save').addClass('disabled');
        $('#lbl_edit_food_error').html('<img src="' + url + 'images/loading.gif">');
        $.get(url + 'index.php/restaurant/menu_admin_res_control/update_food?id=' + food_id + '&name=' + food_name + '&kind=' + food_kind + '&price=' + food_price + '&sale=' + food_sale + '&note=' + food_note + '&status=' + food_status + '&image=' + food_image, function(data){
            window.location.reload();
        });
    });
});