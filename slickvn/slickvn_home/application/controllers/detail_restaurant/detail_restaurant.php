<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';

class Detail_restaurant extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
    
    
  }

  public function index()
  {
    
    $this->load->model('RestaurantEnum');
    $this->load->helper('url');
    $this->load->view('detail_restaurant/header/header');
    API_Link_Enum::initialize();
    
    $id_restaurant=$_GET['id_restaurant'];
    $link_detail_restaurant = API_Link_Enum::$DETAIL_RESTAURANT_URL."?id=$id_restaurant";
    $json_string_detail_restaurant= file_get_contents($link_detail_restaurant);    
    $json_detail_restaurant = json_decode($json_string_detail_restaurant, true);
    $data['info_restaurant']=$json_detail_restaurant["Results"];
    
    //var_dump($data['info_restaurant']);
    
    
    
    
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
    //var_dump($data['favourite_list']);
    $this->load->view('home/menu/menu',$data);
  /*================END_MENU============================================================================*/    
  
 /*==================LOCATION_PAGE======================================================================================*/
     
     $this->load->view('detail_restaurant/content/location_page',$data);
 /*=================END_LOCATION_PAGE=======================================================================================*/ 
 
 /*=================CAROUSEL=======================================================================================*/ 
     $data['link_restaurant_frofile']=  API_Link_Enum::$BASE_PROFILE_RESTAURANT_URL;
     $this->load->view('detail_restaurant/content/carousel',$data);
    
  /*================END_CAROUSEL========================================================================================*/
 /*=================TABS=======================================================================================*/ 
     
     $this->load->view('detail_restaurant/content/tabs',$data);
    
  /*================END_TABS========================================================================================*/
    
  
    
   $this->load->view('home/content/footer_content'); 
   $this->load->view('detail_restaurant/footer/footer');
   
    
  }
}
