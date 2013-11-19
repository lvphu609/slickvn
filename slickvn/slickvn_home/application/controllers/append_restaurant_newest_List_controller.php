
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
require APPPATH.'/models/RestaurantEnum.php';

class Append_restaurant_newest_List_controller extends CI_Controller {
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
    $data['link_restaurant_frofile']=  API_Link_Enum::$BASE_PROFILE_RESTAURANT_URL;
    $link_image=$data['link_restaurant_frofile'];
    
    echo'
      <div id="append_Res_Newest_List">
      <div id="remove_Res_Newest_List">
        <div id="Res_Newest_List">
            <div class="articles_list">
              <div class="articles_list_custom_center"  >
                  <div class="append_newest_restaurant" >';
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
                         <div class="box_list">
                           <div class="images">
                             
                               <div class="detail_image" style="width:200px; height:200px;">
                                 <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                   <img style="width:200px; height:200px;" class="big" src="'.$link_image.$avatar.'" >
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
                                 </div>';
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
                                </div>
                                
                              </div>
                            ';
                             
                       echo'</div>
                           <div class="content">
                             <span class="title">'.$name.'</span> <br>
                             <p>'.$address.'</p>
                             <div class="line"></div>
                             <div class="introduce_restaurant">
                                  <span>
                                   '.$desc.'
                                  </span>     
                              </div>

                           </div>
                           
                           <div class="comment">
                               <div class="box_comment">
                                 <div class="title">
                                   <span>'.round($rate_point,1).'</span>
                                 </div>';


                                   echo'   <div class="vote">';

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




                               echo'<div class="detail">

                                 </div>
                               </div>
                           </div>
                         </div>
                     ';

                 }     
               echo' </div>';
             



       echo'         </div>
                </div>
              </div>
             ';
      
       
       
   //button load more  
   echo '  <div id="Res_Newest_List">
            <div class="articles_list">
              <div class="articles_list_custom_center" >
              
              <div id="more_Newest_Restaurant">
                <div class="box_list">
                   <a href="javascript:;" id="btn_More_Newest_Restaurant_List">
                    <div id="more_Newest_Restaurant_List">
                        <div id="remove_class_button_more_list" class="button_more_noload_list">
                        </div>
                    </div>
                   </a>
                 </div>
               </div>
               
                </div>
              </div>
            </div>
         
     
              ';    
       
       
       
  //goi ham hieu ung khi re chuot     
    echo'
      <!--zoom hover-->
            <div id="niceThumb_append">
              <div id="niceThumb_remove">
                <script>
                    $(function(){
                      niceThumb_List();
                    });
                </script>
               </div>
            </div>
     <!--zoom hover-->
   ';   
       
 //btn xem them load javascript
 
$this->load->helper('url');
$url=  base_url();
echo'
  <!--javascrip append <li> to <ul>-->
<input type="hidden" value="1" id="number_page_newest_restaurant"> 
<input type="hidden" value="'.$url.'" id="hidUrl"> 

<script>

  $(function(){
    var page_this_newest_List = parseInt($(\'#number_page_newest_restaurant\').val());
    var page_next_newest_List= page_this_newest_List; 
    $(\'#btn_More_Newest_Restaurant_List\').click(function() {
      page_next_newest_List= page_next_newest_List+1;
      // alert(page_next_newest_List);

      $("#remove_class_button_more_list").removeClass(\'button_more_noload_list\');
      $("#remove_class_button_more_list").addClass(\'button_more_load_list\');
      $("#niceThumb_remove").remove();
      
      var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_List ();});<\/script></div>";
      
      var url = $(\'#hidUrl\').val();
      $.post( url + "index.php/append_restaurant_newest_List_controller/more_Newest_Restaurant", 
               { page: page_next_newest_List}, function(data){
               
                                  $(\'.append_newest_restaurant\').append(data);
                                  $(\'#niceThumb_append\').append(dataThumb);
                                  $("#remove_class_button_more_list").removeClass(\'button_more_load_list\');
                                  $("#remove_class_button_more_list").addClass(\'button_more_noload_list\');
                                  

                                  if(data==""){
                                    //alert(\'het\');
                                    //$("#more_Newest_Restaurant").remove();
                                  }
                                  
                                  });
      
        

    });
    
  }); 
</script> 

 </div>
</div>
';
       
  }
  
  public function more_Newest_Restaurant(){
    
    $page=$_POST['page'];
    //var_dump($page);
    $link_newest_res = API_Link_Enum::$NEWEST_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_NEWEST_RESTAURANT."&page=".$page;
    $json_string_newest_res = file_get_contents($link_newest_res);    
    $json_newest_res = json_decode($json_string_newest_res, true);
    $data['newest_restaurant']=$json_newest_res["Results"];
    //echo "da nhan trang ".$page;
    
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
                         <div class="box_list">
                           <div class="images">
                             
                               <div class="detail_image" style="width:200px; height:200px;">
                                 <a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                                   <img style="width:200px; height:200px;" class="big" src="'.$avatar.'" >
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
                                 </div>';
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
                                </div>
                                
                              </div>
                            ';
                             
                       echo'</div>
                           <div class="content">
                             <span class="title">'.$name.'</span> <br>
                             <p>'.$address.'</p>
                             <div class="line"></div>
                             <div class="introduce_restaurant">
                                  <span>
                                   '.$desc.'
                                  </span>     
                              </div>

                           </div>
                           
                           <div class="comment">
                               <div class="box_comment">
                                 <div class="title">
                                   <span>'.round($rate_point,1).'</span>
                                 </div>';


                                   echo'   <div class="vote">';

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




                               echo'<div class="detail">

                                 </div>
                               </div>
                           </div>
                         </div>
                     ';

                 }     

  }
  
  
  
  
  
  
  
}

?>