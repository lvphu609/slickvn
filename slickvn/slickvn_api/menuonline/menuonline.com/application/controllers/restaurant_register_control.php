<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/recaptchalib.php');   
class Restaurant_register_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('restaurant_register_model');        
    }
    public function index($page = 'restaurant_register'){       
        if( ! file_exists('application/views/pages/'.$page.'.php')){
            show_404();
	}                      
        $data = array(
            'restaurant_name' => '',
            'restaurant_address' => '',
            'restaurant_province' => 'none',
            'restaurant_owner' => '',
            'restaurant_email' => '',
            'restaurant_phone' => '',
            'restaurant_note' => '',
            'error_code' => '',
            'hid_submit' => 'false'
        );
        $data['url'] = base_url();
        if($this->session->userdata('email') != ''){
            $data['user_name'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
        }else{
            $data['user_name'] = '<a href="#" id="link_login">Đăng ký/đăng nhập</a>';
        }
        $data['title'] = 'Kết nối nhà hàng bạn vào MenuOnline';
        $data['url'] = base_url();           
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);            
    }
    
    public function restaurant_register($page = 'restaurant_register'){       
        if( ! file_exists('application/views/pages/'.$page.'.php')){
            show_404();
	}
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_restaurant_name', 'txt_name', 'required');        
        if($this->form_validation->run() === FALSE){            
            $this->index();
        }else{
            $publickey = "6Lcx1eISAAAAAGPTgu-0tdvgWo0WeA5iS9574Dcc";
            $privatekey = "6Lcx1eISAAAAALY5Q7asfiEraMsZtf3dHmcvZrpk";
            $resp = null;
            $error = null;
            $data_post = array(
                'restaurant_name' => $this->input->post('txt_restaurant_name'),
                'restaurant_province' => $this->input->post('cbo_restaurant_province'),
                'restaurant_address' => $this->input->post('txt_restaurant_address'),
                'restaurant_owner' => $this->input->post('txt_restaurant_owner'),
                'restaurant_email' => $this->input->post('txt_restaurant_email'),
                'restaurant_pass' => $this->input->post('hid_response'),
                'restaurant_phone' => $this->input->post('txt_restaurant_phone'),
                'restaurant_note' => $this->input->post('txt_restaurant_note')
            );
            $recaptcha_challenge_field = $this->input->post('hid_challenge');
            $recaptcha_response_field = $this->input->post('hid_response');
            $resp = recaptcha_check_answer ($privatekey,
                                            $_SERVER["REMOTE_ADDR"],
                                            $recaptcha_challenge_field,
                                            $recaptcha_response_field);

            if ($resp->is_valid) {
                $this->restaurant_register_model->restaurant_register($data_post);
                $this->restaurant_register_complete();
            } else {
                $data = array();
                if($this->session->userdata('email') != ''){
                    $data['user_name'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
                }else{
                    $data['user_name'] = '<a href="#" id="link_login">Đăng ký/đăng nhập</a>';
                }
                $data = $data_post;
                $data['title'] = 'Kết nối nhà hàng bạn vào MenuOnline';
                $data['url'] = base_url();
                $data['error_code'] = '<img src="'.$data['url'].'/images/false.png"> Mã xác nhận không hợp lệ!';
                $data['hid_submit'] = 'true';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer', $data);
            }
            
        }
               
    }

    public function restaurant_register_complete($page = 'restaurant_register_complete'){
        if( ! file_exists('application/views/pages/'.$page.'.php')){
            show_404();
	}
        
        $data = array();
        if($this->session->userdata('email') != ''){
            $data['user_name'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
        }else{
            $data['user_name'] = '<a href="#" id="link_login">Đăng ký/đăng nhập</a>';
        }
        $data['title'] = 'Kết nối nhà hàng bạn vào MenuOnline';
        $data['url'] = base_url();
        $this->load->view('templates/header', $data);
	$this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
