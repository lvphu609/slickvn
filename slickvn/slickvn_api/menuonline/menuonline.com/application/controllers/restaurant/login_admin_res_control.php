<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_res_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index($page = 'login'){
        if( ! file_exists('application/views/restaurant/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $url = base_url();
        $data['url'] = $url;
        $data['title'] = 'Administrator of Restaurant';
        if($this->session->userdata('email') != ''){
            redirect($data['url'].'index.php/restaurant/menu_admin_res_control');
            return FALSE;
        }       
	$this->load->view('restaurant/'.$page, $data);
        return TRUE;
    }
}
