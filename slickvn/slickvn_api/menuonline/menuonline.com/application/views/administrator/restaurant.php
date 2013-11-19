<input type="hidden" id="curr_page" value="btn_restaurant">
<div id="tab">
    <ul>
        <li><a href="#tabs-1">Đăng ký mới</a></li>
        <li><a href="#tabs-2">Danh sách nhà hàng</a></li>
        <li><a href="#tabs-3">Nhà hàng bị khóa</a></li>
    </ul>
    <div id="tabs-1">
            <h4 class="content_title">Danh sách nhà hàng đăng ký mới</h4>           
            <?php if($result_new): ?>
            <div>
            <?php
                $n = 0;
                foreach($result_new as $field):
                    $n++;
            ?>
            
                <span><?php echo $n.') '; ?>Nhà hàng <?php echo $field['restaurant_name']; ?></span>
                <table border="0" cellpadding="5" cellspacing="0" width="800px" align="center">
                    <thead>
                        <tr valign="midle">
                            <td colspan="2" align="right">
                                <b>Ngày đăng ký:</b> 
                                <?php 
                                    $date_mongo = $field['restaurant_create_date'];
                                    $date_arr = explode(' ', $date_mongo);
                                    $date_curr = date("Y-m-d H:i:s", $date_arr[1]);
                                    echo $date_curr;
                                ?>
                            </td>                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr valign="midle">
                            <td align="right" width="200px">
                                Tỉnh/Thành phố:
                            </td>
                            <td width="600px">
                                <?php echo $field['restaurant_province']; ?>
                            </td>
                        </tr>
                        <tr valign="midle">
                            <td align="right" width="200px">
                                Địa chỉ:
                            </td>
                            <td width="600px">
                                <?php echo $field['restaurant_address']; ?>
                            </td>
                        </tr>
                        <tr valign="midle">
                            <td align="right">
                                Người đăng ký:
                            </td>
                            <td>
                                <?php echo $field['restaurant_owner']; ?>
                            </td>
                        </tr>
                        <tr valign="midle">
                            <td align="right">
                                Email:
                            </td>
                            <td>
                                <?php echo $field['restaurant_email']; ?>
                            </td>
                        </tr>
                        <tr valign="midle">
                            <td align="right">
                                Số điện thoại:
                            </td>
                            <td>
                                <?php echo $field['restaurant_phone']; ?>
                            </td>
                        </tr>
                        <tr valign="midle">
                            <td align="right">
                                Thông tin khác:
                            </td>
                            <td>
                                <?php echo $field['restaurant_note']; ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr valign="midle">
                            <td colspan="2" align="center">
                                <label><input type="radio" value="false" name="<?php echo $field['_id']; ?>" class="choice_control_no">Hủy bỏ</label>
                                <label><input type="radio" value="true" name="<?php echo $field['_id']; ?>" class="choice_control_yes">Xác nhận</label>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <br>
                <?php endforeach; ?>
            </div>
            <div id="tab_control">
                <input type="button" value="Cancer" id="btn_cancer_new_register">
                <input type="button" value=" Save " id="btn_save_new_register">
            </div>
            <form action="<?php echo $url; ?>index.php/administrator/restaurant_administrator_control/commit" method="post" id="frm_restaurant_commit">
                <input type="hidden" value="none" name="hid_id_yes" id="hid_id_yes">
                <input type="hidden" value="none" name="hid_id_no" id="hid_id_no">
            </form>
            <?php else: ?>
            <div class="error">Không có nhà hàng nào!</div>
            <?php endif; ?>
        </div>
        <div id="tabs-2" class="tabs">
            <h4 class="content_title">Danh sách nhà hàng</h4>            
            <div id="tabs-2_content"></div>
        </div>
        <div id="tabs-3" class="tabs">
            <h4 class="content_title">Danh sách nhà hàng bị khóa</h4>            
            <div id="tabs-3_content"></div>
        </div>
</div>
<div id="dialog_view"></div>
<div id="dialog_edit"></div>
<div id="dialog_lock">
    <div id="dialog_lock_content" data-id=""></div>
    <div id="lbl_lock_error" class="error"></div>
</div>
<div id="dialog_unlock">
    <div id="dialog_unlock_content" data-id=""></div>
    <div id="lbl_unlock_error" class="error"></div>
</div>
<div id="dialog_delete">
    <div id="dialog_delete_content" data-id=""></div>
    <div id="lbl_delete_error" class="error"></div>
</div>
