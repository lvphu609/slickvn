<?php $url=  base_url();?>


<div id="create_new_member">
  <div id="content_create_new_member">
   <div class="create_new_member_title">
     <span><div class=create_new_member_text">Tạo mới thành viên</div></span>
   </div>
   <div class="line_title"></div></br>
   
   <div class="member_info_title">
     <span>Thông tin thành viên</span>
   </div>
   
   <div class="box_input">
     <div class="image_profile"> 
       <span>ẢNH</span><br>
       <span>(Tải ảnh lên)</span>
     </div>
     <div class="name_profile">
        <span>HỌ VÀ TÊN*</span><br>
        <input class="input_text" type="text" placeholder="vd. Nguyễn Văn A" name="" >
     </div>
     <div class="job_profile">
        <span>NGHỀ NGHIỆP*</span><br>
        <input class="input_text" type="text" placeholder="vd. Kế toán viên" name="">
     </div>
     <div class="phone_number_profile">
        <span>ĐIỆN THOẠI*</span><br>
        <input class="input_text" type="text" placeholder="vd. 01665847138" name="">
     </div>
     <div class="company_profile">
        <span>CÔNG TY</span><br>
        <input class="input_text" type="text" placeholder="vd. Cty TNHH ABC" name="">
     </div>
     <div class="email_profile">
        <span>EMAIL</span><br>
        <input class="input_text" type="text" placeholder="vd. nva@aaa.com" name="">
     </div>
     <div class="facebock_url_profile">
        <span>FACEBOOK URL</span><br>
        <input class="input_text" type="text" placeholder="http://" name="">
     </div>
     <div class="code_member_profile">
        <span>MÃ THÀNH VIÊN*</span><br>
        <input class="input_text" type="text" placeholder="vd. SLI1223" name="">
     </div>
     <div class="password_profile">
        <span>MẬT KHẨU BAN ĐẦU*</span><br>
        <input class="input_text" type="password" placeholder="vd. 123456" name="">
     </div>
     <div class="line_title"></div></br>
     <div class="introduce_member_profile">
        <span>GIỚI THIỆU THÀNH VIÊN</span><br>
        <textarea class="input_textarea" name=""></textarea>
     </div>
     <div class="btn_save_cancel">
       <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_member_success">
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