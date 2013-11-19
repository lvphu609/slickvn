$(function(){
    $.cookie.json = true;
    var d_width = $(window).width(),
        d_height = $(window).height(),
        h_height = parseInt($('#header').css('height')),
        f_height = parseInt($('#footer').css('height')),
        c_height = 0,
        active_menu = $('#hid_active_menu').val(),
        url = $('#hid_url').val(),
        res_id = $('#hid_res_id').val(),
        table_number = $('#hid_table_number').val(),
        delete_id = '';
    
    $('.hidden_item, #emty_box, .curr_count').hide();
    $('#content_lbl_table_number').hide();
    $('.money, #total_price').formatNumber({format:"#,### đ", locale:"us"});
    $(".txt_so_luong").numeric({ 
        decimal: false, 
        negative: false 
    });
    $('.page').css('width', d_width + 'px');
    $('.page').each(function(){
        var n = $(this).data('id');
        $(this).css('left', n*d_width + 'px');
    });
    c_height = d_height - h_height - f_height;
    $('#content').css({
        height: (c_height + 'px'),
        top: (h_height + 'px')
    });
    $('#footer_foot_control').animate({
        left: (-active_menu*d_width + 'px')
    });
    window.addEventListener("orientationchange", function() {
        //alert(window.orientation);
        d_width = $(window).width();
        d_height = $(window).height();
        c_height = d_height - h_height - f_height;       
        $('#content').css({
            height: (c_height + 'px'),
            top: (h_height + 'px')
        });
        $('.page').css('width', d_width + 'px');
        $('.page').each(function(){
            var n = $(this).data('id');
            $(this).css('left', n*d_width + 'px');
        });
        $('#footer_foot_control').animate({
            left: (-active_menu*d_width + 'px')
        });
    }, false);
    
    //read cookie
    if($.cookie('item') != undefined){
        if(get_item_count('all') == 0){
            $('.hidden_item').hide();
        }else{
            $('.hidden_item').show();
        }
        $('.total_item').text(get_item_count('all'));
        $('#total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();       
        show_curr_count();
    }

    //end cookie
    
    $('#btn_foot_control').click(function(){
        var h = parseInt($('#footer').css('height'));
        if(h == 130){
            $('#footer').animate({
                height: '50px'
            });
        }else{
            $('#footer').animate({
                height: '130px'
            });
        }
    });
    $('.btn_icon').click(function(){
        var target = $(this).data('target');
        active_menu = target;
        $('#footer_foot_control').animate({
            left: (-target*d_width + 'px')
        });
    });
    
    $('.icon_popover').popover({
        trigger: 'manual',
        placement: 'top'
    });
    $('#btn_view_sort_food').popover({
        trigger: 'manual',
        placement: 'top',
        html: true,
        title: 'Sắp xếp theo',
        content: function(){
            return $('#content_view_sort_food').html();
        }
    });  
    $('#btn_view_sort_drink').popover({
        trigger: 'manual',
        placement: 'top',
        html: true,
        title: 'Sắp xếp theo',
        content: function(){
            return $('#content_view_sort_drink').html();
        }
    });
    
    $('#btn_view_sort_food').hammer().on("tap", function(event) {
        event.stopPropagation();
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_drink').popover('hide');
        $('#content_lbl_table_number').hide();
        $(this).popover('show');
    });
    $('#btn_view_sort_drink').hammer().on("tap", function(event) {
        event.stopPropagation();
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_food').popover('hide');
        $('#content_lbl_table_number').hide();
        $(this).popover('show');
    });
    $('#lbl_table_number').hammer().on("tap", function(event) {
        event.stopPropagation();
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_food').popover('hide');
        $('#btn_view_sort_drink').popover('hide');
        $('#content_lbl_table_number').show();
    });
    $('.icon_popover').hammer().on("hold", function(event) {
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_food').popover('hide');
        $('#btn_view_sort_drink').popover('hide');
        $('#content_lbl_table_number').hide();
        $(this).popover('show');
    });
    $(document).hammer().on("tap", function(event) {       
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_food').popover('hide');
        $('#btn_view_sort_drink').popover('hide');
        $('#content_lbl_table_number').hide();
    });
    $(document).hammer().on("drag", function(event) {       
        $('.icon_popover').popover('hide');
        $('#btn_view_sort_food').popover('hide');
        $('#btn_view_sort_drink').popover('hide');
        $('#content_lbl_table_number').hide();
    });
       
    $('.btn_select').click(function(){
        var el = $('<div class="auto_hide">+1</div>'),
            item = $(this).data('id'),
            price = $(this).data('price'),
            sale = $(this).data('sale');
            
        if(sale == ''){
            sale = 0;
        }
        el.appendTo('#footer_head_control').animate({
            top: '-50px',
            opacity: 0
        }, 600);
        if($.cookie('item') == undefined){
            var cookie = [
                {
                    'table': table_number,
                    'id': item,
                    'price': price,
                    'sale': sale,
                    'count': 1
                }
            ];
            $.cookie('item', cookie);
        }else{
            var cookie = $.cookie('item'),
                new_item = new Array(),
                old = false;
            $.each(cookie, function(i, val){
                var old_count = val.count;
                if(val.id == item){
                    old_count += 1;
                    old = true;
                }
                var curr_item = {
                    'table': table_number,
                    'id': val.id,
                    'price': val.price,
                    'sale': val.sale,
                    'count': old_count
                };
                new_item.push(curr_item);
            });
            var item_tam = {
                    'table': table_number,
                    'id': item,
                    'price': price,
                    'sale': sale,
                    'count': 1
            };
            if(old){
                $.cookie('item', new_item);
            }else{
                new_item.push(item_tam);
                $.cookie('item', new_item);
            }            
        }

        $('.hidden_item').show();
        $('.total_item').text(get_item_count('all'));
        $('#total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
        show_curr_count();
    });
    
    $('#txt_search').keypress(function(e) {
        var search = $.trim($(this).val());
        if(e.which == 13 && search != '') {            
            window.location = (url + 'index.php/mobile/search_mobile_control?res_id=' + res_id + '&table=' + table_number + '&type=all&kind=all&hot=all&search=' + search);
        }
    });
    
    $('.btn_control').click(function(){
        var action = $(this).data('action'),
            id = $(this).parent().data('id'),
            count = parseInt($(this).parent().data('count')),
            price = parseInt($(this).parent().data('price')),
            it = $(this).parent();
        switch(action){
            case 'minus':
                if(count > 1){
                    count -= 1;
                    it.data('count', count);
                    it.children('input').val(count);

                    var cookie = $.cookie('item'),
                        new_item = new Array();
                    $.each(cookie, function(i, val){
                        if(val.id == id){
                            var curr_item = {
                                'table': table_number,
                                'id': val.id,
                                'price': val.price,
                                'sale': val.sale,
                                'count': count
                            };
                        }else{
                            var curr_item = {
                                'table': table_number,
                                'id': val.id,
                                'price': val.price,
                                'sale': val.sale,
                                'count': val.count
                            };
                        }
                        
                        new_item.push(curr_item);
                    });
                    $.cookie('item', new_item);
                    $('.hidden_item').show();
                    $('.total_item').text(get_item_count('all'));
                    $('#total_price').text(get_item_price('all'));
                    $('.total_sale').text(get_item_sale('all'));
                    $('.pay').text(get_item_price('all') - get_item_sale('all'));
                    $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
                    $('#content_lbl_table_number').show();
                }
            break;
            case 'plus':
                count += 1;
                it.data('count', count);
                it.children('input').val(count);
                
                var cookie = $.cookie('item'),
                    new_item = new Array();
                $.each(cookie, function(i, val){
                    if(val.id == id){
                        var curr_item = {
                            'table': table_number,
                            'id': val.id,
                            'price': val.price,
                            'sale': val.sale,
                            'count': count
                        };
                    }else{
                        var curr_item = {
                            'table': table_number,
                            'id': val.id,
                            'price': val.price,
                            'sale': val.sale,
                            'count': val.count
                        };
                    }

                    new_item.push(curr_item);
                });
                $.cookie('item', new_item);
                $('.hidden_item').show();
                $('.total_item').text(get_item_count('all'));
                $('#total_price').text(get_item_price('all'));
                $('.total_sale').text(get_item_sale('all'));
                $('.pay').text(get_item_price('all') - get_item_sale('all'));
                $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
                $('#content_lbl_table_number').show();
            break;
            case 'delete':
                delete_id = id;
            break;
        }
    });
    
    $('#btn_delete_item').click(function(){
        if(delete_id != ''){
            var cookie = $.cookie('item'),
                new_item = new Array();
            $.each(cookie, function(i, val){
                if(val.id != delete_id){
                    var curr_item = {
                        'table': table_number,
                        'id': val.id,
                        'price': val.price,
                        'sale': val.sale,
                        'count': val.count
                    };
                    new_item.push(curr_item);
                }
            });
            $.cookie('item', new_item);
        }     
        if(get_item_count('all') == 0){
            $('.hidden_item').hide();
            $('#emty_box').show()
        }
        $('#item_' + delete_id).hide();
        $('.total_item').text(get_item_count('all'));
        $('#total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
        $('#confirm_delete_item').modal('hide');
    });
    
    $(".txt_so_luong").blur(function(){ 
        var id = $(this).parent().data('id'),
            count = parseInt($(this).val()),
            old_count = $(this).parent().data('count');
        
        if(count != old_count && count > 0){
            var cookie = $.cookie('item'),
                new_item = new Array();
            $(this).parent().data('count', count);
            $.each(cookie, function(i, val){
                if(val.id == id){
                    var curr_item = {
                        'table': table_number,
                        'id': val.id,
                        'price': val.price,
                        'sale': val.sale,
                        'count': count
                    };
                    new_item.push(curr_item);
                }else{
                    var curr_item = {
                        'table': table_number,
                        'id': val.id,
                        'price': val.price,
                        'sale': val.sale,
                        'count': val.count
                    };
                    new_item.push(curr_item);
               }                
            });
            $.cookie('item', new_item);
        }else{
            $(".txt_so_luong").val(old_count);
        }
        $('.total_item').text(get_item_count('all'));
        $('#total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
    });
    
    //xu ly su kien thay doi so luong mon an
    $('.curr_count').click(function(){
        var id = $(this).data('id'),
            name = $(this).data('name'),
            image = $(this).data('image'),
            count = 0,
            price = 0;
        
        count = get_item_count(id);
        price = get_item_price(id);
        $('#change_curr_count_image').html('<img src="' + url + 'images/' + res_id + '/' + image + '">');
        $('#change_curr_count_content').children().first().text(name);
        $('#change_curr_count_content').children().last().data('id', id);
        $('#change_curr_count_content').children().last().data('count', count);
        $('#change_curr_count_content').children().last().data('price', price);
        $('#change_curr_count_content').children().last().find('input').val(count);
        $('#change_curr_count').modal('show');
    });
    $('#btn_delete_curr_count').click(function(){
        var id = $(this).parent().data('id');
        if(id != ''){
            var cookie = $.cookie('item'),
                new_item = new Array();
            $.each(cookie, function(i, val){
                if(val.id != id){
                    var curr_item = {
                        'table': table_number,
                        'id': val.id,
                        'price': val.price,
                        'sale': val.sale,
                        'count': val.count
                    };
                    new_item.push(curr_item);
                }
            });
            $.cookie('item', new_item);
        }     
        if(get_item_count('all') == 0){
            $('.hidden_item').hide();
            $('#emty_box').show()
        }
        $('#curr_' + id).hide();
        $('.total_item').text(get_item_count('all'));
        $('#total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('#total_price, .pay, .total_sale').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
        $('#change_curr_count').modal('hide');
    });
    
    $('.icon_tinh_tien').click(function(){
        $.removeCookie('item');
    });
    
    function get_item_count(id){
        var cookie = $.cookie('item'),
            n = 0;
        if(id == 'all'){
            $.each(cookie, function(i, val){
                n += val.count;
            });
        }else{
            $.each(cookie, function(i, val){
                if(val.id == id){
                    n = val.count;
                }
            });
        }
        return n;
    }
    function get_item_price(id){
        var cookie = $.cookie('item'),
            n = 0;
        if(id == 'all'){
            $.each(cookie, function(i, val){
                n += (val.price*val.count);
            });
        }else{
            $.each(cookie, function(i, val){
                if(val.id == id){
                    n = val.price;
                }
            });
        }
        return n;
    }
    function show_curr_count(){
        $('.curr_count').each(function(){
            var id = $(this).data('id');
            if(get_item_count(id) > 0){
                $(this).text(get_item_count(id));
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    }
    function get_item_sale(id){
        var cookie = $.cookie('item'),
            n = 0;
        if(id == 'all'){
            $.each(cookie, function(i, val){
                n += (((val.price*val.sale)/100)*val.count);
            });
        }else{
            $.each(cookie, function(i, val){
                if(val.id == id){
                    n = val.sale;
                }
            });
        }
        return n;
    }
});