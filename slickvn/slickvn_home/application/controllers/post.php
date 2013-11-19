<?php
//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';
class Post extends CI_Controller{

  
  public function index(){
    /*
    $this->load->model('RestaurantEnum');
    $this->load->helper('url');
    API_Link_Enum::initialize();
    */
    
    //echo'đã nhận được dữ liệu <br>';
      
      $image_represent=$_POST['image_represent'];
      $title=$_POST['title'];
      $address=$_POST['address'];
      $purpose=$_POST['purpose'];
      $average_price=$_POST['average_price'];
      $style=$_POST['style'];
      $content=$_POST['content'];
     // echo $image_represent;
      
    /*$link_orther_res = API_Link_Enum::POST_A_API."?limit=";
            
    $json_string_orther_res = file_get_contents($link_orther_res);    
    $json_orther_res = json_decode($json_string_orther_res, true);
    $data['orther_restaurant']=$json_orther_res["Results"];   */
    
  }
}