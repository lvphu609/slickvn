
<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Extend_function extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }

    public function auto_login(){
        $result = '';
        $url = base_url();
        if($this->session->userdata('email') != ''){
            $result = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$url.'index.php/index_control/user_logout">Thoát</a>';
        }else{
            $result = '<a href="#" id="link_login">Đăng ký/đăng nhập</a>';
        }
        return $result;
    }
}

