<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_administrator_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('administrator/banner_administrator_model');
    }
    public function index($page = 'index'){
        if( ! file_exists('application/views/administrator/'.$page.'.php')){
            show_404();
	}
        $this->load->library('form_validation');
        $data = array();
        $url = base_url();
        $data['url'] = $url;
        $data['title'] = 'Administrator of MenuOnline';
        $data['content_title'] = 'Thiết lập Banner';

        $this->form_validation->set_rules('hid_upload', 'File upload', 'required');
        if($this->form_validation->run() === FALSE){
            $upload_error = '';
        }else{
            $config = array();
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '2048';
            $config['max_width']  = '1000';
            $config['max_height']  = '300';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file_upload'))
            {
                $upload_error = $this->upload->display_errors();
            }
            else
            {
                $arr = $this->upload->data();
                $file_name = $arr['file_name'];
                $this->banner_administrator_model->upload($file_name);
                $upload_error = '';
            }
        }
        $data['upload_error'] = $upload_error;
        $result = $this->banner_administrator_model->get_all();
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                $data['result'][] = $field;
            }
        }else{
            $data['result'] = false;
        }
        $this->load->view('templates/header_administrator', $data);
	$this->load->view('administrator/'.$page, $data);
        $this->load->view('templates/footer_administrator', $data);
    }
    
    public function banner_default(){
        $id = $this->input->get('id');
        $this->banner_administrator_model->set_default($id);
    }
    public function banner_delete(){
        $id = $this->input->get('id');
        $image_name = $this->input->get('image_name');
        $file = './images/'.$image_name;
        unlink($file);
        $this->banner_administrator_model->delete($id);
    }
}
