<?php
    require_once(APPPATH.'libraries/recaptchalib.php');
    $publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
    $privatekey = "6Lcx1eISAAAAALY5Q7asfiEraMsZtf3dHmcvZrpk";
    $resp = null;
    $error = null;
?>
<div id="content">    
    <div id="restaurant_register">
        <img src="<?php echo $url; ?>images/phone.png" class="img_1">
        <form method="post" action="<?php echo $url; ?>index.php/restaurant_register_control/restaurant_register" id="frm_restaurant_register">
            <fieldset>
                <legend>Kết nối nhà hàng bạn vào MenuOnline</legend>
                <div>
                    <h2>Thông tin nhà hàng</h2>
                    <p>
                        <label>Tên nhà hàng <span>(*)</span></label><br>
                        <input type="text" name="txt_restaurant_name" value="<?php echo $restaurant_name ?>" id="txt_restaurant_name" placeholder="Tên nhà hàng">
                        <span id="txt_restaurant_name_check"></span>
                    </p>
                    <p>
                        <label>Tỉnh/Thành phố: <span>(*)</span></label><br>
                        <select type="text" name="cbo_restaurant_province" id="cbo_restaurant_province" >
                            <option value="none">Chọn Tỉnh/Thành phố</option>
                            <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="An Giang">An Giang</option>
                        </select>
                        <input type="hidden" id="hid_province" value="<?php echo $restaurant_province; ?>">
                        <span id="txt_restaurant_province_check"></span>
                    </p>
                    <p>
                        <label>Địa chỉ nhà hàng <span>(*)</span></label><br>
                        <input type="text" name="txt_restaurant_address" value="<?php echo $restaurant_address ?>" id="txt_restaurant_address" placeholder="Địa chỉ nhà hàng">
                        <span id="txt_restaurant_address_check"></span>
                    </p>
                    <p>
                        <label>Tên của bạn <span>(*)</span></label><br>
                        <input type="text" name="txt_restaurant_owner" value="<?php echo $restaurant_owner ?>" id="txt_restaurant_owner" placeholder="Tên của bạn">
                        <span id="txt_restaurant_owner_check"></span>
                    </p>
                    <p>
                        <label>Email của bạn <span>(*)</span></label><br>
                        <input type="text" name="txt_restaurant_email" value="<?php echo $restaurant_email ?>" id="txt_restaurant_email" placeholder="Email của bạn">
                        <span id="txt_restaurant_email_check"></span>
                    </p>
                    <p>
                        <label>Số điện thoại của bạn <span>(*)</span></label><br>
                        <input type="text" name="txt_restaurant_phone" value="<?php echo $restaurant_phone ?>" id="txt_restaurant_phone" placeholder="Số điện thoại của bạn">
                        <span id="txt_restaurant_phone_check"></span>
                    </p>
                    <p>
                        <label>Thông tin chi tiết nhà hàng</label><br>
                        <input type="text" name="txt_restaurant_note" value="<?php echo $restaurant_note ?>" id="txt_restaurant_note" placeholder="Thông tin chi tiết nhà hàng">
                    </p>
                    <p>
                        <?php echo recaptcha_get_html($publickey, $error); ?>
                        <input type="hidden" value="" name="hid_challenge" id="hid_challenge">
                        <input type="hidden" value="" name="hid_response" id="hid_response">
                        <span id="txt_restaurant_code_check"><?php echo $error_code; ?></span>
                    </p>        
                    <p>
                        <button type="button" id="btn_restaurant_submit">Hoàn tất</button>
                        <span id="btn_restaurant_submit_check"></span>
                        <input type="hidden" value="<?php echo $hid_submit; ?>" id="hid_submit">
                    </p>
                </div>
            </fieldset>
        </form>
    </div>
</div>