$(function(){
    var url = $('#hid_url').val(),
        res_id = $('#hid_res_id').val(),
        d_width = $(window).width(),
        r_width = $('#right_column').width(),
        l_width = $('#header_content').width(),
        t_width = 0;
     
    $(window).resize(function(){
        $(document).attr('title', $(window).width() + ' x ' + $(window).height());
    });
    t_width = d_width - 5 - l_width;
    $('#table_content').css({
        width: (t_width + 'px')
    });
    $('.format_number').formatNumber({format:"#,### đ", locale:"us"});
    $(".number").numeric({ 
        decimal: false, 
        negative: false 
    });
    //thiet lap tab hien thi ban
    $('#table_conten_tab a:first').tab('show');
    $('#txt_room_name').prop('placeholder', $('#table_conten_tab a:first').text());
    $('#txt_add_table').prop('placeholder', $('#tab_table_content').children().first().data('table'));
    
    $('#step_2, #step_3').hide();
    //$('#right_column_tab a:last').tab('show');
    
    //dieu khien tab ben cot phai
    $('#right_column_tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    //dieu khien tab the hien ban
    $('#table_conten_tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        var table = $(this).data('table'),
            name = $(this).text();
        $('#txt_room_name').prop('placeholder', name);
        $('#txt_add_table').prop('placeholder', table);
    });
    //dieu khien step 1
    $('#step_1 a').click(function(e){
        e.preventDefault();
        $('#right_column_tab a:last').tab('show');
        $('#step_1').hide('fade', function(){
            $('#step_2').show();
        });
        
    });
    //dieu khien step 2
    $('#step_2 button:first-child').click(function(e){
        e.preventDefault();
        $('#step_2').hide('fade', function(){
            $('#step_3').show();
            $('#txt_add_room_name').focus();
        });
        
    });
    //dieu khien step 3
    $('#txt_add_room_name_step, #txt_add_room_table_step').blur(function(){
        if($.trim($('#txt_add_room_name_step').val()) == ''){
            $('#txt_add_room_name_step').focus();
        }else if($.trim($('#txt_add_room_table_step').val()) == ''){
            $('#txt_add_room_table_step').focus();
        }else{
            $('#step_3 img').css({
                top: '185px',
                left: '435px'
            });
            $('#step_3_info').html('Chọn thêm để lưu lại các thiết lập!<div></div>');
            $('#step_3_info').css({
                top: '220px',
                left: '310px'
            });
        }
    });
    $('#txt_add_room_name_step, #txt_add_room_table_step').keypress(function(){
        if($.trim($('#txt_add_room_name_step').val()) != '' && $.trim($('#txt_add_room_table_step').val()) != ''){
            $('#step_3 img').css({
                top: '185px',
                left: '435px'
            });
            $('#step_3_info').html('Chọn thêm để lưu lại các thiết lập!<div></div>');
            $('#step_3_info').css({
                top: '220px',
                left: '310px'
            });
        }
    });
    $('#btn_add_room_step').click(function(){
        var room = $.trim($('#txt_add_room_name_step').val()),
            table = $.trim($('#txt_add_room_table_step').val());
        
        if(room != '' && table != ''){
            $(this).prop('disabled', true);
            $('#step_3 img, #step_3_info').hide();
            $('#img_add_room_step_loading').removeClass('hide');
            $.get(url + 'index.php/restaurant/table_admin_res_control/add_room?res_id=' + res_id +'&room=' + room + '&table=' + table, function(){
                window.location.reload();
            });
        }       
    });
    //xu ly su kien click button bo qua huong dan
    $('.btn_skip_step').click(function(){
        $('.step').hide();
    });
    //Xu ly su kien click button them phong/khu vuc
    $('#btn_add_room').click(function(){
        var room = $.trim($('#txt_add_room_name').val()),
            table = $.trim($('#txt_add_room_table').val());
        
        if(room == ''){
            $('#txt_add_room_name').focus();
            $('#add_room_error').html('Vui lòng điền tên phòng/khu vực!');
            return false;
        }
        if(table == ''){
            $('#txt_add_room_table').focus();
            $('#add_room_error').html('Vui lòng điền số bàn trong phòng/khu vực!');
            return false;
        }        
        $(this).prop('disabled', true);
        $('#add_room_error').html('<div class="loading"></div>');
        $.get(url + 'index.php/restaurant/table_admin_res_control/add_room?res_id=' + res_id +'&room=' + room + '&table=' + table, function(){
            window.location.reload();
        });   
    });
    //xu ly su kien khi click vao ban
    $('.table_item').click(function(){
        $('.table_item').removeClass('table_active');
        $(this).addClass('table_active');
        var table_number = $(this).data('table'),
            room = $(this).parent().data('room'),
            id = $(this).attr('id');
            
        $('#lbl_table_title').text('Bàn số ' + table_number);
        $('#lbl_room_title').text(room);
        if($(this).data('status') == 'ready'){
            $('#table_status').removeClass('table_notready');
            $('#table_status').addClass('table_ready');
        }else{
            $('#table_status').removeClass('table_ready');
            $('#table_status').addClass('table_notready');
        }
        $('#table_status').data('table_id', id);
    });
    //xu ly su kien click thay doi trang thai ban
    $('#table_status').click(function(){
        var table_id = $(this).data('table_id');
        if($(this).hasClass('table_notready')){
            $(this).removeClass('table_notready').addClass('table_ready');
            $(this).attr('title', 'Click để chuyển bàn sang trạng thái trống!');
            $('#' + table_id).addClass('ready').data('status', 'ready');
        }else{
            $(this).removeClass('table_ready').addClass('table_notready');
            $(this).attr('title', 'Click để chuyển bàn sang trạng thái có khách!');
            $('#' + table_id).removeClass('ready').data('status', '');
        }
        
    });
    
    $('#right_column').mouseenter(function(){
        $(this).animate({
            right: '0px'
        });
    });
    $('#right_column').mouseleave(function(){
        $(this).animate({
            right: '-348px'
        });
    });
});