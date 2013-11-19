<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';

class Check_login extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    API_Link_Enum::initialize();
  }

  public function index()
  {
    /*$email=$_POST['email'];
    $password=$_POST['password'];
    
   /* echo $email;
    echo $password;*/
    //echo 'email: '.$email.'   pass:'.$password;
  /*  $link = API_Link_Enum::LINK_LOGIN.'?email='.$email.'&password='.$password;
    $json_string= file_get_contents($link);    
    $json= json_decode($json_string, true);
    
   /*foreach($json["Results"] as $value_res_newest){
        
    }*/

    /*var_dump($json);*/
    
    
    $this->load->model('RestaurantEnum');
    $this->load->helper('url');
    $this->load->view('home/header/header_home_page');
    API_Link_Enum::initialize();
    
    
  /*===============MENU==========================================================================*/
    $link_meal_list = API_Link_Enum::$MEAL_TYPE_LIST_URL;
    $json_string_meal_list = file_get_contents($link_meal_list);    
    $json_meal_list = json_decode($json_string_meal_list, true);
    
    $link_favourite_list = API_Link_Enum::$FAVOURITE_TYPE_URL;
    $json_string_favourite_list = file_get_contents($link_favourite_list);    
    $json_favourite_list = json_decode($json_string_favourite_list, true);
    
    
    $data['meal_list']=$json_meal_list["Results"];
    $data['favourite_list']=$json_favourite_list["Results"];    
    
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/
    
    
  /*=================CAROUSEL========================================================================================*/
    $link_carousel_list = API_Link_Enum::$CAROUSEL_URL;
    $json_string_carousel_list = file_get_contents($link_carousel_list);    
    $json_carousel_list = json_decode($json_string_carousel_list, true);
    
    
    $data['carousel_list']=$json_carousel_list["Results"];
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
    $this->load->view('home/content/restaurant_list_content_newest');    
   // $this->load->view('templates/content/append_restaurant_newest_List',$data);
    $this->load->view('home/content/restaurant_list_title_orther');
    $this->load->view('home/content/restaurant_list_content_orther');
  /*========================================END_RESTAURANT_LIST====================================================*/
    
  /*========================================PROMOTION==================================================================*/    
    $link_promotion_list = API_Link_Enum::$PROMOTION_URL."?limit=".RestaurantEnum::LIMIT_PAGE_PROMOTION."&page=1";
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
    
    
    
    $this->load->view('home/content/articles',$data);
/*=================end Danh Sách bài viết hay POST ===============================================================================================================*/
/*===============add post======================================================================*/
   // $this->load->view('templates/content/upload');
/*===============end upload post======================================================================*/
    $this->load->view('home/content/dang_ky_nhan_uu_dai');
    $this->load->view('home/content/footer_content');
    $this->load->view('home/footer/footer_home_page');
    
    
    
    
    
    
    
  }
 
 }