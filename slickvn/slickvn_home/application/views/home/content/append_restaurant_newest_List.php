<?php $url=  base_url();?>


<div id="append_restaurant_newest_List">
   <div class="articles_list">
     <div class="articles_list_custom_center"  id="append_More_Post">
          <?php 
            foreach($newest_restaurant as $value_res_newest){
             $id=$value_res_newest['id'];
             $name=$value_res_newest['name'];
             $status=$value_res_newest['status'];
             $created_date=$value_res_newest['created_date'];
             $address=$value_res_newest['address'];
             $rate_point=$value_res_newest['rate_point'];
             $image_link=$value_res_newest['image_link'];
            
            
            echo'
                <div class="box_list">
                  <div class="images">
                    <a href="#">
                      <div class="detail_image">
                        <img src="'.$image_link.'" >

                      </div>
                    </a>
                  </div>
                  <div class="content">
                    <span class="title">'.$name.'</span> <br>
                    <p>'.$address.'</p>              
                    
                  </div>
                  <div class="comment">
                      <div class="box_comment">
                        <div class="title">
                          <span>'.$rate_point.'</span>
                        </div>';
            
                         
                          echo'   <div class="vote">';
                          
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

                       
                        

                      echo'<div class="detail">
                         
                        </div>
                      </div>
                  </div>
                </div>
            ';
            
       }     
       
       ?>
      
       
               
       </div>
    </div>
</div>





