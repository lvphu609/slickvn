
<?php $url=  base_url(); 
 foreach ($info_restaurant as $info_detail_restaurant) {
   

      $id=                    $info_detail_restaurant['id'];
      $id_user=               $info_detail_restaurant['id_user'];
      $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
      $id_coupon=             $info_detail_restaurant['id_coupon'];
      $name=                  $info_detail_restaurant['name'];
      $number_view=           $info_detail_restaurant['number_view'];
      $number_assessment=     $info_detail_restaurant['number_assessment'];
      $rate_point=            $info_detail_restaurant['rate_point'];
      $number_like=           $info_detail_restaurant['number_like'];
      $number_share=          $info_detail_restaurant['number_share'];
      $rate_service=          $info_detail_restaurant['rate_service'];
      $rate_landscape=        $info_detail_restaurant['rate_landscape'];
      $rate_taste=            $info_detail_restaurant['rate_taste'];
      $rate_price=            $info_detail_restaurant['rate_price'];
      $address=               $info_detail_restaurant['address'];
      $image_introduce_link=  $info_detail_restaurant['image_introduce_link'];
      $image_carousel_link=   $info_detail_restaurant['image_carousel_link'];
      $link_to=               $info_detail_restaurant['link_to'];
      $phone_number=          $info_detail_restaurant['phone_number'];
      $working_time=          $info_detail_restaurant['working_time'];
      $status_active=         $info_detail_restaurant['status_active'];
     // $favourite_list=        $info_detail_restaurant['favourite_list'];
    //  $price_person_list=     $info_detail_restaurant['price_person_list'];
    //  $culinary_style_list=   $info_detail_restaurant['culinary_style_list'];
      $mode_use_list_string=         $info_detail_restaurant['mode_use_list'];
      $mode_use_list_string = substr($mode_use_list_string,2);
      $mode_use_list=   explode(",",$mode_use_list_string);
      
      $payment_type_list_string=     $info_detail_restaurant['payment_type_list'];
      $payment_type_list_string = substr($payment_type_list_string,2);
      $payment_type_list=   explode(",",$payment_type_list_string);
      
      
      
      $landscape_list_string=        $info_detail_restaurant['landscape_list'];
      $landscape_list_string = substr($landscape_list_string,2);
      $landscape_list=   explode(",",$landscape_list_string);
      
      
      $other_criteria_list_string=   $info_detail_restaurant['other_criteria_list'];
      $other_criteria_list_string = substr($other_criteria_list_string,2);
      $other_criteria_list= explode(",",$other_criteria_list_string);
      
      $introduce=             $info_detail_restaurant['introduce'];
      $start_date=            $info_detail_restaurant['start_date'];
      $end_date=              $info_detail_restaurant['end_date'];
      $created_date=          $info_detail_restaurant['created_date'];
      $desc=                  $info_detail_restaurant['desc'];
       $email=                 $info_detail_restaurant['email'];
       
       
        $favourite_list=$info_detail_restaurant['favourite_list'];
        $favourite_list=substr($favourite_list, 1); 

        $price_person_list=$info_detail_restaurant['price_person_list'];
        $price_person_list=substr($price_person_list, 1); 

        $culinary_style_list=$info_detail_restaurant['culinary_style_list'];
        $culinary_style_list=substr($culinary_style_list, 1);

 }
 ?>



<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

<script>
  
  $(document).ready(function() {
       
//     var url =document.URL;
//     var str= url.substr(0, url.indexOf('index.php')); 
//      alert(str);
         //gioi thieu nha hang
       
          $("#introduce_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""

          });
        
        
         $("#info_restaurant").css({
            display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
            display: "none"
          
        });
    
    
   });
  
  
  
  
  $(function(){
    
     /*Giới thiệu nhà hàng--------------------------------------------------------------------*/
    $('#btn_introduce').click(function() {
        $("#status_clicked_1").addClass('active');
        $("#status_clicked_2").removeClass('active');
        $("#status_clicked_3").removeClass('active');
        $("#status_clicked_4").removeClass('active'); 
        
        //gioi thieu nha hang
        $("#introduce_restaurant").css({
           display: "block",
          width: "734px",
          marginLeft: "10px",
          marginRight: "10px",
          height: "auto",
          float: "left",
          background: "#FFF",
          marginBottom: "20px",
          marginTop: "20px",
          visibility: ""
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
            display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
           display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
           display: "none"
          
        });
        
        
    });
    
    
    /*thông tin nhà hàng-------------------------------------------------------------------------------*/
    $('#btn_info_restaurant').click(function() {
      //alert("thông tin nhà hàng");
     // var url = $('#hidUrl').val();
       
        $("#status_clicked_1").removeClass('active');
        $("#status_clicked_2").addClass('active');
        $("#status_clicked_3").removeClass('active');
        $("#status_clicked_4").removeClass('active');
        
         //gioi thieu nha hang
        $("#introduce_restaurant").css({
          display: "none"
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
            display: "none"
          
        });
        
                                  
    });
    
    
    /*tiện ích--------------------------------------*/
    $('#btn_utilities_restaurant').click(function() {
        $("#status_clicked_1").removeClass('active');
        $("#status_clicked_2").removeClass('active');
        $("#status_clicked_3").addClass('active');
        $("#status_clicked_4").removeClass('active'); 
        
        //gioi thieu nha hang
        $("#introduce_restaurant").css({
            display: "none"
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
            display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""
          
        });
        //binh luận
         $("#comment_restaurant").css({
           display: "none"
          
        });
        
        
                                  
    });
     /*binh luận--------------------------------------*/
    $('#btn_comment_restaurant').click(function() {
        $("#status_clicked_1").removeClass('active');
        $("#status_clicked_2").removeClass('active');
        $("#status_clicked_3").removeClass('active');
        $("#status_clicked_4").addClass('active'); 
        
        //gioi thieu nha hang
        $("#introduce_restaurant").css({
            display: "none"
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
           display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""
          
        });
        
                                  
    });
     
     
     //btn_đánh giá
        /*--------------------------------------*/
    $('#btn_danhgia').click(function() {
        $("#status_clicked_1").removeClass('active');
        $("#status_clicked_2").removeClass('active');
        $("#status_clicked_3").removeClass('active');
        $("#status_clicked_4").addClass('active'); 
        
        //gioi thieu nha hang
        $("#introduce_restaurant").css({
            display: "none"
          
        });
        
         //thong tin nha hang
         $("#info_restaurant").css({
            display: "none"
          
        });
        //tiện ích
         $("#utilities_restaurant").css({
            display: "none"
          
        });
        //binh luận
         $("#comment_restaurant").css({
            display: "block",
            width: "734px",
            marginLeft: "10px",
            marginRight: "10px",
            height: "auto",
            float: "left",
            background: "#FFF",
            marginBottom: "20px",
            marginTop: "20px",
            visibility: ""
          
        });
        
                                  
    });
    
    
  }); 
