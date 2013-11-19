<?php $url = base_url(); ?>
<div id="menu_custom">
     <div class="menu_main">
       <div class="menu_main_background">
      <div class="menu_top">

        <div class="search">
          <div class="form_search">
             <div class="form_search_input">
               <input id="input_text_search" class="input_search" type="text"  placeholder="Bạn đang muốn tìm gì?" >
               <lable class="lable_search">
                   <select class="select_custom" id="slect_search">
                    <option value="restaurant">Nhà hàng</option>
<!--                    <option value="coupon">Khuyến mãi</option>-->
                    <option value="post">Bài viết</option>
                  </select>
               </lable>
             </div>


             <div class="btn_search_nimbel">
               <div id="home-section-projects" >
                 <a href="#" class="more-info" id="button_submit_search"></a>
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
          <ul>
            <li>
              <a href="<?php echo $url; ?>index.php/home_controller/sign_up">
                <div class="btn_signup">
                  <div class="image_signup">
                  </div>
                  <!--
                  <ul>
                    <li><div class="icon_login"></div></li>
                    <li><span>Sign Up</span></li>
                  </ul>
                  -->
                </div>
              </a>
            </li>
            <li>
              <a href="<?php echo $url; ?>index.php/home_controller/log_in">
                <div class="btn_login">
                  <div class="image_login">
                  </div>
                  <!--
                    <ul>
                      <li><div class="icon_register"></div></li>
                      <li><span>Log In</span></li>
                    </ul>
                  -->
                </div>
              </a>
            </li>
          </ul>
        </div>  
      </div>

        <div class="menu_mid">
          <div class="menu_mid_custom_center">
            <div class="menu_mid_title"></div>
            <ul>
              
              <?php 
                foreach ($meal_list as $meal_list){                  
                  echo '<li>
                           <a href="'.$url.'index.php/search/search/search_meal?meal_name='.$meal_list['name'].'">
                             <div class="btn_menu_mid">
                                 <span>'.$meal_list['name'].'
                             </span>
                             </div>
                           </a>
                        </li>';
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
                  echo '<li>
                          <a href="'.$url.'index.php/search/search/search_favourite?favourite_id='.$favourite_list['id'].'">
                            <div class="background">
                              <div class="text_align_center">
                                  '.$favourite_list['name'].'
                               </div>
                             </div>
                           </a>
                         </li>';
                }
              
              ?> 
            
          
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
  $("#button_submit_search").click(function (){
    var input_text_search=$("#input_text_search").val();
    var slect_search = $("#slect_search").val();
    
    var url= $("#hidUrl").val();
    url=url+'index.php/search/search/search_restaurant';
    //search theo nhà hàng
    if(slect_search=="restaurant"){
        
        window.location=url+"?input_text_search="+input_text_search;
    }
    else //search theo bài viết
      if(slect_search=="post"){
      
          alert('chức năng search theo bài viết đang xây dựng');
      
        }
    
    
    
    
    
  });
</script>