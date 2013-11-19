$(function(){
    $.cookie.json = true;
    var d_width = $(window).width(),
        d_height = $(window).height(),
        h_height = parseInt($('#header').css('height')),
        f_height = parseInt($('#footer').css('height')),
        l_width = parseInt($('#left_column').css('width')),
        l_height = 0,
        r_width = 0,
        active_menu = $('#hid_active_menu').val(),
        url = $('#hid_url').val(),
        res_id = $('#hid_res_id').val(),
        table_number = $('#hid_table_number').val(),
        delete_id = '';
    
    if(d_width < 1000){
        $('#left_menu_show').show();
        l_height = d_height - h_height - f_height - 3;
        r_width = d_width;
        $('#left_column').css({
            left: '-250px',
            height: (l_height + 'px'),
            top: ((h_height + 2) + 'px')
        });
        $('#right_column').css({
            height: (l_height + 'px'),
            width: r_width,
            top: ((h_height + 2) + 'px'),
            left: '0px'
        });
    }else{
        $('#left_menu_show').hide();
        l_height = d_height - h_height - f_height - 3;
        r_width = d_width - l_width;
        $('#left_column').css({
            height: (l_height + 'px'),
            top: ((h_height + 3) + 'px')
        });
        $('#right_column').css({
            height: (l_height + 'px'),
            width: r_width,
            top: ((h_height + 3) + 'px'),
            right: '0px'
        });
    }

    $(window).on("orientationchange", function() {
        //alert(window.orientation);
        d_width = $(window).width();
        d_height = $(window).height();
        l_height = d_height - h_height - f_height - 3;
        r_width = d_width - l_width;
        //alert(d_width);
        if(d_width < 1000){
            $('#left_menu_show').show();
            l_height = d_height - h_height - f_height - 3;
            r_width = d_width;
            $('#left_column').css({
                left: '-250px',
                height: (l_height + 'px'),
                top: ((h_height + 2) + 'px')
            });
            $('#right_column').css({
                height: (l_height + 'px'),
                width: r_width,
                top: ((h_height + 2) + 'px'),
                left: '0px'
            });
        }else{
            $('#left_menu_show').hide();
            l_height = d_height - h_height - f_height - 3;
            r_width = d_width - l_width;
            $('#left_column').css({
                height: (l_height + 'px'),
                top: ((h_height + 3) + 'px')
            });
            $('#right_column').css({
                height: (l_height + 'px'),
                width: r_width,
                top: ((h_height + 3) + 'px'),
                right: '0px'
            });
        }
    });
    
    //thiet lap cac thuoc tinh
    $('.hidden_item').hide();
    $('.money, .total_price, .pay').formatNumber({format:"#,### đ", locale:"us"});
    //read cookie
    if($.cookie('item') != undefined){
        if(get_item_count('all') == 0){
            $('.hidden_item').hide();
        }else{
            $('.hidden_item').show();
        }
        
        $('.hidden_item').show();
        $('#gio_hang').removeClass('hidden');
        $('.total_item').text(get_item_count('all'));
        $('.total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('.total_price, .total_sale, .pay').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
    }

    //end cookie
    $('#left_menu_show').hover(
        function(){
            $(this).children().addClass('icon-white');
        },
        function(){
            $(this).children().removeClass('icon-white');
        }    
    );
    $('#left_menu_show').click(function(){
        if(parseInt($('#left_column').css('left')) < 0){
            $('#left_column').animate({
                left: '0px'
            });
        }else{
            $('#left_column').animate({
                left: '-250px'
            });
        }        
    });
    $('.left_menu').click(function(){
        var location = $(this).data('url');
        $(window).attr('location', location);
    });
    
    $(document).hammer().on("tap", function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#sub_control').addClass('hidden');
        $('#gio_hang').addClass('hidden');
        $('#btn_view_sort').popover('hide');
    });
    $('.left_menu').click(function(){
        $('.left_menu').removeClass('left_menu_active');
        $('.left_menu_callout').hide();
        $(this).addClass('left_menu_active');
        $(this).children().first().show();
    });
    $('#btn_control').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#sub_control').toggleClass('hidden');
    });
    $('#btn_table_number').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('#gio_hang').removeClass('hidden');
    });
    //tao popover khi click button sap xem thuc an trang chu
    $('#btn_view_sort').popover({
        trigger: 'manual',
        placement: 'bottom',
        html: true,
        title: 'Sắp xếp theo',
        content: function(){
            return $('#content_view_sort').html();
        }
    });
    $('#btn_view_sort').hammer().on("tap", function(event) {
        event.stopPropagation();
        $('#gio_hang').addClass('hidden');
        $('#sub_control').addClass('hidden');
        $(this).popover('show');
    });
    
    //xu ly su kien chon mon an
    $('.btn_select').click(function(e){
        var px = e.pageX,
            py = e.pageY,
            item = $(this).data('id'),
            price = $(this).data('price'),
            sale = $(this).data('sale');
            
        if(sale == ''){
            sale = 0;
        }
        $('#auto_hide').css({
            top: ((py-10) + 'px'),
            left: (px + 'px'),
            opacity: 1
        }).removeClass('hidden').animate({
            top: ((py - 70) + 'px'),
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
        $('#gio_hang').removeClass('hidden');
        $('.total_item').text(get_item_count('all'));
        $('.total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('.total_price, .total_sale, .pay').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
    });
    
    //xu ly su kien enter search file
    $('#txt_search').keypress(function(e) {
        var search = $.trim($(this).val());
        if(e.which == 13 && search != '') {            
            window.location = (url + 'index.php/tablet_pc/index_tablet_pc_control?res_id=' + res_id + '&table=' + table_number + '&type=all&kind=all&hot=all&search=' + search);
        }
    });
    
    //xu ly su kien them, bot va xoa mon an
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
                    $('#gio_hang').removeClass('hidden');
                    $('.total_item').text(get_item_count('all'));
                    $('.total_price').text(get_item_price('all'));
                    $('.total_sale').text(get_item_sale('all'));
                    $('.pay').text(get_item_price('all') - get_item_sale('all'));
                    $('.total_price, .total_sale, .pay').formatNumber({format:"#,### đ", locale:"us"});
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
                $('#gio_hang').removeClass('hidden');
                $('.total_item').text(get_item_count('all'));
                $('.total_price').text(get_item_price('all'));
                $('.total_sale').text(get_item_sale('all'));
                $('.pay').text(get_item_price('all') - get_item_sale('all'));
                $('.total_price, .total_sale, .pay').formatNumber({format:"#,### đ", locale:"us"});
                $('#content_lbl_table_number').show();
            break;
            case 'delete':
                delete_id = id;
            break;
        }
    });
    //xu ly su kien xoa vat pham tron gio hang
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
        $('.hidden_item').show();
        $('#gio_hang').removeClass('hidden');
        $('.total_item').text(get_item_count('all'));
        $('.total_price').text(get_item_price('all'));
        $('.total_sale').text(get_item_sale('all'));
        $('.pay').text(get_item_price('all') - get_item_sale('all'));
        $('.total_price, .total_sale, .pay').formatNumber({format:"#,### đ", locale:"us"});
        $('#content_lbl_table_number').show();
        $('#confirm_delete_item').modal('hide');
    });
    
    
    
    
    ///dinh nghia cac ham su dung trong site
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