</script>

<div id="tabs_detail_restaurant">
  <div class="tabs_align_center">
    <div class="tabs_title">
      <div class="menu">
        <ul id="ul_menu">
          <a href="javascript:;" id="btn_introduce">
            <li id="status_clicked_1" class="active">
              <span>GIỚI THIỆU</span><i></i>
            </li>
          </a>
          <a href="javascript:;" id="btn_info_restaurant">
            <li id="status_clicked_2" class="">
              <span>THÔNG TIN NHÀ HÀNG</span><i></i>
            </li>
          </a>
          <a href="javascript:;" id="btn_utilities_restaurant">
            <li id="status_clicked_3"  class="">
              <span>TIỆN ÍCH</span><i></i>
            </li>
          </a>
          <a href="javascript:;" id="btn_comment_restaurant">
            <li id="status_clicked_4" class="">
              <span>BÌNH LUẬN</span>
            </li>
          </a>
        </ul>
      </div>
    </div>
    <div class="line_tabs"></div>
    
    <div class="tabs_left">
      <!--giới thiệu nhà hàng- active_hidden_introduce_restaurant-->
      <div id="introduce_restaurant" >
             <!--post introduce-->
                  <?php //echo $introduce; ?>
             <!--end post introduce-->
             
             <!--text example-->
              <div class="contentTab contentDetaiListing reports" id="contenTabGioiThieu" style="display:block">
                  <a title="Gửi báo cáo lỗi tới ban quản trị." class="report" href="javascript:;" rel="nofollow" onclick="javascript:reportListing('Bài giới thiệu',this);" style="display: none;">[Báo lỗi]</a>
                  <p style="text-align: center;">
                    <span style="font-size:16px;"><strong>Bánh Canh Giang Ghẹ – Quán ăn hải sản giá rẻ Sài Gòn</strong></span></p>
                  <p style="text-align: justify;">
                    Bánh canh ghẹ hiện nay có thể được xem là một món đặc sản của Sài Gòn. Món ăn đã làm cho ẩm thực Sài Gòn thêm hương thêm hoa. Nếu có dịp dừng chân tại Sài Gòn bạn hãy thử thưởng thức bánh canh ghẹ một lần để cảm nhận hết hương vị tuyệt ngon, chắc thịt đặc trưng của ghẹ, vị dai sần sật của sợi bánh canh cùng nước dùng ngọt đậm đà từ ghẹ tươi.<br>
                    Bánh Canh Giang Ghẹ tọa lạc tại số 688, quốc lộ 13, phường Bình Phước, quận Thủ Đức là một trong những quán tiên phong làm lên tên tuổi của món bánh canh ghẹ Sài Gòn.</p>
                  <p style="text-align: center;">
                    &nbsp;<img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (2).jpg" style="width: 600px; height: 331px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (3).jpg" style="width: 600px; height: 344px;"></p>
                  <p style="text-align: justify;">
                    Với khởi đầu là vựa hải sản, chuyên cung cấp hải sản số lượng lớn từ 2-3 tấn cho các quán ăn, nhà hàng tại Sài Gòn như Ngọc Sương, Biển Đông… Bánh Canh Giang Ghẹ luôn đem đến cho bạn những con ghẹ tươi ngon nhất.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (25).jpg" style="width: 600px; height: 300px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (12).jpg" style="width: 600px; height: 355px;"></p>
                  <p style="text-align: justify;">
                    Theo chia sẻ của chủ quán, với một 100kg ghẹ nhập về thì lựa được 10kg ghẹ chất lượng, tươi ngon, thịt săn chắc để chế biến món ăn. Đặc biệt, một ngày quán tiêu thụ trên 200kg ghẹ nên nước dùng cho bánh canh đặc biệt đậm đà, ngọt lịm.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (14).JPG" style="width: 600px; height: 400px;"></p>
                  <p style="text-align: center;">
                    <em>&nbsp;Nhân viên trong quán đang lựa ra&nbsp; những con ghẹ chất lượng.</em></p>
                  <p style="text-align: justify;">
                    Bánh Canh Giang Ghẹ luôn đảm bảo sự tươi ngon từ ghẹ sống được bắt và làm ngay khi khách gọi món, nhờ vậy nước dùng giữ được vị ngọt từ thịt ghẹ tươi săn chắc. Ngoài ra, bạn có thể tự tay chọn cho mình những con ghẹ còn sống theo đúng sở thích, sau đó nhân viên đem chế biến thành món bánh canh thơm ngon đúng ý của bạn.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (24).JPG" style="width: 600px; height: 400px;"></p>
                  <p style="text-align: justify;">
                    Bánh canh&nbsp; được làm thủ công từ bột gạo, tạo nên những sợi bánh có độ mềm, dai vừa phải không tạo cảm giác ngán khi ăn.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (17).JPG" style="width: 350px; height: 525px;"></p>
                  <p style="text-align: justify;">
                    Sự kết hợp hài hòa giữa hải sản tươi ngon với bánh canh gạo dai dai cùng đôi bàn tay tài hoa , đầy kinh nghiệm của đội ngũ đầu bếp của Bánh Canh Giang Ghẹ đã tạo nên&nbsp; những tuyệt tác ẩm thực, làm say lòng cả những thực khách khó tính nhất.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (21).JPG" style="width: 600px; height: 400px;"></p>
                  <p style="text-align: justify;">
                    Bánh Canh Giang Ghẹ có lợi thế là vựa hải sản nên giá tiền cho một tô bánh canh cũng rất mềm, chỉ từ 20.000đ – 55.000đ cho một tô bánh canh ghẹ thơm ngon.</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (22).jpg" style="width: 400px; height: 498px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (18).JPG" style="width: 480px; height: 720px;"></p>
                  <p style="text-align: justify;">
                    Ngoài ra, Bánh Canh Giang Ghẹ còn cung cấp các món ghẹ với giá chỉ từ 160.000đ – 350.000đ/1kg. Bạn cũng có thể thưởng thức món lẩu Thái cua – ghẹ chua cay hấp dẫn với giá chỉ 49.000đ, hay nếm thử những món mới vô cùng hấp dẫn như lẩu đầu cá bóp, cá nhám nấu cà ri, cá mú chưng tương…</p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (9).JPG" style="width: 600px; height: 400px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (11).JPG" style="width: 600px; height: 400px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (6).jpg" style="width: 500px; height: 617px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (10).jpg" style="width: 500px; height: 620px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (5).jpg" style="width: 500px; height: 676px;"></p>
                  <p style="text-align: center;">
                    <img alt="" src="http://dendau.vn//custom/image_files/nha_hang/giangghe (4).jpg" style="width: 500px; height: 620px;"></p>
                  <p style="text-align: justify;">
                    &nbsp;&nbsp;<br>
                    Với lợi thế là một vựa hải sản lớn trong khu vực Sài Gòn, cùng không gian rộng, thoáng mát, phục vụ chu đáo Bánh Canh Giang Ghẹ hứa hẹn mang đến cho bạn những giây phút thưởng thức hải sản thơm ngon nhất, giá hợp lý nhất.</p>
                  <p style="text-align: justify;">
                    facebook : https://www.facebook.com/banhcanhghesaigon?ref=tn_tnmn.<br>
                    Youtube nhé :http://www.youtube.com/watch?v=sDoIqlGtxOA<br>
                    Link bài viết trên tạp chí gia đình:&nbsp;<a href="http://tapchigiadinh.com.vn/94-nha-hang-quan-an/21247-banh-canh-giang-ghe-hai-san-gia-re-sai-gon-145.aspx">http://tapchigiadinh.com.vn/94-nha-hang-quan-an/21247-banh-canh-giang-ghe-hai-san-gia-re-sai-gon-145.aspx</a></p>
                  <p style="text-align: right;">
                    &nbsp;</p>
                  <p style="text-align: right;">
                    <strong>Phạm Trang</strong><br>
                    &nbsp;</p>
                              
               </div>
             
             <!--end text example-->
             
             
             
             
      </div>
      <!--end giới thiệu nhà hàng-->
      
    <!--==============thông tin nhà hàng=================================-->
    <div id="info_restaurant">
      <div class="box_detail_info_restaurant">
        <div class="line_top"></div>
        <ul class="ul_detail_info_restaurant">
          <li>
            <div class="info_left">
              <span>
                Địa chỉ:
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php echo $address;?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Điện thoại:
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php echo $phone_number;?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Email:
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php echo $email;?>
              
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Website:
              </span>
            </div>
            <div class="info_right">
              <span>
                <a href="#" ><?php echo $link_to;?></a>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Giờ làm việc:
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php echo $working_time;?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Tình trạng:
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php echo $status_active;?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Mục Đích
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php 
                    /*
                    foreach ($favourite_list as $value_favourite) {
                      
                      echo $value_favourite;
                      
                      echo ", ";

                     }*/
                echo $favourite_list;
                ?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Giá trung bình/người
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php 
                    
                   /* foreach ($price_person_list as $value_price_person_list) {
                      
                      echo $value_price_person_list;
                      
                      echo ", ";

                     }*/
                echo $price_person_list;
                ?>
              </span>
            </div>
            
          </li>
          
          <li>
            <div class="info_left">
              <span>
                Phong cách ẩm thực
              </span>
            </div>
            <div class="info_right">
              <span>
                <?php 
                    /*
                    foreach ($culinary_style_list as $value_culinary_style_list) {
                      
                      echo $value_culinary_style_list;
                      
                      echo ", ";

                     }*/
                   echo $culinary_style_list;
                ?>
              </span>
            </div>
            
          </li>
          
          <div class="line_bottom">
            <div class="detail_line_bottom">
              <span>Món ăn đặc trưng: &nbsp;</span>
              <span>Cơm chiên, Lẩu hải sản</span>
            </div>
          </div>
        </ul>
      </div>
    </div>
    <!--===============================end thông tin nhà hàng====================-->
    
    <!--==============tiện ích=================================-->
    <div id="utilities_restaurant">
      <!--thanh toán-->
      <div class="box_tienich">
        <div class="top_title"><span><div class="span_center">Cách thanh toán</div></span></div>
        <ul class="detail_box_tienich" >
          <?php 
                //var_dump($payment_type_list);
                $str_payment=array("Thẻ Debit","Tiền mặt","Thẻ ATM","Thẻ tín dụng");
                
                foreach ($payment_type_list as $value_payment_type_list) {
                  
                  if($value_payment_type_list=="Thẻ Debit")
                  {
                    echo'<li>
                          <span class="image_status icon_Dedit"></span>
                          <span class="content">Thẻ Debit</span>            
                        </li>';
                    
                  }
                  if($value_payment_type_list=="Tiền mặt")
                  {
                    echo'<li>
                            <span class="image_status icon_tienmat"></span>
                            <span class="content">Tiền mặt</span>            
                          </li>';
                    
                  }
                   if($value_payment_type_list=="Thẻ ATM")
                  {
                    echo'<li>
                            <span class="image_status icon_atm"></span>
                            <span class="content">Thẻ ATM</span>            
                          </li>';
                    
                  }
                   if($value_payment_type_list=="Thẻ tín dụng")
                  {
                     echo'<li>
                            <span class="image_status icon_thetindung"></span>
                            <span class="content">Thẻ tín dụng</span>            
                          </li>';
                    
                  }
                     //xóa bỏ những phần tử có trong mảng $str_payment
                      $index = array_search($value_payment_type_list,$str_payment);
                      if($index !== FALSE){
                          unset($str_payment[$index]);
                      }
                  
                  
                 }
                 //var_dump($str_payment);
                 //những cách thanh toán chưa có
                 foreach ($str_payment as $str_payment) {
                   if($str_payment=="Thẻ Debit")
                    {
                      echo'<li>
                            <span class="image_status icon_Dedit_xam"></span>
                            <span class="content">Thẻ Debit</span>            
                          </li>';

                    }
                    if($str_payment=="Tiền mặt")
                    {
                      echo'<li>
                              <span class="image_status icon_tienmat_xam"></span>
                              <span class="content">Tiền mặt</span>            
                            </li>';

                    }
                     if($str_payment=="Thẻ ATM")
                    {
                      echo'<li>
                              <span class="image_status icon_atm_xam"></span>
                              <span class="content">Thẻ ATM</span>            
                            </li>';

                    }
                     if($str_payment=="Thẻ tín dụng")
                    {
                       echo'<li>
                              <span class="image_status icon_thetindung_xam"></span>
                              <span class="content">Thẻ tín dụng</span>            
                            </li>';

                    }
                   
                 }
                   
          ?>
          
          
