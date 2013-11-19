
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
require APPPATH.'/models/RestaurantEnum.php';

class Append_restaurant_orther_Grid_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    API_Link_Enum::initialize();
  }

  public function index()
	{
    
    $link_orther_res = API_Link_Enum::$ORTHER_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_ORTHER_RESTAURANT."&page=1";
    $json_string_orther_res = file_get_contents($link_orther_res);    
    $json_orther_res = json_decode($json_string_orther_res, true);
    $data['orther_restaurant']=$json_orther_res["Results"];   
    $this->load->helper('url');
    $url=  base_url();
    echo'
          <div id="append_Res_Orther_List">
            <div id="remove_Res_Orther_List">
              <div id="restaurant_list_content">
                 <div class="box_restaurant_content">
                     <!--masonry  class="masonry js-masonry"-->
                  <div class="box_restaurant_content_custom_center">
                    <ul class="append_orther_restaurant thumb_grid" >
                    <!--
                      Purpose: Get API new restaurant list 
                      Author: Vinh Phu
                      Version: 28/10/2013
                    !-->';

             foreach($data['orther_restaurant'] as $value_res_orther){
             $avatar=$value_res_orther['avatar'];             
             $id=$value_res_orther['id'];
             $name=$value_res_orther['name'];
             $desc=$value_res_orther['desc'];
             $address=$value_res_orther['address'];
             $number_assessment=$value_res_orther['number_assessment'];
             $number_like=$value_res_orther['number_like'];
             $rate_point=$value_res_orther['rate_point'];
             
            
              echo'
               <li style="z-index: 0;">            
                <div class="detail_box">
                           <div class="img_item">
                             <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                 <img style="width=40px; height=40px;" class="big" src="'.$avatar.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                             </a>
                             <div id="remove_comment_like_animate" class="">
                                <a href="#">
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
                              '.$desc.'
                             </span>     
                          </div>';
                           echo' 
                           <div class="info_restaurant"> ';
                              //vote
                                echo'<div class="vote">';

                                $stt_off=5-round($rate_point/2);
                                $stt_on= round($rate_point/2);
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
                                    <span class="text">'.$number_assessment.'</span>
                                 </div>
                                 <div class="like">
                                    <span class="image_like"></span>
                                    <span class="text">'.$number_like.'</span>
                                 </div>
                                </div>';
                              //line
                              echo'<div class="line"></div>';
                              
                               //iamges avatar restaurant
                              echo '<div class="avartar_restaurant">
                                      <a href="#">
                                          <img src="'.$avatar.'" title="Sweet cherry cafe" alt="Sweet cherry cafe" >
                                      </a>                            
                                    </div>';
                                //name
                                echo'
                                  <div class="title_address">
                                     <div class="title">
                                      <a href="#"><span>'.$name.'</span></a>
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
                    
      echo'     </ul>
                  <ul id="more_Orther_Restaurant">
                     <li class="li_more">
                         <a href="javascript:;" id="btn_More_Orther_Restaurant">
                              <div id="remove_button_more_orther" class="button_more_noload">
                                <div class="text"><span>&nbsp;</span></div>
                              </div>
                          </a>
                      </li> 
                  </ul>
               </div>
              </div>
           </div>

          <!--zoom hover-->
          <div id="niceThumb_append">
            <div id="niceThumb_remove">
              <script>
                  $(function(){
                    niceThumb_Grid ();
                  });
              </script>
             </div>
          </div>
          <!--zoom hover-->         

          <!--javascrip append <li> to <ul>-->
          <input type="hidden" value="1" id="number_page_orther_restaurant"> 
          <?php $url=  base_url(); ?>
          <input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

          <script>

            $(function(){
              var page_this_orther = parseInt($(\'#number_page_orther_restaurant\').val());
              var page_next_orther= page_this_orther; 
              $(\'#btn_More_Orther_Restaurant\').click(function() {
                page_next_orther= page_next_orther+1;
                //alert(page_next_orther);
                $("#remove_button_more_orther").removeClass(\'button_more_noload\');
                $("#remove_button_more_orther").addClass(\'button_more_loading\');
                 var url = $(\'#hidUrl\').val();
                 $("#niceThumb_remove").remove();
                 var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Grid ();});<\/script></div>";

                $.post( url + "index.php/home_controller/more_Orther_Restaurant", 
                         { page_orther: page_next_orther}, function(data){

                                            $(\'.append_orther_restaurant\').append(data);
                                            $(\'#niceThumb_append\').append(dataThumb);
                                            $("#remove_button_more_orther").removeClass(\'button_more_loading\');
                                            $("#remove_button_more_orther").addClass(\'button_more_noload\');

                                            if(data==""){
                                              //alert(\'het\');
                                              $("#more_Orther_Restaurant").remove();
                                            }

                                            });
              });

            }); 
          </script>   
          <!--end javascrip append <li> to <ul>-->

          </div>
          </div>
  
      ';
  }
  
  
  
  
  
}

?>
