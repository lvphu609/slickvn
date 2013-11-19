
<?php $url=  base_url();?>


<div id="member_page">
  <div id="content_member_page">
   <div class="member_page_title">
     <span><div class=member_page_text">Danh sách thành viên</div></span>
   </div>
   <div class="line_title"></div></br>
   <div class="create_new_member">
     <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_member">
        <div class="btn_create_new_member">
            <div class="left"></div>
            <div class="middle"><span><div class="text_center">Tạo mới thành viên</div></span></div>
            <div class="right"></div>
        </div>
     </a>
   </div>
   <div class="member_list">
     <!--title-->
     <ul class="box_info">
       <li class="stt_member">
         <span>STT</span>
       </li>
       <li class="code_member">
         <span>Mã thành viên</span>
       </li>
       <li class="name_member">
         <span>Họ và tên</span>
       </li>
       <li class="job_member">
         <span>Nghề nghiệp</span>
       </li>
       <li class="email_member">
         <span>Email</span>
       </li>
       <li class="phonenumber_member">
         <span>Điện thoại</span>
       </li>
       <li class="company">
         <span>Công ty</span>
       </li>
       <li class="update_delete">
       </li>
     </ul>
     
     <!--List member-->
     
     <ul class="box_info">
       <li class="stt_member">
         <span>11</span>
       </li>
       <li class="code_member">
         <span>#21</span>
       </li>
       <li class="name_member">
         <span>Lê Vĩnh Phú</span>
       </li>
       <li class="job_member">
         <span>IT lap trinh vien php</span>
       </li>
       <li class="email_member">
         <span>phule@innoria.com</span>
       </li>
       <li class="phonenumber_member">
         <span>01665847138</span>
       </li>
       <li class="company">
         <span>innoria</span>
       </li>
       <li class="update_delete">
         <a href="#"><div class="edit"></div></a>
         <a href="#"><div class="delete"></div></a>  
       </li>
     </ul>
     
     
     
     
     
     
     
   </div>
   
    
    
    
    
  </div>
</div>