<!--            <li>
              <span class="image_status icon_atm"></span>
              <span class="content">Thẻ ATM</span>            
            </li>
            <li>
              <span class="image_status icon_thetindung"></span>
              <span class="content">Thẻ tín dụng</span>            
            </li>
            <li>
              <span class="image_status icon_tienmat"></span>
              <span class="content">Tiền mặt</span>            
            </li>
            <li>
              <span class="image_status icon_Dedit"></span>
              <span class="content">Thẻ Debit</span>            
            </li>-->
            
            
            
         </ul>
      </div>
      <!--tieu chi khac-->
      <div class="box_tienich">
        <div class="top_title"><span><div class="span_center">Tiêu chí khác</div></span></div>
        <ul class="detail_box_tienich" >
           <?php 
                
                $arr_other_criteria_list=array("Âm thanh, máy chiếu",
                                               "Bãi đậu xe hơi",
                                               "Bãi đậu xe máy",
                                               "Ghế ngồi cho trẻ em",
                                               "Karaoke",
                                               "Khu vui chơi cho trẻ em",
                                               "Máy lạnh/lò sưởi",
                                               "Phòng VIP",
                                               "Wifi"
                                                    );
                
                foreach ($other_criteria_list as $other_criteria_list) {
                  
                  if($other_criteria_list=="Âm thanh, máy chiếu")
                  {
                    echo'<li>
                          <span class="image_status icon_amthanh_maychieu"></span>
                          <span class="content">Âm thanh, máy chiếu</span>            
                        </li>';
                    
                  }
                  if($other_criteria_list=="Bãi đậu xe hơi")
                  {
                    echo'<li>
                          <span class="image_status icon_baidauxehoi"></span>
                          <span class="content">Bãi đậu xe hơi</span>            
                        </li>';
                    
                  }
                  if($other_criteria_list=="Bãi đậu xe máy")
                  {
                    echo' <li>
                            <span class="image_status icon_baidauxemay"></span>
                            <span class="content">Bãi đậu xe máy</span>            
                          </li>';
                    
                  }
                  if($other_criteria_list=="Ghế ngồi cho trẻ em")
                  {
                    echo'<li>
                            <span class="image_status icon_ghengoitreem"></span>
                            <span class="content">Ghế ngồi cho trẻ em</span>            
                          </li>';
                    
                  }
                  if($other_criteria_list=="Karaoke")
                  {
                    echo'<li>
                          <span class="image_status icon_karaoke"></span>
                          <span class="content">Karaoke</span>            
                        </li>';
                    
                  }
                  if($other_criteria_list=="Khu vui chơi cho trẻ em")
                  {
                    echo'<li>
                          <span class="image_status icon_khuvuichoi"></span>
                          <span class="content">Khu vui chơi cho trẻ em</span>            
                        </li>';
                    
                  }
                  if($other_criteria_list=="Máy lạnh/lò sưởi")
                  {
                    echo'
                       <li>
                          <span class="image_status icon_maylanh"></span>
                          <span class="content">Máy lạnh/Lò sưởi</span>            
                        </li>';
                    
                  }
                   if($other_criteria_list=="Phòng VIP")
                  {
                    echo'
                       <li>
                          <span class="image_status icon_phongvip"></span>
                          <span class="content">Phòng VIP</span>            
                        </li>';
                    
                  }
                   if($other_criteria_list=="Wifi")
                  {
                    echo'
                      <li>
                        <span class="image_status icon_wifi"></span>
                        <span class="content">Wifi</span>            
                      </li>';
                    
                  }
                
                     //xóa bỏ những phần tử có trong mảng $arr_other_criteria_list
                      $index = array_search($other_criteria_list,$arr_other_criteria_list);
                      if($index !== FALSE){
                          unset($arr_other_criteria_list[$index]);
                      }
                  
                  
                 }
                 //những cách thanh toán chưa có
                 foreach ($arr_other_criteria_list as $arr_other_criteria_list) {
                        if($arr_other_criteria_list=="Âm thanh, máy chiếu")
                       {
                         echo'<li>
                               <span class="image_status icon_amthanh_maychieu_xam"></span>
                               <span class="content">Âm thanh, máy chiếu</span>            
                             </li>';

                       }
                       if($arr_other_criteria_list=="Bãi đậu xe hơi")
                       {
                         echo'<li>
                               <span class="image_status icon_baidauxehoi_xam"></span>
                               <span class="content">Bãi đậu xe hơi</span>            
                             </li>';

                       }
                       if($arr_other_criteria_list=="Bãi đậu xe máy")
                       {
                         echo' <li>
                                 <span class="image_status icon_baidauxemay_xam"></span>
                                 <span class="content">Bãi đậu xe máy</span>            
                               </li>';

                       }
                       if($arr_other_criteria_list=="Ghế ngồi cho trẻ em")
                       {
                         echo'<li>
                                 <span class="image_status icon_ghengoitreem_xam"></span>
                                 <span class="content">Ghế ngồi cho trẻ em</span>            
                               </li>';

                       }
                       if($arr_other_criteria_list=="Karaoke")
                       {
                         echo'<li>
                               <span class="image_status icon_karaoke_xam"></span>
                               <span class="content">Karaoke</span>            
                             </li>';

                       }
                       if($arr_other_criteria_list=="Khu vui chơi cho trẻ em")
                       {
                         echo'<li>
                               <span class="image_status icon_khuvuichoi_xam"></span>
                               <span class="content">Khu vui chơi cho trẻ em</span>            
                             </li>';

                       }
                       if($arr_other_criteria_list=="Máy lạnh/lò sưởi")
                       {
                         echo'
                            <li>
                               <span class="image_status icon_maylanh_xam"></span>
                               <span class="content">Máy lạnh/Lò sưởi</span>            
                             </li>';

                       }
                        if($arr_other_criteria_list=="Phòng VIP")
                       {
                         echo'
                            <li>
                               <span class="image_status icon_phongvip_xam"></span>
                               <span class="content">Phòng VIP</span>            
                             </li>';

                       }
                        if($arr_other_criteria_list=="Wifi")
                       {
                         echo'
                           <li>
                             <span class="image_status icon_wifi_xam"></span>
                             <span class="content">Wifi</span>            
                           </li>';

                       }
                    
                   
                 }
                   
          ?>
          
          
