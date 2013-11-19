
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
require APPPATH.'/models/RestaurantEnum.php';

class Append_restaurant_newest_Grid_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    API_Link_Enum::initialize();
  }

  public function index()
	{
    
    $link_newest_res = API_Link_Enum::$NEWEST_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_NEWEST_RESTAURANT."&page=1";
    $json_string_newest_res = file_get_contents($link_newest_res);    
    $json_newest_res = json_decode($json_string_newest_res, true);
    $data['newest_restaurant']=$json_newest_res["Results"];
    $this->load->helper('url');
    $url=  base_url();
    //var_dump($link_newest_res);
    echo'
           <div id="append_Res_Newest_List">
            <div id="remove_Res_Newest_List">
            <div id="restaurant_list_content">
                   <div class="box_restaurant_content">
                       <!--masonry  class="masonry js-masonry"-->
                    <div class="box_restaurant_content_custom_center">
                      <ul class="append_newest_restaurant thumb_grid" >

                     ';
     
             foreach($data['newest_restaurant'] as $value_res_newest){
             $avatar=$value_res_newest['avatar'];             
             $id=$value_res_newest['id'];
             $name=$value_res_newest['name'];
             $desc=$value_res_newest['desc'];
             $address=$value_res_newest['address'];
             $number_assessment=$value_res_newest['number_assessment'];
             $number_like=$value_res_newest['number_like'];
             $rate_point=$value_res_newest['rate_point'];
             
            
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
        
      echo'   </ul>
                    <ul id="more_Newest_Restaurant">
                       <li class="li_more">
                           <a href="javascript:;" id="btn_More_Newest_Restaurant">
                                <div id="remove_button_more" class="button_more_noload">
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
            <input type="hidden" value="1" id="number_page_newest_restaurant"> 
            <?php $url=  base_url(); ?>
            <input type="hidden" value="<?php echo $url;?>" id="hidUrl"> 

            <script>

              $(function(){
                var page_this = parseInt($(\'#number_page_newest_restaurant\').val());
                var page_next= page_this; 
                $(\'#btn_More_Newest_Restaurant\').click(function() {
                 // more_Newest_Restaurant();
                  page_next= page_next+1;
                  //alert(page_next);
                  $("#remove_button_more").removeClass(\'button_more_noload\');
                  $("#remove_button_more").addClass(\'button_more_loading\');
                  $("#niceThumb_remove").remove();

                  var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Grid ();});<\/script></div>";

                  var url = $(\'#hidUrl\').val();
                  $.post( url + "index.php/home_controller/more_Newest_Restaurant", 
                           { page: page_next}, function(data){

                                              $(\'.append_newest_restaurant\').append(data);
                                              $(\'#niceThumb_append\').append(dataThumb);
                                              $("#remove_button_more").removeClass(\'button_more_loading\');
                                              $("#remove_button_more").addClass(\'button_more_noload\');
                                              if(data==""){
                                                //alert(\'het\');
                                                $("#more_Newest_Restaurant").remove();
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