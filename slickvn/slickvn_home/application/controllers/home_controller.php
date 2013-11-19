<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';

class Home_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    API_Link_Enum::initialize();
  }

  public function index()
	{
    $this->load->model('RestaurantEnum');
    $this->load->helper('url');
    $this->load->view('home/header/header_home_page');
    API_Link_Enum::initialize();
    
    
  /*===============MENU==========================================================================*/
    $link_meal_list = API_Link_Enum::$MEAL_TYPE_LIST_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_MEAL_TYPE;
    $json_string_meal_list = file_get_contents($link_meal_list);    
    $json_meal_list = json_decode($json_string_meal_list, true);
    
    $link_favourite_list = API_Link_Enum::$FAVOURITE_TYPE_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_FAVOURITE;
    $json_string_favourite_list = file_get_contents($link_favourite_list);    
    $json_favourite_list = json_decode($json_string_favourite_list, true);
    
    
    $data['meal_list']=$json_meal_list["Results"];
    //var_dump($json_meal_list["Results"]);
    $data['favourite_list']=$json_favourite_list["Results"];    
    
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/
    
    
  /*=================CAROUSEL========================================================================================*/
    $link_carousel_list = API_Link_Enum::$CAROUSEL_URL."?limit=5&page=1";
    //var_dump($link_carousel_list);
    $json_string_carousel_list = file_get_contents($link_carousel_list);    
    $json_carousel_list = json_decode($json_string_carousel_list, true);
    
    $data['carousel_list']=$json_carousel_list["Results"];
    $data['link_restaurant_frofile']=  API_Link_Enum::$BASE_PROFILE_RESTAURANT_URL;
    
    $this->load->view('home/content/carousel',$data);
    
  /*=================END_CAROUSEL=======================================================================================*/    
    
    $this->load->view('home/content/sub_banner');
    $this->load->view('home/content/sub_banner_more');   
    
  /*==================================RESTAURANT_LIST===========================================================  */ 
     /*-----------------------------------------------------
            Purpose: Get API new restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
     -------------------------------------------------------*/
    $link_newest_res = API_Link_Enum::$NEWEST_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_NEWEST_RESTAURANT."&page=1";
    $json_string_newest_res = file_get_contents($link_newest_res);    
    $json_newest_res = json_decode($json_string_newest_res, true);
    $data['newest_restaurant']=$json_newest_res["Results"];
    
   
    /*end get orther restaurant json */
    /*-----------------------------------------------------
            Purpose: Get API orther restaurant list 
            Author: Vinh Phu
            Version: 28/10/2013
     -------------------------------------------------------*/    
    $link_orther_res = API_Link_Enum::$ORTHER_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_ORTHER_RESTAURANT."&page=1";
    $json_string_orther_res = file_get_contents($link_orther_res);    
    $json_orther_res = json_decode($json_string_orther_res, true);
    $data['orther_restaurant']=$json_orther_res["Results"];   
    /*end get orther restaurant json */
    $this->load->view('home/content/restaurant_list',$data);
    ///$this->load->view('templates/content/restaurant_list');
    $this->load->view('home/content/restaurant_list_title_newest');
    $this->load->view('home/content/restaurant_list_content_newest',$data);    
   // $this->load->view('templates/content/append_restaurant_newest_List',$data);
    $this->load->view('home/content/restaurant_list_title_orther');
    $this->load->view('home/content/restaurant_list_content_orther');
  /*========================================END_RESTAURANT_LIST====================================================*/
    
  /*========================================PROMOTION==================================================================*/    
/*    $link_promotion_list = API_Link_Enum::$PROMOTION_URL."?limit=".RestaurantEnum::LIMIT_PAGE_PROMOTION."&page=1";
    $json_string_promotion_list = file_get_contents($link_promotion_list);    
    $json_promotion_list = json_decode($json_string_promotion_list, true);
    $data['promotion_list']=$json_promotion_list["Results"]; 
    
    
    $this->load->view('home/content/promotion',$data);
  /*=======================================END PROMOTION==============================================================================*/    
    
/*==================Danh Sách bài viết hay POST=============================================================================================================*/   
    $link_post = API_Link_Enum::$POST_URL."?limit=".RestaurantEnum::LIMIT_PAGE_POST."&page=1";
    
    $json_string_post= file_get_contents($link_post);    
    $json_post = json_decode($json_string_post, true);
    $data['articles_list']=$json_post["Results"]; 
    
    $data['link_image_post_url']=  API_Link_Enum::$BASE_IMAGE_POST_URL;
   // var_dump($data['articles_list']);
    
    $this->load->view('home/content/articles',$data);
/*=================end Danh Sách bài viết hay POST ===============================================================================================================*/
/*===============add post======================================================================*/
   // $this->load->view('templates/content/upload');
/*===============end upload post======================================================================*/
    $this->load->view('home/content/dang_ky_nhan_uu_dai');
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_home_page');
    
    
	}
  
  
  public function sign_up()
	{
    $this->load->helper('url');
    $this->load->view('home/header/header_signup_login');
    API_Link_Enum::initialize();
    
    /*===============MENU==========================================================================*/
    $link_meal_list = API_Link_Enum::$MEAL_TYPE_LIST_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_MEAL_TYPE;
    $json_string_meal_list = file_get_contents($link_meal_list);    
    $json_meal_list = json_decode($json_string_meal_list, true);
    
    $link_favourite_list = API_Link_Enum::$FAVOURITE_TYPE_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_FAVOURITE;
    $json_string_favourite_list = file_get_contents($link_favourite_list);    
    $json_favourite_list = json_decode($json_string_favourite_list, true);
    
    
    $data['meal_list']=$json_meal_list["Results"];
    //var_dump($json_meal_list["Results"]);
    $data['favourite_list']=$json_favourite_list["Results"];    
    
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/
    
    
    
    $this->load->view('home/content/form_sign_up');
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_signup_login');
	}
    public function log_in()
	{
    
    $this->load->helper('url');
    $this->load->view('home/header/header_signup_login');
    API_Link_Enum::initialize();
 /*===============MENU==========================================================================*/
    $link_meal_list = API_Link_Enum::$MEAL_TYPE_LIST_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_MEAL_TYPE;
    $json_string_meal_list = file_get_contents($link_meal_list);    
    $json_meal_list = json_decode($json_string_meal_list, true);
    
    $link_favourite_list = API_Link_Enum::$FAVOURITE_TYPE_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_FAVOURITE;
    $json_string_favourite_list = file_get_contents($link_favourite_list);    
    $json_favourite_list = json_decode($json_string_favourite_list, true);
    
    
    $data['meal_list']=$json_meal_list["Results"];
    //var_dump($json_meal_list["Results"]);
    $data['favourite_list']=$json_favourite_list["Results"];    
    
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/
    $this->load->view('home/content/form_log_in');
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_signup_login');
	}
  public function detail_restaurant(){
    $this->load->helper('url');
    $this->load->view('home/header/header_detail_restaurant');
    $this->load->view('home/menu/menu');
    
    /*detail_restaurant*/
    $this->load->view('home/detail_restaurant/header');
   // $this->load->view('templates/detail_restaurant/slide_show_detail_restaurant');
    $this->load->view('home/detail_restaurant/detail_content_restaurant');
    
    $this->load->view('home/detail_restaurant/footer');
    
    
    /*end detail_restaurant*/
    
    
    $this->load->view('home/content/footer_content');   
    $this->load->view('home/footer/footer_detail_restaurant');
  }
  
  public function more_Newest_Restaurant(){
    $page=$_POST['page'];
    $this->load->model('RestaurantEnum');
    API_Link_Enum::initialize();
    
    
    $link_newest_res = API_Link_Enum::$NEWEST_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_NEWEST_RESTAURANT."&page=".$page;;
    $json_string_newest_res = file_get_contents($link_newest_res);    
    $json_newest_res = json_decode($json_string_newest_res, true);
    $data['newest_restaurant']=$json_newest_res["Results"];
    $url=$this->load->helper('url');    
    
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
    
    
  }
    public function more_Orther_Restaurant(){
    $page=$_POST['page_orther'];
    $this->load->model('RestaurantEnum');
    $link_orther_res = API_Link_Enum::$ORTHER_RESTAURANT_URL."?limit=".RestaurantEnum::LIMIT_PAGE_ORTHER_RESTAURANT."&page=".$page;
    $json_string_orther_res = file_get_contents($link_orther_res);    
    $json_orther_res = json_decode($json_string_orther_res, true);
    $data['orther_restaurant']=$json_orther_res["Results"];
   $url=$this->load->helper('url'); 
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
    
    
  }
  
  public function more_Promotion(){
    $page=$_POST['page_promotion'];
    $this->load->model('RestaurantEnum');
    $link = API_Link_Enum::$PROMOTION_URL."?limit=".RestaurantEnum::LIMIT_PAGE_PROMOTION."&page=".$page;
    $json_string = file_get_contents($link);    
    $json = json_decode($json_string, true);
    
    foreach ($json['Results'] as $promotion_list){
                $id= $promotion_list['id'];
                $coupon_value=$promotion_list['coupon_value'];
                $deal_to_date=$promotion_list['deal_to_date'];
                $restaurant_name=$promotion_list['restaurant_name'];
                $content=$promotion_list['content'];
                $image_link=$promotion_list['image_link'];
                $link_to=$promotion_list['link_to'];
                
                
                echo '
                      <li>
                        <div class="detail_box">
                                <div class="promotion_custom">
                                  <div class="img_item">
                                      <a href="'.$link_to.'">
                                        <img src="'.$image_link.'" title="'.$restaurant_name.'" alt="'.$restaurant_name.'" >
                                      </a>
                                  </div>
                                  <div class="info_promotion">
                                        <div class="title">
                                           <a href="'.$link_to.'">'.$restaurant_name.'</a>
                                        </div>
                                        <div class="info_promotion">
                                           '.$content.'
                                        </div>
                                  </div>
                               </div>
                       </div> 
                     </li>
                ';
                
        }
  }
  
  public function more_Post(){
    $page=$_POST['page_more_post'];
    $this->load->model('RestaurantEnum');
    $link = API_Link_Enum::$POST_URL."?limit=".RestaurantEnum::LIMIT_PAGE_POST."&page=".$page;
    $json_string = file_get_contents($link);    
    $json = json_decode($json_string, true);
    $data['link_image_post_url']=  API_Link_Enum::$BASE_IMAGE_POST_URL;
    
    foreach ($json['Results'] as $articles_list) {
            $id=$articles_list['id'];
            $title=$articles_list['title'];
            $id_user=$articles_list['id_user'];
            $avatar=$articles_list['avatar'];
            $address=$articles_list['address'];
            $content=$articles_list['content'];
            //$number_view=$articles_list['number_view'];
            $number_view=0;
            $note=$articles_list['note'];
            $authors=$articles_list['authors'];
            $created_date=$articles_list['created_date'];
            
            $favourite_type_list=$articles_list['favourite_type_list'];
            $data['link_image_post_url']=  API_Link_Enum::$BASE_IMAGE_POST_URL;
            $favourite_type_list=substr($favourite_type_list, 1); 
    
            $price_person_list=$articles_list['price_person_list'];
            $price_person_list=substr($price_person_list, 1); 
            
            $culinary_style=$articles_list['culinary_style_list'];
            $culinary_style=substr($culinary_style, 1); 
//            $culinary_style=substr($culinary_style, 1); 
            $rate_point=5;
            
            
            echo'
                <div class="box_list">
                  <div class="images">
                    <a href="#">
                      <div class="detail_image">
                        <img src="'.$data['link_image_post_url'].$avatar.'" >

                      </div>
                    </a>
                  </div>
                  <div class="content">
                    <span class="title">'.$title.'</span> <br>
                    <p>'.$address.'</p>              
                    <b>Mục Đích:</b>&nbsp; '.$favourite_type_list.' <br>
                    <b>Giá trung bình/người:</b>&nbsp; '.$price_person_list.'<br>
                    <b>Phong cách ẩm thực:</b>&nbsp; '.$culinary_style.'<br>
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
                         <b>0</b>&nbsp; Bình luận <br>
                         <b>'.$number_view.'</b>&nbsp; Lượt xem
                        </div>
                      </div>
                  </div>
                </div>
            ';
            
       }  
  }
  
  public function add_post()
	{
    $this->load->helper('url');
    $this->load->view('home/header/header_add_post');
    
    
    /*===============MENU==========================================================================*/
            /*gọi API lấy danh sách các món ăn*/
    $link_meal_list = API_Link_Enum::$MEAL_TYPE_LIST_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_MEAL_TYPE;
    $json_string_meal_list = file_get_contents($link_meal_list);    
    $json_meal_list = json_decode($json_string_meal_list, true);
    
    $link_favourite_list = API_Link_Enum::$FAVOURITE_TYPE_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_FAVOURITE;
    $json_string_favourite_list = file_get_contents($link_favourite_list);    
    $json_favourite_list = json_decode($json_string_favourite_list, true);
    
    
    $data['meal_list']=$json_meal_list["Results"];
    //var_dump($json_meal_list["Results"]);
    $data['favourite_list']=$json_favourite_list["Results"];    
    
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/
    
    //lay danh sach price_persion (gia trung binh nguoi)
    $link_price_persion = API_Link_Enum::$PRICE_PERSION_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_PRICE_PERSION;
    
    $json_string_price_persion = file_get_contents($link_price_persion);    
    $json_price_persion = json_decode($json_string_price_persion, true);
    $data['price_persion']=$json_price_persion["Results"];
     
   //lay danh sach phong cach am thuc culinary_style
     $link_culinary_style = API_Link_Enum::$CULINARY_STYLE_URL.API_Link_Enum::COLLECTION_NAME.API_Link_Enum::COLLECTION_CULINARY_STYLE;
     //var_dump($link_culinary_style);
     $json_string_culinary_style = file_get_contents($link_culinary_style);    
     $json_culinary_style = json_decode($json_string_culinary_style, true);
     $data['culinary_style']=$json_culinary_style["Results"];
    
    
    $this->load->view('home/content/add_post',$data);
    
    
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_add_post');
   // $this->load->view('templates/content/ckeditor');
	}
  
}

