<?php $url = base_url(); ?>
<div id="menu_custom">
     <div class="menu_main">
       <div class="menu_main_background">
      <div class="menu_top">

        <div class="search">
          <div class="form_search">
             <div class="form_search_input">
               <input class="input_search" type="text"  placeholder="Bạn đang muốn tìm gì?" >
               <lable class="lable_search">
                   <select class="select_custom">
                    <option value="restaurant">Nhà hàng</option>
                    <option value="coupon">Khuyến mãi</option>
                    <option value="post">Bài viết</option>
                  </select>
               </lable>
             </div>


             <div class="btn_search_nimbel">
               <div id="home-section-projects" >
                 <a href="#" class="more-info"></a>
               </div>
            </div> 
             <!--
               <a href="#">
                 <div class="btn_submit_search">
             </div>
               </a>
             -->
          </div>
        </div>
        <div class="oauth_login">
          <ul>
            <li>
              <a href="#">
                <div class="icon_oauth_facebook"></div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="icon_oauth_twiter"></div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="icon_oauth_google"></div>
              </a>
            </li>
          </ul>
        </div>
        <div class="login_register">
          <div class="hello_user">
            <span>xin chào, User</span>
          </div>
        </div>  
      </div>

        <div class="menu_mid">
          <div class="menu_mid_custom_center">
            <div class="menu_mid_title"></div>
            <ul>
              
              <?php 
                foreach ($meal_list as $meal_list){                  
                  echo '<li><a href="#"><div class="btn_menu_mid"><span>'.$meal_list['name'].'</span></div></a></li>';
                }
              
              ?>  
              
              
            </ul>
          </div>
        </div>
      <div class="menu_bottom">
         <div class="menu_bottom_custom_center">
           <div class="menu_background">
          <div class="menu_bottom_title"></div>
          <ul>
            <?php 
                foreach ($favourite_list as $favourite_list){                  
                  echo '<li><a href="#"><div class="background"><div class="text_align_center">'.$favourite_list['name'].'</div></div></a></li>';
                }
              
              ?> 
            
          
          </ul>
          </div>
         </div>
      </div>
      </div>
    </div>
</div>