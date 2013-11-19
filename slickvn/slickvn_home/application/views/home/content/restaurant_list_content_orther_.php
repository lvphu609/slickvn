<div id="restaurant_list" class="restaurant_list_content_orther">
  <div id="box_restaurant_list">
       <div class="box_restaurant_content">
         
         
          <!--masonry-->
         <div id="basic" class="masonry_custom">                 
          <ul>
              <!--
            Purpose: Get API old restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
          !-->
          <?php 
             foreach($orther_restaurant as $value_res_orther){
             $id1=$value_res_orther['id'];
             $name1=$value_res_orther['name'];
             $status1=$value_res_orther['status'];
             $created_date1=$value_res_orther['created_date'];
             $address1=$value_res_orther['address'];
             $rate_point1=$value_res_orther['rate_point'];
             $image_link1=$value_res_orther['image_link'];
             
              echo'
               <li>            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="#">
                                 <img src="'.$image_link1.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                             </a>';


                            if($status1=="empty"){

                            } 
                            else
                              if($status1=="reduce"){
                                echo'
                                <div class="box_info_authentication">
                                      <div class="item_left_red">'.
                                       $status1                              
                                    .'</div>                              
                                </div>';
                              }
                              else{
                                echo'
                               <div class="box_info_authentication">
                                      <div class="item_left">'.
                                       $status1                              
                                    .'</div>                              
                                </div>';                      
                              }
                              
                              
                            
                           echo' 
                            </div>
                           <div class="info_restaurant">
                                 <div class="title">
                                    <a href="#">'.$name1.'Sweet cherry cafe</a>
                                 </div>';
                         
                          echo'   <div class="vote">';
                          
                          $stt_off=5-$rate_point1;
                          $stt_on= $rate_point1;
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
                                   $address1
                                 .'</div>
                           </div>
                  </div>  
                </li>
                ';
               }               
            ?>


            <li>
              <a href="#">
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
         
         
         <div  class="box_restaurant_content_custom_center">
         </div>
       </div>
    </div>
 </div>
