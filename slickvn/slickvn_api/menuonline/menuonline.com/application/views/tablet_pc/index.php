<?php if($result): ?>
<?php
    $n = 0;
    $column_1 = '';
    $column_2 = '';
    $column_3 = '';
    foreach($result as $field){
        $n++;
        if($field['food_sale'] != ''){
            $sale = '<div class="item_sale">-'.$field['food_sale'].'%</div>';
            $star = '
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
            ';
        }else if($field['food_status'] == 2){
            $sale = '<div class="item_sale">Hot</div>';
            $star = '
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
            ';
        }else{
            $sale = '';
            $star = '
                <span class="icon icon-white icon-star"></span>
                <span class="icon icon-white icon-star"></span>
            ';
        }
        if($n == 1){
            $column_1 .= '
                <div class="item">
                    '.$sale.'
                    <img src="'.$url.'images/'.$res_id.'/'.$field['food_image'].'">
                    <div class="item_title">'.$field['food_name'].'</div>
                    <hr>
                    <div class="item_info">
                        Giá: <span class="money">'.$field['food_price'].'</span> <br>
                        '.$star.'
                        <div>'.$field['food_note'].'</div>
                    </div>
                    <div class="item_control">
                        <button type="button" class="btn btn-mini btn-warning"><span class="icon icon-thumbs-up"></span> Thích</button>
                        <button type="button" class="btn btn-mini btn-warning btn_select" data-id="'.$field['_id'].'" data-price="'.$field['food_price'].'" data-sale="'.$field['food_sale'].'"><span class="icon icon-shopping-cart"></span> Chọn</button>
                    </div>
                </div>
            ';
        }elseif($n == 2){
            $column_2 .= '
                <div class="item">
                    '.$sale.'
                    <img src="'.$url.'images/'.$res_id.'/'.$field['food_image'].'">
                    <div class="item_title">'.$field['food_name'].'</div>
                    <hr>
                    <div class="item_info">
                        Giá: <span class="money">'.$field['food_price'].'</span> <br>
                        '.$star.'
                        <div>'.$field['food_note'].'</div>
                    </div>
                    <div class="item_control">
                        <button type="button" class="btn btn-mini btn-warning"><span class="icon icon-thumbs-up"></span> Thích</button>
                        <button type="button" class="btn btn-mini btn-warning btn_select" data-id="'.$field['_id'].'" data-price="'.$field['food_price'].'" data-sale="'.$field['food_sale'].'"><span class="icon icon-shopping-cart"></span> Chọn</button>
                    </div>
                </div>
            ';
        }else{
            $n = 0;
            $column_3 .= '
                <div class="item">
                    '.$sale.'
                    <img src="'.$url.'images/'.$res_id.'/'.$field['food_image'].'">
                    <div class="item_title">'.$field['food_name'].'</div>
                    <hr>
                    <div class="item_info">
                        Giá: <span class="money">'.$field['food_price'].'</span> <br>
                        '.$star.'
                        <div>'.$field['food_note'].'</div>
                    </div>
                    <div class="item_control">
                        <button type="button" class="btn btn-mini btn-warning"><span class="icon icon-thumbs-up"></span> Thích</button>
                        <button type="button" class="btn btn-mini btn-warning btn_select" data-id="'.$field['_id'].'" data-price="'.$field['food_price'].'" data-sale="'.$field['food_sale'].'"><span class="icon icon-shopping-cart"></span> Chọn</button>
                    </div>
                </div>
            ';
        }
    }
?>
<table border="0" align="center">
    <tr valign="top">
        <td align="center">
            <div class="box_item">
                <?php echo $column_1; ?>
            </div>
        </td>
        <td align="center">
            <div class="box_item">
                <?php echo $column_2; ?>
            </div>
        </td>
        <td align="center">
            <div class="box_item">
                <?php echo $column_3; ?>
            </div>
        </td>
    </tr>
</table>
<?php endif; ?>