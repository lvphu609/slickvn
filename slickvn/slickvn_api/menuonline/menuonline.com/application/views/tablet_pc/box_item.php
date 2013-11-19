<div class="box_item_content">
<?php 
    if($result):
?>
<?php foreach($result as $field): ?>
<div class="box_item_row" id="item_<?php echo (string)$field['_id']; ?>">
    <table border="0" width="100%">
        <tr>
            <td><img src="<?php echo $url.'images/'.$res_id.'/'.$field['food_image']; ?>"></td>
            <td width="50%" align="left" class="item_info_title"><?php echo $field['food_name']; ?></td>
            <td width="130px" align="right" class="item_info_price"><span class="money"><?php echo $field['food_price']; ?></span></td>
            <td align="right">
                <div class="input-prepend input-append" data-id="<?php echo (string)$field['_id']; ?>" data-count="<?php echo $item_count[(string)$field['_id']]; ?>" data-price="<?php echo $field['food_price']; ?>">
                    <button class="btn btn-mini btn-warning btn_control" data-action="minus" type="button"><span class="icon icon-minus"></span></button>
                    <input type="text" class="txt_so_luong" value="<?php echo $item_count[(string)$field['_id']]; ?>">
                    <button class="btn btn-mini btn-warning btn_control" data-action="plus" type="button"><span class="icon icon-plus"></span></button>
                    <button class="btn btn-mini btn-warning btn_control" data-action="delete" data-toggle="modal" data-target="#confirm_delete_item" type="button"><span class="icon icon-trash"></span></button>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="error">Không có món nào trong giỏ hàng!</div>
<?php endif; ?>
</div>