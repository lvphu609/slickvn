<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//include model/API_Link_Enum
require APPPATH.'/models/API_Link_Enum.php';

class Admin_controller extends CI_Controller {
   public function __construct() {
    parent::__construct();
   // $this->load->model('function_modeler');
  }
/*========================TRANG CHINH=================================================================*/
  public function index()
  {

    $data['chosed']="main_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/main_page/main_page');
    $this->load->view('admin/footer/footer_main');
    
  }
  
/*========================TRANG THÀNH VIÊN=================================================================*/  
  public function member_page()
  {

    $data['chosed']="member_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/member_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  }
    //trang thêm thành viên mới
 public function create_new_member()
  {
   
    $data['chosed']="member_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/member_page/create_new_member');
    $this->load->view('admin/footer/footer_main');
    
  }  
  
   //thêm thành viên thành công
  public function create_new_member_success()
  {
   
    $data['chosed']="member_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/member_page/create_new_member_success');
    $this->load->view('admin/footer/footer_main');
    
  } 
  
  
  
/*========================TRANG NGƯỜI DÙNG=================================================================*/  
  public function user_page()
  {

    $data['chosed']="user_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    //$this->load->view('admin/content/main_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  }
  
/*========================TRANG NHÀ HÀNG=================================================================*/  
  public function restaurant_page()
  {

    $data['chosed']="restaurant_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/restaurant_page/restaurant_page');
    $this->load->view('admin/footer/footer_main');
    
  }  
  
    //trang thêm nhà hàng mới
 public function create_new_restaurant()
  {
   
    $data['chosed']="restaurant_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    $this->load->view('admin/content/restaurant_page/create_new_restaurant');
    $this->load->view('admin/footer/footer_main');
    
  }  
  
/*========================TRANG KHUYẾN MÃI=================================================================*/  
  public function coupon_page()
  {

    $data['chosed']="coupon_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    //$this->load->view('admin/content/main_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  }  
/*========================TRANG BÀI VIẾT=================================================================*/  
  public function post_page()
  {

    $data['chosed']="post_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    //$this->load->view('admin/content/main_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  } 
/*========================TRANG TÙY CHỈNH=================================================================*/  
  public function custom_page()
  {

    $data['chosed']="custom_page";
    $this->load->helper('url');
    $this->load->view('admin/header/header_main',$data);
    $this->load->view('admin/taskbar_top/taskbar_top');
    $this->load->view('admin/menu/menu_main',$data);
    //$this->load->view('admin/content/main_page/member_page');
    $this->load->view('admin/footer/footer_main');
    
  } 
  
}