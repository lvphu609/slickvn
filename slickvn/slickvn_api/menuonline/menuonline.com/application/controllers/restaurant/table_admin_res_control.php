<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_admin_res_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('restaurant/table_admin_res_model');
    }
    public function index($page = 'table'){
        if( ! file_exists('application/views/restaurant/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $url = base_url();
        $data['url'] = $url;
        $data['control'] = 'table_administrator_restaurant';
        $data['layout'] = 'table_administrator_restaurant';
        $data['title'] = 'Administrator of Restaurant';
        $data['content_title'] = 'Quản lý bàn';
        if($this->session->userdata('email') != ''){
            $data['login'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
            $data['id'] = $this->session->userdata('id');
            $res_id = $this->session->userdata('id');
        }else{
            redirect($data['url'].'index.php/restaurant');
            return FALSE;
        }
        
        $result = $this->table_admin_res_model->get_room_by_id($res_id);
        if($result->hasNext()){
            $data['first'] = 'hide';
            while($result->hasNext()){
                $field = $result->getNext();
                $data['result'][] = $field;
            }
        }else{
            $data['result'] = false;
            $data['first'] = '';
        }
        
        $this->load->view('templates/header_administrator_restaurant', $data);
	$this->load->view('restaurant/'.$page, $data);
        $this->load->view('templates/footer_administrator_restaurant', $data);
        return TRUE;
    }
    
    public function add_room(){        
        $res_id = $this->input->get('res_id');
        $room = $this->input->get('room');
        $table = $this->input->get('table');
        $result = $this->table_admin_res_model->add_room($res_id, $room, $table);
        return TRUE;
    }
    
    public function change_table_status(){
        if($this->session->userdata('email') != ''){
            $res_id = $this->session->userdata('id');
        }else{
            redirect($data['url'].'index.php/restaurant');
            return FALSE;
        }
        
        $room = $this->input->get('room');
        $table = $this->input->get('table');
        $status = $this->input->get('status');
        $this->table_admin_res_model->change_table_status($res_id, $room, $table, $stutus);
        return FALSE;
    }
}
