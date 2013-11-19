<div id="restaurant_list" class="restaurant_list_content_newest">
  <div id="box_restaurant_list">
       <div class="box_restaurant_content">
           <!--masonry-->
         <div id="basic" class="masonry_custom">
          <ul>
          <!--
            Purpose: Get API new restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
          !-->
          <div id="append_newest_restaurant">
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
               <li>            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="#">
                                 <img src="'.$image_link.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                             </a>';


                            if($status=="empty"){

                            } 
                            else
                              if($status=="reduce"){
                                echo'
                                <div class="box_info_authentication">
                                      <div class="item_left_red">'.
                                       $status                              
                                    .'</div>                              
                                </div>';
                              }
                              else{
                                echo'
                               <div class="box_info_authentication">
                                      <div class="item_left">'.
                                       $status                              
                                    .'</div>                              
                                </div>';                      
                              }
                              
                              
                            
                           echo' 
                            </div>
                           <div class="info_restaurant">
                                 <div class="title">
                                    <a href="#">'.$name.'Sweet cherry cafe</a>
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
                                   
                          echo'<div class="address">
                                   <br>'.
                                   $address
                                 .'</div>
                           </div>
                </div>  
              </li>
              ';
             
             
           }           
            ?> 
          </div>
          <li>
            <a href="#" onclick="">
                  <div class="button_more">
                    <div class="text"><span>Xem thêm</span></div>
                  </div>
              </a>
            </li> 
          
          
        </ul>
           
      </div>
      <script>
        docReady( function() {
          var container = document.querySelector('#basic');
          var msnry = new Masonry( container, {
            columnWidth: 60
          });
        });
      </script>
         <!--end masonry-->
         
         
      <!--javascrip append <li> to <ul>-->
      <script>
        function more_Newest_Restaurant(){
          
          alert('hello');
          
        }
      </script>   
      <!--end javascrip append <li> to <ul>-->
         
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
         <div class="box_restaurant_content_custom_center">
         </div>
    </div>
 </div>
</div>