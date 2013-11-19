
<?php $url=  base_url(); ?>

<div id="alert">
  <a href="<?php echo $url;?>">
    <div class="image_home"></div>  >> RESTAURANT
  </a>
</div>

<div id="container" class="transitions-enabled infinite-scroll clearfix masonry" style="position: relative; height: 1357px;">
 <?php 
            foreach($restaurant_list as $value_res){
              $id=$value_res['id'];
             $name=$value_res['name'];
             $status=$value_res['status'];
             $created_date=$value_res['created_date'];
             $address=$value_res['address'];
             $rate_point=$value_res['rate_point'];
             $image_link=$value_res['image_link'];
             
              echo'
               <li style="z-index: 0;">            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="javascript:;">
                                 <img class="big" src="'.$image_link.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                                <a href="javascript:;">
                                  <div class ="image_bg_comment_animate">
                                      <div class ="image_comment_animate">
                                      </div>
                                  </div>
                                </a>
                                <a href="javascript:;">
                                  <div class ="image_bg_like_animate">
                                      <div class ="image_like_animate">
                                      </div>
                                  </div>
                                </a>
                             </div>
                            </div>';
                      echo'<div class="introduce_restaurant">
                             <span>
                              Thưởng thức tinh hoa ẩm thực Trung Hoa
                              với gần 100 món Dimsum cầu kỳ tại Nhà Hàng
                              Shi-Fu nổi tiếng.
                             </span>     
                          </div>';
                           echo' 
                           <div class="info_restaurant"> ';
                              //vote
                                echo'<div class="vote">';

                                $stt_off=5-$rate_point;
                                $stt_on= $rate_point;
                                while ($stt_on!=0){
                                  echo '<span class="star_on"></span>';
                                    $stt_on--;
                                }

                                while ($stt_off!=0){        
                                         echo'<span class="star_off"></span>';
                                         $stt_off--;
                                }
                                echo'   </div>';
                              
                              //like comment
                              echo'<div class="like_comment">
                                 <div class="comment">
                                    <span class=image_comment></span>
                                    <span class="text">9</span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text">9</span>
                                 </div>
                                </div>';
                              //line
                              echo'<div class="line"></div>';
                              
                               //iamges avatar restaurant
                              echo '<div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="'.$image_link.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>';
                                //name
                                echo'
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#">'.$name.'</a>
                                     </div>';
                                //address   
                                echo'<div class="address">'.
                                         $address
                                     .'</div>                                       
                                  </div>
                                  
                             </div>
                          </div>  
              </li>
              ';
             
             
           }           
             
              
   ?> 
</div>

 <!-- #container -->



