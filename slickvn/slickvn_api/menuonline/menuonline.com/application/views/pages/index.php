<?php
    require_once(APPPATH.'libraries/recaptchalib.php');
    $publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
    $privatekey = "6Lcx1eISAAAAALY5Q7asfiEraMsZtf3dHmcvZrpk";
    $resp = null;
    $error = null;
?>
<div id="slide_show">
    <div id="slide_show_content">
        <img src="<?php echo $url; ?>/images/slide_1.png">
        <img src="<?php echo $url; ?>/images/slide_2.png">
        <img src="<?php echo $url; ?>/images/slide_3.png">
        <div id="slide_show_info">
            <div id="info_text">Chọn nhà hàng xem Menu Online</div>
            <div id="info_address">
                <div id="address_select" data-selected="1" class="cbo">
                    <ul>
                        <li value="1">Chọn địa điểm</li>
                        <li value="2">Ha Noi</li>
                        <li value="3">Binh Duong</li>
                        <li value="4">TP. Ho Chi Minh</li>
                        <li value="5">Can Tho</li>
                        <li value="6">An Giang</li>
                        <li value="7">Vinh Long</li>
                    </ul>
                    <div>&blacktriangledown;</div>
                </div>
            </div>
            <div id="info_restaurant">
                <div id="restaurant_select" data-selected="1" class="cbo">
                    <ul>
                        <li value="1">Chọn nhà hàng</li>
                        <li value="2">Hoa Binh</li>
                        <li value="3">Thang Loi</li>
                        <li value="4">Bon Mua</li>
                        <li value="5">7 Ky Quan</li>
                        <li value="6">Hai Lua</li>
                        <li value="7">Tu Quy</li>
                    </ul>
                    <div>&blacktriangledown;</div>
                </div>
            </div>
            <div id="info_search">
                <input type="text" placeholder="Tìm nhà hàng" title="Tìm nhà hàng">
                <div id="info_search_icon">
                    <img src="<?php echo $url; ?>/images/search.png">
                </div>
                <div id="info_search_delete" class="ui-icon ui-icon-close" title="erase"></div>
            </div>
            <div id="info_btn">
                <input type="button" value="Xem Menu">
            </div>
            <div id="info_like">
                <iframe src="https://www.facebook.com/plugins/like.php?href=http://web-developers.co.nr" scrolling="no" frameborder="0" style="border:none; width:450px; height:80px"></iframe>
            </div>
        </div>
    </div>
</div>
<div id="sub_banner">
    <img src="<?php echo $url.'images/'.$banner; ?>">
</div>
<div id="content">
    <div id="top_food" class="list_item">
        <table border="0" cellpadding="0" cellspacing="0" width="920px" align="center" class="table_item">
            <thead>
                <tr>
                    <td collspan="3" valign="midle">
                        <a href="#">Top món ăn</a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/bach_tuoc_nuong.png">
                            <div class="item_title"><a href="#">Bạch tuộc nướng</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/bo_bit_tet.png">
                            <div class="item_title"><a href="#">Bò Bít Tết</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/canh_ga_chien_nuoc_mam.png">
                            <div class="item_title"><a href="#">Cánh gà chiên nước mắm</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/cua_rang_mo.png">
                            <div class="item_title"><a href="#">Cua rang mỡ</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/ga_quay.png">
                            <div class="item_title"><a href="#">Gà quay Bắc Kinh</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/hai_san_lui.png">
                            <div class="item_title"><a href="#">Hải sản nướng lụi</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/mi_xao_gion.png">
                            <div class="item_title"><a href="#">Mì Xào giòn</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/nem_nuong.png">
                            <div class="item_title"><a href="#">Nem nướng</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                    <td>
                        <div class="item_box">
                            <img src="<?php echo $url; ?>/images/foods/so_rang_me.png">
                            <div class="item_title"><a href="#">Sò rang me</a></div>
                            <div class="item_detail">Nha hang ABC, so 115 Nguyen Thai Hoc - Long Xuyen - An Giang</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="top_restaurant" class="list_item">
        <br>
        <div class="table_item"><a href="#">Top nhà hàng</a></div>
        <center><div id="top_restaurant_slide_show">
            <ul>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_1.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_2.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_3.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_1.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_2.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_3.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_1.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_2.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
                <li><img src="<?php echo $url; ?>/images/restaurants/res_3.png" class="reflect"><p>Nhà hàng chúng tôi chuyên cung cấp các loại hải sản tươi sống...</p></li>
            </ul>
        </div></center>        
    </div>
    <div id="business" class="list_item">
        <div>
            <table border="0" width="920" align="center" cellpadding="0" cellspacing="0">
                <tr heigh="100" valign="midle">
                    <td width="320">
                        <div id="business_left">
                            <img src="<?php echo $url; ?>/images/alovi.png">
                        </div>
                    </td>
                    <td width="580">
                        <div id="business_right">
                                Chưa bao giờ dịch vu nhà hàng của bạn lại trở nên thú vị và tiện lợi như ở MenuOnline. Đăng ký ngay với chúng tôi để mang cả thế giới MenuOnline về nhà hàng bạn!
                                <button><a href="<?php echo $url; ?>index.php/nha_hang_dang_ky">Đăng ký ngay</a></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>        
    </div>
</div>
<div id="dialog_login">
    <div>
        <ul>
            <li><a href="#tab_login">Đăng nhập</a></li>
            <li><a href="#tab_register">Đăng ký</a></li>
        </ul>
        <div id="tab_login">
            <table border="0" align="center" cellspacing="5px">
                <tr>
                    <td align="right">Email</td>
                    <td><input type="text" id="txt_email_login" placeholder="Email đăng nhập"></td>
                </tr>
                <tr>
                    <td align="right">Mật khẩu</td>
                    <td><input type="password" id="txt_password_login" placeholder="Mật khẩu"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <label><input type="checkbox" id="chk_save_password" checked="checked"> Luôn đăng nhập</label>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2"><button class="btn_close" >Đóng</button><button id="btn_login" >Đăng nhập</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="error" id="lbl_login_error"></td>
                </tr>
            </table>
        </div>
        <div id="tab_register">
            <table border="0" align="center" cellspacing="5px">
                <tr>
                    <td align="right">Email</td>
                    <td><input type="text" id="txt_user_email" placeholder="Email đăng nhập"></td>
                </tr>
                <tr>
                    <td align="right">Mật khẩu</td>
                    <td><input type="password" id="txt_user_password" placeholder="Mật khẩu"></td>
                </tr>
                <tr>
                    <td align="right">Nhập lại</td>
                    <td><input type="password" id="txt_user_password_again" placeholder="Nhập lại mật khẩu"></td>
                </tr>
                <tr>
                    <td align="right">Phone</td>
                    <td><input type="text" id="txt_user_phone" placeholder="Số điện thoại"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo recaptcha_get_html($publickey, $error); ?>
                    </td>
                </tr>                
                <tr align="center">
                    <td colspan="2"><button class="btn_close" >Đóng</button><button id="btn_register" >Đăng ký</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>
        