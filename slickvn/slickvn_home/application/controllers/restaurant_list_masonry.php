<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
require APPPATH.'/models/RestaurantEnum.php';
class Restaurant_list_masonry extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    API_Link_Enum::initialize();
  }

  public function index()
	{
    
    $link_res = API_Link_Enum::$RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_RESTAURANT_ALL."&page=1&order_by=-1";
    $json_string_res = file_get_contents($link_res);    
    $json_res = json_decode($json_string_res, true);
    $data['restaurant_list']=$json_res["Results"];
    //var_dump($link_res);
    $this->load->helper('url');
    $this->load->view('home/restaurant_list_masonry/header');
    $this->load->view('home/restaurant_list_masonry/content',$data);
    $this->load->view('home/restaurant_list_masonry/footer');
    
  }
 
  public function more_Restaurant(){
    $page=$_POST['page'];
    //echo "nhan duoc roi trang so: ".$page;
    $link_res = API_Link_Enum::$RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_RESTAURANT_ALL."&page=".$page."&order_by=-1";
    $json_string_res = file_get_contents($link_res);    
    $json_res = json_decode($json_string_res, true);
    $data['restaurant_list']=$json_res["Results"];
    //echo "hello".$page;
          foreach($data['restaurant_list'] as $value_res){
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
     
              
    }
    
 
}