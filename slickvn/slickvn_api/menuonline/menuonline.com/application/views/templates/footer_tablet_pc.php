</div>
<div id="footer">
    <div id="left_menu_show"><span class="icon icon-th"></span></div>
    <div id="footer_search_area" class="form-search">
        <div class="input-prepend">
            <button type="submit" class="btn btn-mini" id="btn_table_number">10</button>
            <input type="text" class="search-query" placeholder="Tìm kiếm" id="txt_search" value="<?php echo $search; ?>">
        </div>
    </div>
</div>
<div id="sub_control" class="hidden">
    <div></div>
    <img src="<?php echo $url.'includes/img/goi_mon.png'; ?>">
    <img src="<?php echo $url.'includes/img/tinh_tien.png'; ?>">
    <img src="<?php echo $url.'includes/img/nhan_vien.png'; ?>">
    <img src="<?php echo $url.'includes/img/about.png'; ?>">
</div>
<div id="gio_hang" class="hidden">
    <div>Bàn số 10</div>
    <div>
        <b>Đã gọi:</b> <span class="total_item">0</span> món <br>
        <b>Tổng tiền: </b> <span id="total_price" class="total_price">0</span><br>
        <b>Khuyến mãi: </b> <span class="total_sale">0</span>
    </div>
    <div>
        <a href="<?php echo $url.'index.php/tablet_pc/box_item_tablet_pc_control?table='.$table_number; ?>">
            <button class="btn btn-warning btn-mini"><span class="icon icon-shopping-cart"></span> Giỏ hàng</button>
        </a>
        <button class="btn btn-warning btn-mini"><span class="icon icon-fire"></span> Gọi món</button>
    </div>
    <div></div>
</div>

<div id="content_view_sort" class="hidden"><?php echo $food_kind; ?></div>
<div id="auto_hide" class="hidden">+1</div>
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
    </body>
</html>