<!--            <li>
              <span class="image_status icon_amthanh_maychieu_xam"></span>
              <span class="content">Âm thanh, máy chiếu</span>            
            </li>
            <li>
              <span class="image_status icon_baidauxehoi"></span>
              <span class="content">Bãi đậu xe hơi</span>            
            </li>
            <li>
              <span class="image_status icon_baidauxemay"></span>
              <span class="content">Bãi đậu xe máy</span>            
            </li>
            <li>
              <span class="image_status icon_ghengoitreem_xam"></span>
              <span class="content">Ghế ngồi cho trẻ em</span>            
            </li>
             <li>
              <span class="image_status icon_karaoke"></span>
              <span class="content">Karaoke</span>            
            </li>
            <li>
              <span class="image_status icon_khuvuichoi_xam"></span>
              <span class="content">Khu vui chơi cho trẻ em</span>            
            </li>
            <li>
              <span class="image_status icon_maylanh"></span>
              <span class="content">Máy lạnh/Lò sưởi</span>            
            </li>
            <li>
              <span class="image_status icon_phongvip"></span>
              <span class="content">Phòng VIP</span>            
            </li>
            <li>
              <span class="image_status icon_wifi"></span>
              <span class="content">Wifi</span>            
            </li>-->
          </ul>
      </div>
      <!--phuong thuc su dung-->
      <div class="box_tienich">
        <div class="top_title"><span><div class="span_center">Phương thức sử dụng</div></span></div>
        <ul class="detail_box_tienich" >
          
          
          
          <?php
          $arr_mode_use_list=array("Đặt tiệc tận nhà",
                                               "Giao tận nơi",
                                               "Mang về",
                                               "Ăn tại nhà hàng"
                                                    );
                
                foreach ($mode_use_list as $mode_use_list) {
                  
                  if($mode_use_list=="Đặt tiệc tận nhà")
                  {
                    echo' <li>
                          <span class="image_status icon_dattiectainha"></span>
                          <span class="content">Đặt tiệc tận nhà</span>            
                        </li>';
                    
                  }
                  if($mode_use_list=="Giao tận nơi")
                  {
                    echo'<li>
                          <span class="image_status icon_giaohangtannoi"></span>
                          <span class="content">Giao tận nơi</span>            
                        </li>';
                    
                  }
                  if($mode_use_list=="Mang về")
                  {
                    echo' <li>
                            <span class="image_status icon_mangve"></span>
                            <span class="content">Mang về</span>            
                          </li>';
                    
                  }
                  if($mode_use_list=="Ăn tại nhà hàng")
                  {
                    echo'<li>
                          <span class="image_status icon_antainhahang"></span>
                          <span class="content">Ăn tại nhà hàng</span>            
                        </li>';
                    
                  }
                  
                
                     //xóa bỏ những phần tử có trong mảng $mode_use_list
                      $index = array_search($mode_use_list,$arr_mode_use_list);
                      if($index !== FALSE){
                          unset($arr_mode_use_list[$index]);
                      }
                  
                  
                 }
                 //những cách thanh toán chưa có
                 foreach ($arr_mode_use_list as $arr_mode_use_list) {
                       if($mode_use_list=="Đặt tiệc tận nhà")
                  {
                    echo' <li>
                          <span class="image_status icon_dattiectainha_xam"></span>
                          <span class="content">Đặt tiệc tận nhà</span>            
                        </li>';
                    
                  }
                  if($mode_use_list=="Giao tận nơi")
                  {
                    echo'<li>
                          <span class="image_status icon_giaohangtannoi_xam"></span>
                          <span class="content">Giao tận nơi</span>            
                        </li>';
                    
                  }
                  if($mode_use_list=="Mang về")
                  {
                    echo' <li>
                            <span class="image_status icon_mangve_xam"></span>
                            <span class="content">Mang về</span>            
                          </li>';
                    
                  }
                  if($mode_use_list=="Ăn tại nhà hàng")
                  {
                    echo'<li>
                          <span class="image_status icon_antainhahang_xam"></span>
                          <span class="content">Ăn tại nhà hàng</span>            
                        </li>';
                    
                  }
                    
                   
                 }
                   
          ?>
          
          
