<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Top_food_administrator_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index($page = 'top_food'){
        if( ! file_exists('application/views/administrator/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $data['url'] = base_url();
        $data['title'] = 'Administrator of MenuOnline';
        $data['content_title'] = 'Thiết lập Top món ăn';
        $this->load->view('templates/header_administrator', $data);
	$this->load->view('administrator/'.$page, $data);
        $this->load->view('templates/footer_administrator', $data);
    }
}
