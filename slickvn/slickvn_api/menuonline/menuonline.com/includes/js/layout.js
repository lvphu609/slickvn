$(function(){
    var address_position = parseInt($('#address_select').data('selected')) - 1,
        address_position_show = false,
        restaurant_position = parseInt($('#restaurant_select').data('selected')) - 1,
        restaurant_position_show = false,
        url = $('#hid_url').val();
    $('#info_search_delete').hide();
    $('#address_select ul').css('margin-top', -(address_position*30));
    $('#restaurant_select ul').css('margin-top', -(restaurant_position*30));
    $('#address_select ul li').mouseenter(function(){
        if(address_position_show){
            $('#address_select ul li').removeClass('address_select_over');
            $(this).addClass('address_select_over');
        }      
    });
    $('#restaurant_select ul li').mouseenter(function(){
        if(restaurant_position_show){
            $('#restaurant_select ul li').removeClass('address_select_over');
            $(this).addClass('address_select_over');
        }      
    });
    $(document).click(function(){
        if(address_position_show){
            address_position_show = false;
            $('#address_select ul').css('margin-top', -(address_position*30));           
            $('#address_select ul li').removeClass('address_select_over');
            $('#address_select').animate({
                height: 30,
                top: 3
            }, 350, function(){
                $('#address_select').css('overflow', 'hidden');
                $('#address_select > div').show();
            });
            event.stopPropagation();
        }
        if(restaurant_position_show){
            restaurant_position_show = false;
            $('#restaurant_select ul').css('margin-top', -(restaurant_position*30));           
            $('#restaurant_select ul li').removeClass('address_select_over');
            $('#restaurant_select').animate({
                height: 30,
                top: 3
            }, 350, function(){
                $('#restaurant_select').css('overflow', 'hidden');
                $('#restaurant_select > div').show();
            });
            event.stopPropagation();
        }
    });
    $('#address_select ul li').click(function(event){
        if(address_position_show){
            address_position = parseInt($(this).val()) - 1;
            address_position_show = false;
            $('#address_select ul').css('margin-top', -(address_position*30));           
            $('#address_select ul li').removeClass('address_select_over');
            $('#address_select').animate({
                height: 30,
                top: 3
            }, 350, function(){
                $('#address_select').css('overflow', 'hidden');
                $('#address_select > div').show();
            });
            event.stopPropagation();
        }         
    });
    $('#restaurant_select ul li').click(function(event){
        if(restaurant_position_show){
            restaurant_position = parseInt($(this).val()) - 1;
            restaurant_position_show = false;
            $('#restaurant_select ul').css('margin-top', -(restaurant_position*30));           
            $('#restaurant_select ul li').removeClass('address_select_over');
            $('#restaurant_select').animate({
                height: 30,
                top: 3
            }, 350, function(){
                $('#restaurant_select').css('overflow', 'hidden');
                $('#restaurant_select > div').show();
            });
            event.stopPropagation();
        }         
    });
    $('#address_select').click(function(){
        var top = address_position;
        $(this).css('overflow-y', 'auto');
        $('#address_select ul').css('margin-top', 0);
        $('#address_select > div').hide();
        $('#address_select ul li').eq(address_position).addClass('address_select_over');
        if(address_position > 7){
            top = 7;
        }
        $(this).animate({
            height: 250,
            top: -(top*30 - 3)
        }, 350, function(){
            address_position_show = true;
            if(address_position > 7){
                $('#address_select').scrollTop((address_position-7)*30);
            }
        });
    });
    $('#restaurant_select').click(function(){
        var top = restaurant_position;
        $(this).css('overflow-y', 'auto');
        $('#restaurant_select ul').css('margin-top', 0);
        $('#restaurant_select > div').hide();
        $('#restaurant_select ul li').eq(restaurant_position).addClass('address_select_over');
        if(restaurant_position > 7){
            top = 7;
        }
        $(this).animate({
            height: 250,
            top: -(top*30 - 3)
        }, 350, function(){
            restaurant_position_show = true;
            if(restaurant_position > 7){
                $('#restaurant_select').scrollTop((restaurant_position-7)*30);
            }
        });
    });
    
    $('#info_search input').keyup(function(){
       if($.trim($(this).val()) !== ''){
           $('#info_search_delete').show();
       }else{
           $('#info_search_delete').hide();
       }
    });
    $('#info_search_delete').mousedown(function(){
        $('#info_search input').val('');
        $('#info_search_delete').hide();
    });
    $('#business_right button').button({
        icons: {
            primary: "ui-icon-cart"
        }
    });
    $('#dialog_login > div').tabs();
    $('#dialog_login').dialog({
        'autoOpen': false,
        'title': 'Đăng nhập MenuOnline...',
        'modal': true,
        'minWidth': 400,
        'minHeight': 300,
        'show': 'scale',
        'hide': 'explode',
        'closeOnEscape': true
    });
    $('#btn_login, #btn_register').button({
        icons:{
            primary: 'ui-icon-circle-check'
        }
    });
    $('.btn_close').button({
        icons:{
            primary: 'ui-icon-circle-close'
        }
    });
    $('.btn_close').click(function(){
        $('#dialog_login').dialog("close");
    });
    $('#link_login').click(function(){
        $('#dialog_login').dialog('open');
    });
    
    $('#btn_login').click(function(){
        var email = $.trim($('#txt_email_login').val()),
            password = $.trim($('#txt_password_login').val()),
            save_password = $('#chk_save_password').prop('checked');
        if(email == ''){
            $('#lbl_login_error').html('Vui lòng nhập email!');
            $('#txt_email_login').focus();
            return false;
        }
        if(password == ''){
            $('#lbl_login_error').html('Vui lòng nhập mật khẩu!');
            $('#txt_password_login').focus();
            return false;
        }
        if(email.indexOf('@') < 3 || email.indexOf('.') > (email.length - 3) || email.lastIndexOf('.') < (email.indexOf('@') + 4)){
            $('#lbl_login_error').html('Email không hợp lệ!');
            $('#txt_email_login').focus();
            return false;
        }
        $('#lbl_login_error').html('<img src="' + url + 'images/loading.gif">');
        $('#btn_login').prop('disabled', true);
        $.get(url + 'index.php/index_control/user_login?email=' + email + '&pass=' + password + '&save=' + save_password, function(data){
            if(data != 'false'){
                $('#lbl_login_error').html('');
                $('#btn_login').prop('disabled', false);
                $('#nav_login span').html('Xin chào, ' + data + ' | <a href="' + url +'index.php/index_control/user_logout">Thoát</a>');
                $('#dialog_login').dialog("close");
            }else{
                $('#lbl_login_error').html('Tên đăng nhập hoặc mật khẩu không chính xác!');
                $('#btn_login').prop('disabled', false);
                $('#txt_password_login').focus();
            }
        });
    });
    
    
    var image_path = url + 'images/';
    $('#top_restaurant_slide_show').infiniteCarousel({
        displayThumbnails : false,
        inView: 3,        
        imagePath: image_path,
        showControls: true,
        padding: '15px',
        displayProgressBar: false,
        autoHideControls: true,
        enableKeyboardNav: false,
        autoHideCaptions: true
    });
    
    var name = false,
        address = false,
        owner = false,
        mail = false,
        phone = false,
        code = false,
        province = false;
    if($('#hid_submit').val() == 'true'){
        name = true;
        $('#txt_restaurant_name_check').html('<img src="' + url + '/images/true.png">');
        address = true;
        $('#txt_restaurant_address_check').html('<img src="' + url + '/images/true.png">');
        owner = true;
        $('#txt_restaurant_owner_check').html('<img src="' + url + '/images/true.png">');
        mail = true;
        $('#txt_restaurant_email_check').html('<img src="' + url + '/images/true.png">');
        phone = true;
        $('#txt_restaurant_phone_check').html('<img src="' + url + '/images/true.png">');
        province = true;
        $('#cbo_restaurant_province').val($('#hid_province').val());
        $('#txt_restaurant_province_check').html('<img src="' + url + '/images/true.png">');
    }
    $('#txt_restaurant_name').blur(function(){
        if(parseInt($.trim($(this).val()).length) < 3){
            $('#txt_restaurant_name_check').html('<img src="' + url + '/images/false.png"> Tên nhà hàng lớn hơn 3 ký tự!');
            name = false;
            $(this).focus();
        }else{
            name = true;
            $('#txt_restaurant_name_check').html('<img src="' + url + '/images/true.png">');
        }
    });
    $('#cbo_restaurant_province').blur(function(){
        if($(this).val() == 'none'){
            $('#txt_restaurant_province_check').html('<img src="' + url + '/images/false.png"> Vui lòng chọn Tỉnh/Thành phố!');
            province = false;
            $(this).focus();
        }else{
            province = true;
            $('#txt_restaurant_province_check').html('<img src="' + url + '/images/true.png">');
        }
    });
    $('#txt_restaurant_address').blur(function(){
        if(parseInt($.trim($(this).val()).length) < 10){
            $('#txt_restaurant_address_check').html('<img src="' + url + '/images/false.png"> Địa chỉ nhà hàng lớn hơn 10 ký tự!');
            address = false;
            $(this).focus();
        }else{
            address = true;
            $('#txt_restaurant_address_check').html('<img src="' + url + '/images/true.png">');
        }
    });
    $('#txt_restaurant_owner').blur(function(){
        if(parseInt($.trim($(this).val()).length) < 5){
            $('#txt_restaurant_owner_check').html('<img src="' + url + '/images/false.png"> Tên của bạn lớn hơn 5 ký tự!');
            owner = false;
            $(this).focus();
        }else{
            owner = true;
            $('#txt_restaurant_owner_check').html('<img src="' + url + '/images/true.png">');
        }
    });
    $('#txt_restaurant_email').blur(function(){
        var email = $.trim($(this).val());
        if(email.indexOf('@') < 3 || email.indexOf('.') > (email.length - 3) || email.lastIndexOf('.') < (email.indexOf('@') + 4)){
            $('#txt_restaurant_email_check').html('<img src="' + url + '/images/false.png"> Email không hợp lệ!');
            mail = false;
            $(this).focus();
        }else{
            mail = true;
            $('#txt_restaurant_email_check').html('<img src="' + url + '/images/true.png">');
        }
    });
    $('#txt_restaurant_phone').blur(function(){
        if(parseInt($.trim($(this).val()).length) > 11 || parseInt($.trim($(this).val()).length) < 10 || parseInt($.trim($(this).val()).substr(0,1)) != 0){
            $('#txt_restaurant_phone_check').html('<img src="' + url + '/images/false.png"> Số điện thoại không hợp lệ!');
            phone = false;
            $(this).focus();
        }else{
            phone = true;
            $('#txt_restaurant_phone_check').html('<img src="' + url + '/images/true.png">');
        }
    });

    $('#recaptcha_response_field').blur(function(){
        if(parseInt($.trim($(this).val()).length) < 6){
            $('#txt_restaurant_code_check').html('<img src="' + url + '/images/false.png"> Mã xác nhận không hợp lệ!');
            code = false;
            $(this).focus();
        }else{
            code = true;
            $('#hid_challenge').val($('#recaptcha_challenge_field').val());
            $('#hid_response').val($('#recaptcha_response_field').val());
            $('#txt_restaurant_code_check').html('');
        }
    });
    $('#txt_restaurant_phone').keydown(function(ev){
       if((parseInt(ev.which) < 48 || (parseInt(ev.which) > 57 && parseInt(ev.which) < 96) || parseInt(ev.which) > 105) && parseInt(ev.which) != 8 && parseInt(ev.which) != 9 && parseInt(ev.which) != 46){
           ev.stopPropagation();
           return false;
       } 
    });

    $('#frm_restaurant_register input').blur(function(){
        if(name && address && owner && mail && phone && code && province){
            $('#btn_restaurant_submit_check').html('');
        }
    });
    $('#btn_restaurant_submit').click(function(){
        if(name && address && owner && mail && phone && code && province){
            $('#frm_restaurant_register').submit();
        }else{
            $('#btn_restaurant_submit_check').html('<img src="' + url + '/images/false.png"> Vui lòng điền chính xác các thông tin!');
        }
    });
    
    slide_show();
    
    function slide_show(){
        $('#slide_show img').fadeIn(5000);
        $('#slide_show img').eq(2).fadeOut(5000, function(){
             $('#slide_show img').eq(1).fadeOut(5000, function(){
                 slide_show();
             });
         }); 
    }
});