<!--            <li>
              <span class="image_status icon_dattiectainha"></span>
              <span class="content">Đặt tiệc tận nhà</span>            
            </li>
            <li>
              <span class="image_status icon_giaohangtannoi"></span>
              <span class="content">Giao tận nơi</span>            
            </li>
            <li>
              <span class="image_status icon_mangve"></span>
              <span class="content">Mang về</span>            
            </li>
            <li>
              <span class="image_status icon_antainhahang_xam"></span>
              <span class="content">Ăn tại nhà hàng</span>            
            </li>-->
          </ul>
      </div>
      <!--quan canh-->
      <div class="box_tienich">
        <div class="top_title"><span><div class="span_center">Quang cảnh</div></span></div>
        <ul class="detail_box_tienich" >
          <?php 
               
                $arr_landscape_list=array("Canh ban công",
                                               "Cảnh biển",
                                               "Cảnh sân thượng",
                                               "Cảnh sông",
                                               "Ngoài trời",
                                               "Quán vỉa hè",
                                               "Sân vườn"
                                                    );
                
                foreach ($landscape_list as $landscape_list) {
                  
                  if($landscape_list=="Canh ban công")
                  {
                    echo'<li>
                          <span class="image_status icon_canhbancong"></span>
                          <span class="content">Cảnh ban công</span>            
                        </li>';
                  }
                  if($landscape_list=="Cảnh biển")
                  {
                    echo' <li>
                            <span class="image_status icon_canhbien"></span>
                            <span class="content">Cảnh biển</span>            
                          </li>';
                  }
                  if($landscape_list=="Cảnh sân thượng")
                  {
                    echo'<li>
                            <span class="image_status icon_canhsanthuong"></span>
                            <span class="content">Cảnh sân thượng</span>            
                          </li>';
                  }
                  if($landscape_list=="Cảnh sông")
                  {
                    echo'<li>
                          <span class="image_status icon_canhsong"></span>
                          <span class="content">Cảnh sông</span>            
                        </li>';
                  }
                  if($landscape_list=="Ngoài trời")
                  {
                    echo'<li>
                          <span class="image_status icon_canhngoaitroi"></span>
                          <span class="content">Ngoài trời</span>            
                        </li>';
                  }
                  if($landscape_list=="Quán vỉa hè")
                  {
                    echo'<li>
                          <span class="image_status icon_canhviahe"></span>
                          <span class="content">Quán vỉa hè</span>            
                        </li>';
                  }
                  if($landscape_list=="Sân vườn")
                  {
                    echo'<li>
                          <span class="image_status icon_canhsanvuon"></span>
                          <span class="content">Sân vườn</span>            
                        </li>';
                  }
                  
                
                  
                  
                  //xóa bỏ những phần tử có trong mảng $arr_other_criteria_list
                   $index = array_search($other_criteria_list,$arr_landscape_list);
                   if($index !== FALSE){
                       unset($arr_landscape_list[$index]);
                   }
                  
                  
                 }
                 //những cách thanh toán chưa có
                 foreach ($arr_landscape_list as $arr_landscape_list) {
                        
                        if($arr_landscape_list=="Canh ban công")
                      {
                        echo'<li>
                              <span class="image_status icon_canhbancong_xam"></span>
                              <span class="content">Cảnh ban công</span>            
                            </li>';
                      }
                      if($arr_landscape_list=="Cảnh biển")
                      {
                        echo' <li>
                                <span class="image_status icon_canhbien_xam"></span>
                                <span class="content">Cảnh biển</span>            
                              </li>';
                      }
                      if($arr_landscape_list=="Cảnh sân thượng")
                      {
                        echo'<li>
                                <span class="image_status icon_canhsanthuong_xam"></span>
                                <span class="content">Cảnh sân thượng</span>            
                              </li>';
                      }
                      if($arr_landscape_list=="Cảnh sông")
                      {
                        echo'<li>
                              <span class="image_status icon_canhsong_xam"></span>
                              <span class="content">Cảnh sông</span>            
                            </li>';
                      }
                      if($arr_landscape_list=="Ngoài trời")
                      {
                        echo'<li>
                              <span class="image_status icon_canhngoaitroi_xam"></span>
                              <span class="content">Ngoài trời</span>            
                            </li>';
                      }
                      if($arr_landscape_list=="Quán vỉa hè")
                      {
                        echo'<li>
                              <span class="image_status icon_canhviahe_xam"></span>
                              <span class="content">Quán vỉa hè</span>            
                            </li>';
                      }
                      if($arr_landscape_list=="Sân vườn")
                      {
                        echo'<li>
                              <span class="image_status icon_canhsanvuon_xam"></span>
                              <span class="content">Sân vườn</span>            
                            </li>';
                      }
                  
                   
                 }
                   
          ?>
          
          
          
          
