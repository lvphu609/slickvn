<?php $url=  base_url();?>


<div id="create_new_restaurant">
  <div id="content_create_new_restaurant">
    <div class="create_new_restaurant_title">
     <span><div class=create_new_restaurant_text">Tạo mới nhà hàng</div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="restaurant_info_title">
     <span>Tên nhà hàng</span>
   </div>
   
   <div class="box_input">
     <div class="image_profile"> 
       <span>ẢNH AVATAR ĐẠI DIỆN</span><br>
       <span>(Tải ảnh lên)</span>
     </div>
     <div class="name_profile">
        <span>TÊN NHÀ HÀNG*</span><br>
        <input class="input_text" type="text" placeholder="vd. Hương Sen" name="" >
     </div>
     <div class="email_profile">
        <span>EMAIL</span><br>
        <input class="input_text" type="text" placeholder="vd. huongsen@gmail.com" name="">
     </div>
     <div class="job_profile">
        <span>ĐỊA CHỈ</span><br>
        <input class="input_text" type="text" placeholder="vd. Bình Chánh district, HCMC" name="">
     </div>
     <div class="phone_number_profile">
        <span>ĐIỆN THOẠI*</span><br>
        <input class="input_text" type="text" placeholder="vd. 01665847138" name="">
     </div>
     <div class="company_profile">
        <span>LINK WEB SITE NHÀ HÀNG</span><br>
        <input class="input_text" type="text" placeholder="vd. http://slick.vn" name="">
     </div>
     <div class="facebock_url_profile">
        <span>FACEBOOK URL</span><br>
        <input class="input_text" type="text" placeholder="http://" name="">
     </div>
     <div class="code_restaurant_profile">
        <span>MÃ THÀNH VIÊN*</span><br>
        <input class="input_text" type="text" placeholder="vd. SLI1223" name="">
     </div>
     <div class="password_profile">
        <span>MẬT KHẨU BAN ĐẦU*</span><br>
        <input class="input_text" type="password" placeholder="vd. 123456" name="">
     </div>
     <div class="line_title"></div></br>
     <div class="introduce_restaurant_profile">
        <span>MÔ TẢ NGẮN VỀ NHÀ HÀNG</span><br>
        <textarea class="input_textarea" name=""></textarea>
     </div>
     <div class="btn_save_cancel">
       <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_restaurant_success">
        <div class="btn_save">
          <lable><div class="center_text">Lưu</div></lable>
        </div>
       </a>
       <a href="#">
        <div class="btn_cancel">
          <lable><div class="center_text">Hủy</div></lable>
        </div>
       </a>
     </div>
   </div>
  </div>
</div>