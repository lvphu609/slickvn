<input type="hidden" id="curr_page" value="btn_menu">
<div id="panel_upload_food" class="tabs">
    <form action="<?php echo $url.'index.php/restaurant/menu_admin_res_control/index?type='.$type.'&page='.$page; ?>" method="post" enctype="multipart/form-data" id="frm_food_upload">
        <fieldset>
            <legend id="btn_control_upload_frm" data-toggle="collapse" data-target="#box_upload" class="text-right">Upload food <span class="icon icon-chevron-down"></span></legend>                       
            <div id="box_upload" class="collapse <?php if($upload_error != '') echo ''; else echo 'in'; ?>">
                <table border="0" class="table">
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Loại</h4></td>
                        <td align="center">
                            <label class="text-warning inline"><input type="radio" name="rdo_food_kind" id="rdo_food" class="rdo_choose_food" value="food" checked="checked"> Thức ăn</label>
                            <label class="text-warning inline"><input type="radio" name="rdo_food_kind" id="rdo_drink" class="rdo_choose_food" value="drink"> Thức uống</label>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Chọn hình </h4></td>
                        <td><input type="file" name="file_upload" id="fle_food_upload" class="btn btn-warning"></td>
                    </tr>
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Phân loại </h4></td>
                        <td>
                            <div id="panel_cbo_food">
                                <?php echo $cbo_food; ?>
                            </div>
                            <div id="panel_cbo_drink">
                                <?php echo $cbo_drink; ?>
                            </div>                           
                            <button role="button" data-toggle="modal" data-target="#dialog_add_kind" id="btn_them_loai" class="btn btn-warning btn-mini">Thêm phân loại</button>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Tên món ăn/thức uống </h4></td>
                        <td><input type="text" name="txt_food_name" id="txt_food_name" value="" placeholder="Tên món ăn/thức uống"></td>
                    </tr>                
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Giá </h4></td>
                        <td><input type="text" name="txt_food_price" id="txt_food_price" value="" placeholder="Giá sản phẩm"></td>
                    </tr>
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Khuyến mãi </h4></td>
                        <td>
                            <div class="input-append">
                                <input type="text" name="txt_food_sale" id="txt_food_sale" class="text-center text-warning input-mini" value="0">
                                <span class="add-on">%</span>
                            </div>
                            
                            <div id="slide_food_sale"></div>
                        </td>
                    </tr>
                    <tr>
                        <td align="right"><h4 class="text-error text-right">Ghi chú </h4></td>
                        <td><input type="text" name="txt_food_note" id="txt_food_note" value="" placeholder="Mô tả món ăn"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <div class="text-center">
                                <button class="btn btn-warning" type="button" id="btn_food_upload"><span class="icon-thumbs-up"></span> Upload</button>
                                <div class="error"><?php echo $upload_error; ?></div>
                                <input type="hidden" name="hid_restaurant_id" id="hid_restaurant_id" value="<?php echo $id; ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>            
        </fieldset>        
    </form>
    <div class="btn-group">
        <?php
            if($type == 'food'){
                $disable_food = 'disabled';
                $disable_drink = '';
            }else{
                $disable_drink = 'disabled';
                $disable_food = '';
            }
        ?>
        <a class="btn btn-primary <?php echo $disable_food; ?>" href="<?php echo $url.'index.php/restaurant/menu_admin_res_control/index?type=food'; ?>">Thức ăn</a>
        <a class="btn btn-primary <?php echo $disable_drink; ?>" href="<?php echo $url.'index.php/restaurant/menu_admin_res_control/index?type=drink'; ?>">Thức uống</a>
        <input id="txt_search_food" name="txt_search_food" placeholder="Tìm kiếm">
        <button class="btn" type="button"><span class="icon icon-search"></span></button>
    </div>
    
    <br>
    <?php 
        if($result):
            $n = 0;
            if($sum >= 2){
                if($page == 1){
                    $not_pre = 'class="disabled"';
                }else{
                    $not_pre = '';
                }
                if($page == $sum){
                    $not_next = 'class="disabled"';
                }else{
                    $not_next = '';
                }
                echo '
                    <div class="pagination">
                        <ul>
                            <li '.$not_pre.'><a href="'.$url.'index.php/restaurant/menu_admin_res_control/index?type='.$type.'&page='.($page-1).'">Prev</a></li>
                ';
                for($i=1; $i<=$sum; $i++){
                    if($page == $i){
                        $disable = 'class="disabled"';
                    }else{
                        $disable = '';
                    }
                    echo '<li '.$disable.'><a href="'.$url.'index.php/restaurant/menu_admin_res_control/index?type='.$type.'&page='.$i.'">'.$i.'</a></li>';
                }
                echo '
                            <li '.$not_next.'><a href="'.$url.'index.php/restaurant/menu_admin_res_control/index?type='.$type.'&page='.($page+1).'">Next</a></li>                            
                        </ul>
                    </div>
                ';
            }else{
                echo '<br>';
            }
    ?>
    
    <table border="0" cellpadding="5" cellspacing="0" width="700px" class="table_food">
        <thead>
            <tr valign="midle">
                <td width="50">STT</td>
                <td width="100" align="center"></td>
                <td width="550" align="center">Thông tin</td>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($result as $field):
            $n++;
    ?>
    
        <tr valign="midle" align="center" id="<?php echo $field['_id']; ?>">
            <td><?php echo $n; ?></td>
            <td><img src="<?php echo $url.'images/'.$id.'/'.$field['food_image']; ?>"></td>
            <td align="right" style="position: relative;">
                <table class="no_border" width="100%">
                    <tr>
                        <td align="right" width="150"><b class="text-warning">Tên món:</b></td>
                        <td width="400"><h4><?php echo $field['food_name']; ?></h4></td>
                    </tr>
                    <tr>
                        <td align="right"><b class="text-warning">Loại:</b></td>
                        <td><?php echo $field['food_kind']; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><b class="text-warning">Ghi chú:</b></td>
                        <td><?php echo $field['food_note']; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><b class="text-warning">Giá:</b></td>
                        <td class="format_number"><?php echo $field['food_price']; ?></td>
                    </tr>
                    <tr>
                        <td align="right"><b class="text-warning">Khuyến mãi:</b></td>
                        <td><?php echo $field['food_sale']; ?>%</td>
                    </tr>
                    <tr>
                        <td align="right"><b class="text-warning">Món Hot:</b></td>
                        <td>
                            <?php 
                                if($field['food_status'] == 2){
                                    echo '
                                        <span class="icon icon-star"></span>
                                        <span class="icon icon-star"></span>
                                        <span class="icon icon-star"></span>
                                        <span class="icon icon-star"></span>
                                        <span class="icon icon-star"></span>
                                    ';
                                }else{
                                    echo '<i>none</i>';
                                }
                            ?>
                        </td>
                    </tr>
                </table>
                <div class="control_panel">
                    <a href="#dialog_edit_food" role="button" class="icon icon-wrench" data-toggle="modal" data-action="edit" data-id="<?php echo $field['_id']; ?>" data-type="<?php echo $type; ?>" data-kind="<?php echo $field['food_kind']; ?>" title="Chỉnh sửa thông tin"></a>&NegativeMediumSpace;
                    <a href="#" role="button" class="icon icon-off" data-toggle="modal" data-action="disable" data-id="<?php echo $field['_id']; ?>" title="Không hiện món ăn ra menu"></a>&NegativeMediumSpace;
                    <a href="#" role="button" class="icon icon-trash" data-toggle="modal" data-action="delete" data-id="<?php echo $field['_id']; ?>" title="Xóa món ăn khỏi nhà hàng"></a>
                </div>
            </td>
        </tr>        
    <?php endforeach; ?>
        </tbody>
    </table>    
    <?php else: ?>
    <div class="error">Không có món nào trong menu!</div>
    <?php endif; ?>
</div>

<div id="dialog_edit_food" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Chỉnh sửa thông tin...</h3>
    </div>
    <div class="modal-body" id="dialog_edit_food_content"></div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" type="button" id="btn_edit_food_save">Save changes</button>
    </div>
</div>

<div id="dialog_add_kind" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="dialog_add_kind_title" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="dialog_add_kind_title"><span id="add_kind_title">Thêm phân loại thức ăn...</span></h3>
    </div>
    <div class="modal-body">
        <div class="control-group form-horizontal">
            <label class="control-label" for="txt_name_kind_add">Tên phân loại</label>
            <div class="controls">
                <input type="text" id="txt_name_kind_add" value="" placeholder="Tên phân loại">
            </div>
        </div>
        <div class="error" id="lbl_add_kind_error"></div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn_add_food_type">Thêm</button>
    </div>
</div>