<!--            <li>
              <span class="image_status icon_canhbancong"></span>
              <span class="content">Cảnh ban công</span>            
            </li>
            <li>
              <span class="image_status icon_canhbien"></span>
              <span class="content">Cảnh biển</span>            
            </li>
            <li>
              <span class="image_status icon_canhsanthuong_xam"></span>
              <span class="content">Cảnh sân thượng</span>            
            </li>
            <li>
              <span class="image_status icon_canhsong"></span>
              <span class="content">Cảnh sông</span>            
            </li>
            <li>
              <span class="image_status icon_canhngoaitroi"></span>
              <span class="content">Ngoài trời</span>            
            </li>
            <li>
              <span class="image_status icon_canhviahe_xam"></span>
              <span class="content">Quán vỉa hè</span>            
            </li>
            <li>
              <span class="image_status icon_canhsanvuon"></span>
              <span class="content">Sân vườn</span>            
            </li>-->
            
            
            
            
          </ul>
      </div>
      
    </div>
    <!--===============================end tiện ích====================-->
    
    <!--==============Bình luận=================================-->
    <div id="comment_restaurant">
      
      
      <div class="box_your_comment">
        <div class="your_avatar">
          <a href="javascript:;">
                <img src="http://dendau.vn/style/avatar/10.gif" >
          </a>
        </div>
        <div class="box_form_comment">
            <form action="javascript:;" method="post" name="review_inline" id="review_inline" class="form-comment" onsubmit="return false">
                <input id="id_restaurant" value="restaurant_id 1" type="hidden">
                <input id="id_user" value="hjhjkhkghjw" type="hidden">
                <input id="email_user" value="lvphu609@gmail.com" type="hidden">
                <input id="fullname_fullname" value="Lê Vĩnh Phú" type="hidden">

                <div class="box_comment_top">
                  <ul class="list_vote_rating">
                    <li>
                      <div class="left">Dịch vụ:</div>
                      <div class="right">
                        <div class="rating_comment_service" data-average="0" data-id="1"></div>
                      </div>
                    </li>
                    <li>
                      <div class="left">Quang cảnh:</div>
                      <div class="right">
                        <div class="rating_comment_landscap" data-average="0" data-id="2"></div>
                      </div>                    
                    </li>
                    <li>
                      <div class="left">Giá cả:</div>
                      <div class="right">
                        <div class="rating_comment_price" data-average="0" data-id="3"></div>
                      </div>
                    </li>
                    <li>
                      <div class="left">Hương vị:</div>
                      <div class="right">
                        <div class="rating_comment_taste" data-average="0" data-id="4"></div>
                      </div>
                    </li>
                  </ul>
                  <div class="txtComments-box">
                    <textarea id="text_comment_main" name="textare_binhluan" class="txt_comment" placeholder="Nhập bình luận..." style="resize: none; "></textarea>
                            <textarea style="display: none; resize: none; "></textarea>
                  </div>
                </div>
                <ul id="box-up-image" class="list-image-upload"></ul>
                <div class="box_comment_bottom">
                  <div class="left">
                  </div>
                  <div class="right">
                    <input id="btn_sent_comment" class="btn_comment" type="button" value="Gửi" >
                  </div>
                </div>
            </form>
          <div class="line_comment"></div>
        </div>
      </div>
      
      
      
      <!--danh sach comment-->
      
      <div class="box_show_list_comment">
        
          <div class="avatar">
            <a href="javascript:;">
                  <img src="http://dendau.vn/style/avatar/10.gif" >
            </a><br>
          <span>286 bình luận</span>
          </div>
          <div class="full_name_user">
            <span>Lê Vĩnh Phú</span>
          </div>
          <ul class="list_vote_rating">
            <li>
              <div class="left">Dịch vụ:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                 </div>
              </div>
            </li>
            <li>
              <div class="left">Quang cảnh:</div>
              <div class="right">
                  <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>                    
            </li>
            <li>
              <div class="left">Giá cả:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>
            </li>
            <li>
              <div class="left">Hương vị:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>
            </li>
          </ul>
          
          <div class="content_comment">
            <p>
              Mùa này mưa nhiều, vào mấy kiểu quán Hàn - Nhật này là phù hợp rồi,
              ví tiền rủng rỉnh thì vào đây nhậu nhẹt là quá chuẩn,
              uống rượu Hàn vừa ấm bụng lại không sợ say như rượu VN,
              giá cũng rẻ hơn rượu Tây nhiều nên mấy ông bạn mình là toàn chuộng kiểu nhà hàng này.
            </p>
          </div>
          <div class="like_share_reply">
            <ul class="box_btn_submit">
              <li>
                <a href="javascript:;"><span>like</span>(0)</a>
              </li>
              <li>
                <a href="javascript:;"><span>share</span>(0)</a>
              </li>
              <li>
                <a href="javascript:;"><span>trả lời</span></a>
              </li>
            </ul>
          </div>
          <div class="line_box_list_comment"></div>
      </div>
      
      <div class="box_show_list_comment">
        
          <div class="avatar">
            <a href="javascript:;">
                  <img src="http://dendau.vn/style/avatar/10.gif" >
            </a><br>
          <span>286 bình luận</span>
          </div>
          <div class="full_name_user">
            <span>Lê Vĩnh Phú</span>
          </div>
          <ul class="list_vote_rating">
            <li>
              <div class="left">Dịch vụ:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                 </div>
              </div>
            </li>
            <li>
              <div class="left">Quang cảnh:</div>
              <div class="right">
                  <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>                    
            </li>
            <li>
              <div class="left">Giá cả:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>
            </li>
            <li>
              <div class="left">Hương vị:</div>
              <div class="right">
                 <div class="rating">
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_active"></span>
                    <span class="star_no_active"></span>
                    <span class="star_no_active"></span>
                  </div>
              </div>
            </li>
          </ul>
          
          <div class="content_comment">
            <p>
              Mùa này mưa nhiều, vào mấy kiểu quán Hàn - Nhật này là phù hợp rồi,
              ví tiền rủng rỉnh thì vào đây nhậu nhẹt là quá chuẩn,
              uống rượu Hàn vừa ấm bụng lại không sợ say như rượu VN,
              giá cũng rẻ hơn rượu Tây nhiều nên mấy ông bạn mình là toàn chuộng kiểu nhà hàng này.
            </p>
          </div>
          <div class="like_share_reply">
            <ul class="box_btn_submit">
              <li>
                <a href="javascript:;"><span>like</span>(0)</a>
              </li>
              <li>
                <a href="javascript:;"><span>share</span>(0)</a>
              </li>
              <li>
                <a href="javascript:;"><span>trả lời</span></a>
              </li>
            </ul>
          </div>
        <div class="line_box_list_comment"></div>
      </div>
      
      <!--end box_comment-->
      
      
      
    </div>
    <!--===============================end binh luan====================-->
    
    </div>
