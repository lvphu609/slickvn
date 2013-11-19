<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_administrator_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index($page = 'user'){
        if( ! file_exists('application/views/administrator/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $data['url'] = base_url();
        $data['title'] = 'Administrator of MenuOnline';
        $data['content_title'] = 'Quản lý người dùng';
        $this->load->view('templates/header_administrator', $data);
	$this->load->view('administrator/'.$page, $data);
        $this->load->view('templates/footer_administrator', $data);
    }
}
