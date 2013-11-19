<?php $url=  base_url(); ?>

<!--form_log_in  extend form_sign_up-->
<div id="form_sign_up">
  <div class="box_sign_up">
    <div class="box">
      
      <div class="box_left">
        <div class="title">
          <div class="title_left" >
            <div class="text">
              <span>Đăng nhập</span>
            </div>
          </div>
          <div class="title_right" >
            <div class="image">
            </div>
          </div>
        </div>
        <div class="sub_title_1">
        </div>
        <div class="line">
        </div>
        <div class="sub_title_2">
          <div class="left">
          </div>
          <div class="right">
          </div>
          
        </div>
        <div class="box_left_content">
          <!--input-->
          
            <!--<div class="form_sign_up">
            </div>-->
          <ul>
            
            <li>
              <span>Email</span><br>
              <input style="padding-left: 10px;" type="text" id="param_email"  placeholder="Email">
            </li>
            <li>
              <span>Mật khẩu</span><br>
              <input style="padding-left: 10px;" type="password" id="param_password"    placeholder="Mật khẩu">
            </li>
          </ul>
             
          <!--end input-->
        </div>
        <div class="line_1">
        </div>
        <div class="sub_title_3">
          <div class="left">
          </div>
          <div class="right">
          </div>          
        </div>
        <div class="box_btn_sign_up">
          <div id="home-section-projects" >
            <a href="javascript:;" id="btn_login"  class="more-info">
              <div class="btn_sign_up">
                <div class="image"></div>
                <div class="text" ><span>Đăng nhập</span></div>
              </div>
            </a>
          </div>
        </div>
        <div class="footer_sign_up">
          <div class="content_text">
            <span><a href="<?php echo $url;?>index.php/home_controller/sign_up">Đăng ký</a>&nbsp;|&nbsp;<a href="#">Bạn quên mật khẩu?</a></span>
          </div>
          <div class="footer_text">
            <span>Slick.vn</span>
          </div>
            
        </div>
        
      </div>
      
      
      <div class="box_right">
        <div class="box_right_custom">
          <div class="title">
              <div class="text_center">
                <span>QUYỀN LỢI THÀNH VIÊN</span>
              </div>
              <div class="image">
                
              </div>
          </div>
          <div class="box_right_content">
            <ul>
              
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_1.jpg">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Cơ hội tiết kiệm đến <span> 90% </span> Tại các nhà hàng, cafe trong hệ thống <span>Slick.vn</span>
                  </div>
                </div>
              </li>
              
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_2.png">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    <span>Khám phá</span> Nhiều phong cách ẩm thực Việt Nam và quốc tế
                  </div>
                </div>
              </li>
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_3.png">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Tìm kiếm <span>Điểm đến</span> Chi tiết, dễ dàng, nhanh chóng
                  </div>
                </div>
              </li>
              <li> 
                <div class="image">
                    <img class="image_detail" src="<?php echo $url?>includes/images/introduce/icon_introduce_4.jpg">
                </div>
                <div class="detail_content">
                  <div class="detail_content_text">
                    Điểm tích lũy <span>đổi quà</span> từ hoạt động online, đánh giá nhà hàng
                  </div>
                </div>
              </li>
              
              
            </ul>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php $url=  base_url(); ?>
<input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 
<script>
   $(function(){
     $('#btn_login').click(function() {
      var email=$('#param_email').val();
      var password=$('#param_password').val();
      
    //  alert(email);
     // alert(password);
      var url = $('#hidUrl').val();
      $.post( url + "index.php/check_login", 
               { email: email,
                 password: password
               
                }, function(data){
                  alert(data);         
              
          });
      
        

    });
    
  }); 
</script>