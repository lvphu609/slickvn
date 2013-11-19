<?php 


class Example_view extends CI_Controller {
  
  public function index(){
    $link = "http://192.168.1.151/slickvn/index.php/restaurant/restaurant_apis/get_post_list/format/json?limit=20&page=1";
    $json_string = file_get_contents($link);    
    $json= json_decode($json_string, true);
    $data['post_list']=$json["Results"];
    
    
    $this->load->view('example_view',$data);
    
    
  }
    
}

?>