<!--end tabs left-->

<!--tabs right-->
    <div class="tabs_right">
      <div class="similar_restaurant">
        <ul class="show_list_restaurant">
          <a href="javascript:;">
            <li>
              <div class="left">
                <div class="avatar_restaurant">
                  <img src="http://dendau.vn/style/avatar/10.gif">
                </div>
              </div>
              <div class="right">
                <div class="name_restaurant">
                  <span>Nhà hàng Kim Chi Hàn Quốc</span>
                </div>
                <div class="address_restaurant">
                  <span>
                    349 Hoàng Văn Thụ, Phường 2, 
                    Quận Tân Bình, Tp. Hồ Chí Minh

                  </span>
                </div>

              </div>            
            </li>
           </a>
          
          <a href="javascript:;">
            <li>
              <div class="left">
                <div class="avatar_restaurant">
                  <img src="http://dendau.vn/style/avatar/10.gif">
                </div>
              </div>
              <div class="right">
                <div class="name_restaurant">
                  <span>Nhà hàng Kim Chi Hàn Quốc</span>
                </div>
                <div class="address_restaurant">
                  <span>
                    349 Hoàng Văn Thụ, Phường 2, 
                    Quận Tân Bình, Tp. Hồ Chí Minh

                  </span>
                </div>

              </div>            
            </li>
           </a>
          
          <a href="javascript:;">
            <li>
              <div class="left">
                <div class="avatar_restaurant">
                  <img src="http://dendau.vn/style/avatar/10.gif">
                </div>
              </div>
              <div class="right">
                <div class="name_restaurant">
                  <span>Nhà hàng Kim Chi Hàn Quốc</span>
                </div>
                <div class="address_restaurant">
                  <span>
                    349 Hoàng Văn Thụ, Phường 2, 
                    Quận Tân Bình, Tp. Hồ Chí Minh

                  </span>
                </div>

              </div>            
            </li>
           </a>
          
          <a href="javascript:;">
            <li>
              <div class="left">
                <div class="avatar_restaurant">
                  <img src="http://dendau.vn/style/avatar/10.gif">
                </div>
              </div>
              <div class="right">
                <div class="name_restaurant">
                  <span>Nhà hàng Kim Chi Hàn Quốc</span>
                </div>
                <div class="address_restaurant">
                  <span>
                    349 Hoàng Văn Thụ, Phường 2, 
                    Quận Tân Bình, Tp. Hồ Chí Minh

                  </span>
                </div>

              </div>            
            </li>
           </a>
          
          
          
          
          
          
        </ul>
      </div>
    </div>
