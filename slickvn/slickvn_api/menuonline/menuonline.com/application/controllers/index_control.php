<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('index_model');
    }
    public function index($page = 'index'){
        if( ! file_exists('application/views/pages/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $data['url'] = base_url();
        $data['title'] = 'Welcome to MenuOnline';
        if($this->session->userdata('email') != ''){
            $data['user_name'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
        }else{
            $data['user_name'] = '<a href="#" id="link_login">Đăng ký/đăng nhập</a>';
        }
        
        $result = $this->index_model->get_banner();
        $banner = $result->getNext();
        $data['banner'] = $banner['image_url'];
        $this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        return TRUE;
    }
    public function user_login(){
        $email = $this->input->get('email');
        $pass = $this->input->get('pass');
        $save = $this->input->get('save');
        $result = $this->index_model->check_user($email, $pass);
        $session_value = array();
        if($result->hasNext()){
            $field = $result->getNext();            
            $session_value['email'] = $field['restaurant_email'];
            $session_value['password'] = $field['restaurant_pass'];
            $session_value['name'] = $field['restaurant_name'];
            $session_value['id'] = $field['_id'];
            $session_value['type'] = 'restaurant';
            $this->session->set_userdata($session_value);
            if($save == 'true'){
                set_cookie('email', $email);
                set_cookie('password', $pass);
            }
            echo $field['restaurant_name'];
        }else{
            $session_value['email'] = '';
            $session_value['password'] = '';
            $session_value['name'] = '';
            $session_value['id'] = '';
            $session_value['type'] = '';
            $this->session->set_userdata($session_value);
            echo 'false';
        }
        return TRUE;
    }
    public function user_logout(){
        $session_value['email'] = '';
        $session_value['password'] = '';
        $session_value['name'] = '';
        $session_value['id'] = '';
        $session_value['type'] = '';
        $this->session->set_userdata($session_value);
        $this->index();
        return TRUE;
    }
}
