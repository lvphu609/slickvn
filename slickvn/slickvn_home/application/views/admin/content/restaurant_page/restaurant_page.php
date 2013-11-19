
<?php $url=  base_url();?>


<div id="restaurant_page">
  <div id="content_restaurant_page">
   <div class="restaurant_page_title">
     <span><div class="restaurant_page_text">Danh sách nhà hàng</div></span>
   </div>
   <div class="line_title"></div></br>
   <div class="create_new_restaurant">
     <a href="<?php echo $url;?>index.php/admin/admin_controller/create_new_restaurant">
        <div class="btn_create_new_restaurant">
            <div class="left"></div>
            <div class="middle"><span><div class="text_center">Tạo mới nhà hàng</div></span></div>
            <div class="right"></div>
        </div>
     </a>
   </div>
   <div class="restaurant_list">
     <!--title-->
     <ul class="box_info">
       <li class="stt_restaurant">
         <span>STT</span>
       </li>
<!--       <li class="code_restaurant">
         <span>Mã nhà hàng</span>
       </li>-->
       <li class="name_restaurant">
         <span>Tên nhà hàng</span>
       </li>
<!--       <li class="job_restaurant">
         <span>Nghề nghiệp</span>
       </li>-->
       <li class="email_restaurant">
         <span>Email quản trị</span>
       </li>
       <li class="phonenumber_restaurant">
         <span>Điện thoại</span>
       </li>
<!--       <li class="company">
         <span>Công ty</span>
       </li>-->
       <li class="update_delete">
       </li>
     </ul>
     
     <!--List member-->
     
     <ul class="box_info">
       <li class="stt_restaurant">
         <span>11</span>
       </li>
<!--       <li class="code_restaurant">
         <span>#21</span>
       </li>-->
       <li class="name_restaurant">
         <span>Hương Sen</span>
       </li>
<!--       <li class="job_restaurant">
         <span>IT lap trinh vien php</span>
       </li>-->
       <li class="email_restaurant">
         <span>phule@innoria.com</span>
       </li>
       <li class="phonenumber_restaurant">
         <span>01665847138</span>
       </li>
<!--       <li class="company">
         <span>innoria</span>
       </li>-->
       <li class="update_delete">
         <a href="#"><div class="edit"></div></a>
         <a href="#"><div class="delete"></div></a>  
       </li>
     </ul>
     
     
     
     
     
     
     
   </div>
   
    
    
    
    
  </div>
</div>