<!--end tabs right-->




  </div>  
</div>






<div class="datasSent1"></div>
<div class="datasSent2"></div>
<div class="datasSent3"></div>
<div class="datasSent4"></div>



	<script type="text/javascript" src="<?php echo $url;?>includes/plugins/rating_jquery/jRating.jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating();
      //dich vu
			$('.rating_comment_service').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 1000
			});
      //quang canh
      	$('.rating_comment_landscap').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 1000
			});
      //gia ca
      	$('.rating_comment_price').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 1000
			});
      //huong vị
      	$('.rating_comment_taste').jRating({
				step:true,
				length : 5,
				canRateAgain : true,
				nbRates : 1000
			});
      
		});
    //sent comment
      $('#btn_sent_comment').click(function() {
        var rate1=$('#res_vote_1').val();
        var rate2=$('#res_vote_2').val();
        var rate3=$('#res_vote_3').val();
        var rate4=$('#res_vote_4').val();
        var content = $('textarea#text_comment_main').val();
        var id_user = $('#id_user').val();
        var id_restaurant=$('#id_restaurant').val();
    
       var a = 'rate1 = '+rate1+
                ' \n\
                 rate2 = '+rate2+' \n\
                 rate3 = '+rate3+' \n\
                 rate4 = '+rate4+' \n\
                 content: '+content+'\n\
                 id_restaurant:'+ id_restaurant+'\n\
                 id_user: '+ id_user ;
        
        alert(a);
        
      });
   
   
   
    
    
	</script>
  
  

  