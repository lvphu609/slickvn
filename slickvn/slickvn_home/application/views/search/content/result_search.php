<?php $url=  base_url(); 
      $url_res_frofile=$link_restaurant_frofile;
 ?>


<div id="result_search">
  <div class="box_align_center">
    <div class="box_detail_left">

    
      
    </div>
    <div class="box_detail_right">
      <div class="box_results_search">
        
      
       <?php
       
//search meal=================================================================================>       
      if($action_search="meal" && sizeof($result_search_meal)>0 ){
              echo "<ul>";
                foreach ($result_search_meal as $info_detail_restaurant) {
                    $id=                    $info_detail_restaurant['id'];
                    $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                    $id_user=               $info_detail_restaurant['id_user'];
                    $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                    $id_coupon=             $info_detail_restaurant['id_coupon'];
                    $name=                  $info_detail_restaurant['name'];
                    $number_view=           $info_detail_restaurant['number_view'];
                    $avatar=                $info_detail_restaurant['avatar'];
                    $address=               $info_detail_restaurant['address'];

                    $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                    $favourite_type_list=substr($favourite_type_list, 1); 

                    $price_person_list=     $info_detail_restaurant['price_person_list'];
                    $price_person_list=substr($price_person_list, 1); 

                    $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                    $culinary_style=substr($culinary_style, 1); 

                    $number_assessment=     $info_detail_restaurant['number_assessment'];
                    $number_view=           $info_detail_restaurant['number_view'];
                    $rate_point =           $info_detail_restaurant['rate_point'];
                    $rate_point =round($rate_point,1);

                   echo'<li>
                    <a href="'.$link_to_detail_restaurant.'">
                      <div class="left">
                        <img src="'.$url_res_frofile.$avatar.'">
                      </div>
                    </a>
                    <div class="mid">
                      <div class="title">
                        <a href="'.$link_to_detail_restaurant.'">
                          <span class="text_title">'.$name.'</span>
                        </a>
                      </div>
                      <div class="address">
                         <span class="text_address">
                           '.$address.'
                         </span>
                      </div>
                      <div class="content_introduce">
                        <p class="text_content_introduce">
                          <span >Mục Đích</span>:
                                  '.$favourite_type_list.'  <br> 
                          <span>Giá trung bình/người</span>:
                                   '.$price_person_list.' <br>                                
                          <span>Phong cách ẩm thực</span>:
                                   '.$culinary_style.' <br>  
                        </p>
                      </div>
                    </div>
                    <div class="right">
                      <div class="point">
                        <span>'.$rate_point.'</span>
                      </div>
                      <div class="vote">
                        <div class="rating">';

                             $stt_off=5-round($rate_point/2);
                              $stt_on= round($rate_point/2);
                              while ($stt_on!=0){
                                echo '<span class="star_active"></span>';
                                  $stt_on--;
                              }

                              while ($stt_off!=0){        
                                       echo'<span class="star_no_active"></span>';
                                       $stt_off--;
                              }

                 echo'</div>
                      </div>
                      <div class="comment_view">
                        <p>
                          <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                          <span>'.$number_view.'</span>&nbsp;lượt xem
                        </p>
                      </div>
                    </div>
                  </li>';

                } 

               echo "</ul>";
        }
        
        
 //search favourite=================================================================================>        

         if($action_search="favourite" && sizeof($result_search_favourite)>0 ){
           //var_dump($result_search_favourite);
                            echo "<ul>";
                              foreach ($result_search_favourite as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                                  $id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                  $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

                                           $stt_off=5-round($rate_point/2);
                                            $stt_on= round($rate_point/2);
                                            while ($stt_on!=0){
                                              echo '<span class="star_active"></span>';
                                                $stt_on--;
                                            }

                                            while ($stt_off!=0){        
                                                     echo'<span class="star_no_active"></span>';
                                                     $stt_off--;
                                            }

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                             echo "</ul>";
                      }
            
      //search restaurant=================================================================================>        

         if($action_search="restaurant" && sizeof($result_search_restaurant)>0 ){
           //var_dump($result_search_favourite);
                            echo "<ul>";
                              foreach ($result_search_restaurant as $info_detail_restaurant) {
                                  $id=                    $info_detail_restaurant['id'];
                                  $link_to_detail_restaurant=$url."index.php/detail_restaurant/detail_restaurant?id_restaurant=".$id;
                                  $id_user=               $info_detail_restaurant['id_user'];
                                  $id_menu_dish=          $info_detail_restaurant['id_menu_dish'];
                                  $id_coupon=             $info_detail_restaurant['id_coupon'];
                                  $name=                  $info_detail_restaurant['name'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $avatar=                $info_detail_restaurant['avatar'];
                                  $address=               $info_detail_restaurant['address'];

                                  $favourite_type_list=   $info_detail_restaurant['favourite_list'];
                                  $favourite_type_list=substr($favourite_type_list, 1); 

                                  $price_person_list=     $info_detail_restaurant['price_person_list'];
                                  $price_person_list=substr($price_person_list, 1); 

                                  $culinary_style=        $info_detail_restaurant['culinary_style_list'];
                                  $culinary_style=substr($culinary_style, 1); 

                                  $number_assessment=     $info_detail_restaurant['number_assessment'];
                                  $number_view=           $info_detail_restaurant['number_view'];
                                  $rate_point =           $info_detail_restaurant['rate_point'];
                                  $rate_point =round($rate_point,1);



                                 echo'<li>
                                  <a href="'.$link_to_detail_restaurant.'">
                                    <div class="left">
                                      <img src="'.$url_res_frofile.$avatar.'">
                                    </div>
                                  </a>
                                  <div class="mid">
                                    <div class="title">
                                      <a href="'.$link_to_detail_restaurant.'">
                                        <span class="text_title">'.$name.'</span>
                                      </a>
                                    </div>
                                    <div class="address">
                                       <span class="text_address">
                                         '.$address.'
                                       </span>
                                    </div>
                                    <div class="content_introduce">
                                      <p class="text_content_introduce">
                                        <span >Mục Đích</span>:
                                                '.$favourite_type_list.'  <br> 
                                        <span>Giá trung bình/người</span>:
                                                 '.$price_person_list.' <br>                                
                                        <span>Phong cách ẩm thực</span>:
                                                 '.$culinary_style.' <br>  
                                      </p>
                                    </div>
                                  </div>
                                  <div class="right">
                                    <div class="point">
                                      <span>'.$rate_point.'</span>
                                    </div>
                                    <div class="vote">
                                      <div class="rating">';

                                           $stt_off=5-round($rate_point/2);
                                            $stt_on= round($rate_point/2);
                                            while ($stt_on!=0){
                                              echo '<span class="star_active"></span>';
                                                $stt_on--;
                                            }

                                            while ($stt_off!=0){        
                                                     echo'<span class="star_no_active"></span>';
                                                     $stt_off--;
                                            }

                               echo'</div>
                                    </div>
                                    <div class="comment_view">
                                      <p>
                                        <span>'.$number_assessment.'</span>&nbsp;Bình luận<br>
                                        <span>'.$number_view.'</span>&nbsp;lượt xem
                                      </p>
                                    </div>
                                  </div>
                                </li>';

                              } 

                             echo "</ul>";
                      }                 
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
            
        ?>
    
        
     
        
        
      </div>
    </div>
  </div>
</div>