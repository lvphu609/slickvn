
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
require APPPATH.'/models/RestaurantEnum.php';

class Append_restaurant_orther_Simple_controller extends CI_Controller {
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
           <div id="Res_Orther_Simple">
            <div class="articles_list">
              <div class="articles_list_custom_center">
                  <div class="append_orther_restaurant">';
           foreach($data['orther_restaurant'] as $value_res_orther){
                      $avatar=$value_res_orther['avatar'];             
                      $id=$value_res_orther['id'];
                      $name=$value_res_orther['name'];
                      $desc=$value_res_orther['desc'];
                      $address=$value_res_orther['address'];
                      $number_assessment=$value_res_orther['number_assessment'];
                      $number_like=$value_res_orther['number_like'];
                      $rate_point=$value_res_orther['rate_point'];

                     echo'<a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                         <div class="box_list">
                           
                           <div class="content">
                             <span class="title">'.$name.'</span> ';
                               
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

                       echo' <br>
                             <p>'.$address.'</p>              

                           </div>
                           
                         </div>
                         </a>
                     ';

                }     
            echo '</div>';
             



     echo'  </div>
         </div>
      </div>
    ';
     
 //button load more  
   echo '  <div id="Res_Orther_Simple">
            <div class="articles_list">
              <div class="articles_list_custom_center" >
              
              <div id="more_Orther_Restaurant">
                <div class="box_list">
                   <a href="javascript:;" id="btn_More_Orther_Restaurant_Simple">
                    <div id="more_Orther_Restaurant_Simple">
                        <div id="remove_orther_class_button_more_simple" class="button_more_noload_list">
                     
                        </div>
                    </div>
                   </a>
                 </div>
               </div>
               

              </div>
             </div>
            </div>
      ';        
     
     
   //goi ham niceThumb hieu ung 
       echo'
      <!--zoom hover-->
            <div id="niceThumb_append">
              <div id="niceThumb_remove">
                <script>
                    $(function(){
                      niceThumb_Simple();
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
    <input type="hidden" value="1" id="number_page_orther_restaurant"> 
    <input type="hidden" value="'.$url.'" id="hidUrl"> 

    <script>

      $(function(){
        var page_this_orther_Simple = parseInt($(\'#number_page_orther_restaurant\').val());
        var page_next_orther_Simple= page_this_orther_Simple; 
        $(\'#btn_More_Orther_Restaurant_Simple\').click(function() {
          page_next_orther_Simple= page_next_orther_Simple+1;
          $("#remove_orther_class_button_more_simple").removeClass(\'button_more_noload_list\');
          $("#remove_orther_class_button_more_simple").addClass(\'button_more_load_list\');
          $("#niceThumb_remove").remove();

          var dataThumb = "<div id=\"niceThumb_remove\"><script>$(function(){niceThumb_Simple ();});<\/script></div>";
          //alert(\'hello\');
          var url = $(\'#hidUrl\').val();
          $.post( url + "index.php/append_restaurant_orther_Simple_controller/more_Orther_Restaurant", 
                   { page: page_next_orther_Simple}, function(data){

                                     // alert(\'hello\');
                                      $(\'.append_orther_restaurant\').append(data);
                                      $(\'#niceThumb_append\').append(dataThumb);
                                      $("#remove_orther_class_button_more_simple").removeClass(\'button_more_load_list\');
                                      $("#remove_orther_class_button_more_simple").addClass(\'button_more_noload_list\');
                                      


                                      });



        });

      }); 
    </script> ';







      //end append data     
      echo'
        </div>
      </div>
      ';
  
    
  }
  
  
  
  public  function more_Orther_Restaurant(){
      
    $page=$_POST['page'];
    //var_dump($page);
    $link_orther_res = API_Link_Enum::$ORTHER_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_ORTHER_RESTAURANT."&page=".$page;
    $json_string_orther_res = file_get_contents($link_orther_res);    
    $json_orther_res = json_decode($json_string_orther_res, true);
    $data['orther_restaurant']=$json_orther_res["Results"];
   // echo "da nhan trang ".$page;
    
     foreach($data['orther_restaurant'] as $value_res_orther){
                      $avatar=$value_res_orther['avatar'];             
                      $id=$value_res_orther['id'];
                      $name=$value_res_orther['name'];
                      $desc=$value_res_orther['desc'];
                      $address=$value_res_orther['address'];
                      $number_assessment=$value_res_orther['number_assessment'];
                      $number_like=$value_res_orther['number_like'];
                      $rate_point=$value_res_orther['rate_point'];

                     echo'<a href="'.$url.'/index.php/detail_restaurant/detail_restaurant?id_restaurant='.$id.'">
                         <div class="box_list">
                           
                           <div class="content">
                             <span class="title">'.$name.'</span> ';
                               
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

                       echo' <br>
                             <p>'.$address.'</p>              

                           </div>
                           
                         </div>
                         </a>
                     ';

                }     
    
        } 
  
  
  
  
  
  
  
  
}?>
