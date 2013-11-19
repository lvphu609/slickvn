</div>        
    <div id="footer">
            <div id="footer_head_control">
                <button type="button" class="btn btn-warning btn_menu" id="btn_foot_control"><span class="icon icon-th"></span></button>
                <input type="text" class="search-query" placeholder="Search" id="txt_search" value="<?php echo $search; ?>">
                <div id="lbl_table_number" class="animation" title="Bàn số <?php echo $table_number ?>"><?php echo $table_number ?></div>
                <div id="content_lbl_table_number">
                    <div></div>
                    <div>Bàn số <?php echo $table_number ?></div>
                    <div>
                        <table border="0" align="center">
                            <tr>
                                <td><b>Đã gọi:</b></td>
                                <td><span class="total_item">0</span> món</td>
                            </tr>
                            <tr>
                                <td><b>Tổng:</b></td>
                                <td align="right"><span id="total_price">0</span></td>
                            </tr>
                            <tr>
                                <td><b>Khuyến mãi:</b></td>
                                <td align="right"><span id="total_sale" class="total_sale">0</span></td>
                            </tr>
                            <tr>
                                <td><b>Thành tiền:</b></td>
                                <td align="right"><span id="pay" class="pay">0</span></td>
                            </tr>
                        </table>                       
                    </div>
                    <div>
                        <a href="<?php echo $url.'index.php/mobile/box_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all'; ?>">
                            <button class="btn btn-warning btn-mini"><span class="icon icon-shopping-cart"></span> Giỏ hàng</button>
                        </a>
                        <button class="btn btn-warning btn-mini"><span class="icon icon-fire"></span> Gọi món</button>
                    </div>
                </div>
            </div>
            <div id="footer_foot_control">
                <div id="page_1" class="page" data-id="0">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_chuc_nang" data-target="1" title="Chức năng"></div></td>
                            <td width="70px"><div class="btn_icon icon_popover icon_menu" data-target="2" title="Xem menu"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/box_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all'; ?>">
                                <div class="btn_icon icon_popover icon_gio_hang" title="Xem giỏ hàng">
                                    <div class="icon_new hidden_item total_item">0</div>                                   
                                </div>
                                </a>
                            </td>
                            <td width="70px"><div class="btn_icon icon_popover icon_about" title="Giới thiệu"></div></td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_2" class="page"  data-id="1">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_chuc_nang" data-target="0" title="Trở lại"></div></td>
                            <td width="70px">
                                <div class="btn_icon icon_popover icon_goi_mon" title="Các món đã gọi">
                                    <div class="icon_new">5</div>
                                </div>
                            </td>
                            <td width="70px"><div class="btn_icon icon_popover icon_tinh_tien" title="Tính tiền"></div></td>
                            <td width="70px"><div class="btn_icon icon_popover icon_nhan_vien" title="Gọi nhân viên"></div></td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_3" class="page"  data-id="2">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_menu" data-target="0" title="Trở lại"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/index_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=all&kind=all&hot=2'; ?>">
                                    <div class="btn_icon icon_popover icon_hot" data-target="3" title="Các món HOT"></div>
                                </a>
                            </td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_food" data-target="3" title="Thức ăn"></div>
                                
                            </td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_drink" data-target="4" title="Thức uống"></div>
                                
                            </td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_4" class="page"  data-id="3">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_food" data-target="2" title="Trở lại"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/food_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=2'; ?>">
                                    <div class="btn_icon icon_popover icon_sale" title="Khuyến mãi"></div>
                                </a>
                            </td>
                            <td width="70px"><div class="btn_icon icon_food_view_sort" id="btn_view_sort_food"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/box_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all'; ?>">
                                <div class="btn_icon icon_popover icon_gio_hang" title="Xem giỏ hàng">
                                    <div class="icon_new hidden_item total_item">0</div>                                   
                                </div>
                                </a>
                            </td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_5" class="page"  data-id="4">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_drink" data-target="2" title="Trở lại"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/drink_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=drink&kind=all&hot=2'; ?>">
                                    <div class="btn_icon icon_popover icon_sale" title="Khuyến mãi"></div>
                                </a>
                            </td>
                            <td width="70px"><div class="btn_icon icon_drink_view_sort" id="btn_view_sort_drink"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/box_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all'; ?>">
                                <div class="btn_icon icon_popover icon_gio_hang" title="Xem giỏ hàng">
                                    <div class="icon_new hidden_item total_item">0</div>
                                </div>
                                </a>
                            </td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_6" class="page"  data-id="5">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_gio_hang" data-target="0" title="Trở lại"></div></td>
                            <td width="70px"><div class="btn_icon icon_popover icon_goi_mon" title="Gọi món"></div></td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_food" data-target="3" title="Thức ăn"></div>
                                
                            </td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_drink" data-target="4" title="Thức uống"></div>
                                
                            </td>
                        </tr>                    
                    </table>
                </div>
                <div id="page_7" class="page"  data-id="6">
                    <table align="center" border="0">
                        <tr align="center" valign="midle" height="70px">
                            <td width="70px"><div class="btn_icon icon_popover icon_hot" data-target="0" title="Trở lại"></div></td>
                            <td width="70px">
                                <a href="<?php echo $url.'index.php/mobile/box_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all'; ?>">
                                <div class="btn_icon icon_popover icon_gio_hang" title="Xem giỏ hàng">
                                    <div class="icon_new hidden_item total_item">0</div>
                                </div>
                                </a>
                            </td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_food" data-target="3" title="Thức ăn"></div>
                                
                            </td>
                            <td width="70px">
                                
                                    <div class="btn_icon icon_popover icon_drink" data-target="4" title="Thức uống"></div>
                                
                            </td>
                        </tr>                    
                    </table>
                </div>
            </div>
        </div>
        <div id="content_view_sort_food" class="hidden"><?php echo $food_kind; ?></div>
        <div id="content_view_sort_drink" class="hidden"><?php echo $drink_kind; ?></div>
        <div id="confirm_delete_item" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel">Xác nhận...</h3>
            </div>
            <div class="modal-body">
              <p class="text-error text-center">Bạn có muốn xóa vật phẩm khỏi giỏ hàng?</p>
            </div>
            <div class="modal-footer">
              <button class="btn" id="btn_delete_item">Xóa</button>
              <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Hủy</button>
            </div>
        </div>
        
        <!-- dialog canh bao thay doi so luong vat pham -->
        <div id="change_curr_count" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="change_curr_count_title" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="change_curr_count_title">Cập nhật số lượng!</h3>
            </div>
            <div class="modal-body">
                <table border="0" align="center">
                    <tr>
                        <td id="change_curr_count_image">
                            <img src="<?php echo $url.'includes/img/hot.png'; ?>">
                        </td>
                        <td align="center" id="change_curr_count_content">
                            <div class="text-warning">Canh ga chien nuoc mam</div>
                            <div class="input-prepend input-append" data-id="" data-count="" data-price="">
                                <button class="btn btn-mini btn-warning btn_control" data-action="minus" type="button"><span class="icon icon-minus"></span></button>
                                <input type="text" class="txt_so_luong" value="">
                                <button class="btn btn-mini btn-warning btn_control" data-action="plus" type="button"><span class="icon icon-plus"></span></button>
                                <button class="btn btn-mini btn-warning btn_control" type="button" id="btn_delete_curr_count"><span class="icon icon-trash"></span></button>
                            </div>
                        </td>
                    </tr>
                </table>             
            </div>
            <div class="modal-footer">
                <button class="btn" id="btn_change_curr_count" data-dismiss="modal" aria-hidden="true">Xong</button>               
            </div>
        </div>
    </body>
</html>