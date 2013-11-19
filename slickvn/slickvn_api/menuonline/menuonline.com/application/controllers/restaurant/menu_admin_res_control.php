<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_admin_res_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('restaurant/menu_admin_res_model');
    }
    public function index($page = 'menu'){
        if( ! file_exists('application/views/restaurant/'.$page.'.php')){
            show_404();
	}
        $this->load->library('form_validation');
        $data = array();
        $url = base_url();
        $data['url'] = $url;
        $data['control'] = 'layout_administrator_restaurant';
        $data['layout'] = 'layout_administrator_restaurant';
        $data['title'] = 'Administrator of Restaurant';
        $data['content_title'] = 'Thiết lập Menu';
        if($this->session->userdata('email') != ''){
            $data['login'] = 'Xin chào, '.$this->session->userdata('name').'! | <a href="'.$data['url'].'index.php/index_control/user_logout">Thoát</a>';
            $data['id'] = $this->session->userdata('id');
        }else{
            redirect($data['url'].'index.php/restaurant');
            return FALSE;
        }
        
        $this->form_validation->set_rules('hid_restaurant_id', 'restaurant id', 'required');
        if($this->form_validation->run() === FALSE){
            $upload_error = '';
        }else{
            $res_id = $this->input->post('hid_restaurant_id');
            $config = array();
            $config['upload_path'] = './images/'.$res_id.'/';
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
                $file = array();
                $arr = $this->upload->data();
                $file['name'] = $arr['file_name'];
                $file['owner'] = $data['id'];
                $this->menu_admin_res_model->upload($file);
                $upload_error = '';
            }
        }
        $data['upload_error'] = $upload_error;
        $res_id = (string)$data['id'];        
        $result = $this->menu_admin_res_model->get_all($res_id);
        $data['type'] = $result['type'];
        $data['page'] = $result['page'];
        $data['sum'] = $result['sum'];
        $data['limit'] = $result['limit'];
        if($result['doc']->hasNext()){
            while($result['doc']->hasNext()){
                $field = $result['doc']->getNext();               
                $data['result'][] = $field;
            }
        }else{
            $data['result'] = false;
        }
        
        $food = array(
            'kind_owner' => $res_id,
            'kind_type' => 'food'
        );
        $result = $this->menu_admin_res_model->get_food_kind($food);
        if($result->hasNext()){
            $data['cbo_food'] = '<select id="cbo_food" name="cbo_food" class="input-large">';
            while($result->hasNext()){
                $field = $result->getNext();               
                $data['cbo_food'] .= '
                    <option value="'.$field['kind_name'].'">'.$field['kind_name'].'</option>
                ';
            }
            $data['cbo_food'] .= '</select>';             
        }else{
            $data['cbo_food'] = '<p class="text-error text-left">Không có phân loại nào!</p>';
        }
        $drink = array(
            'kind_owner' => $res_id,
            'kind_type' => 'drink'
        );
        $result = $this->menu_admin_res_model->get_food_kind($drink);
        if($result->hasNext()){
            $data['cbo_drink'] = '<select id="cbo_drink" name="cbo_drink" class="input-large">';
            while($result->hasNext()){
                $field = $result->getNext();               
                $data['cbo_drink'] .= '
                    <option value="'.$field['kind_name'].'">'.$field['kind_name'].'</option>
                ';
            }
            $data['cbo_drink'] .= '</select>';             
        }else{
            $data['cbo_drink'] = '<p class="text-error text-left">Không có phân loại nào!</p>';
        }
        
        $this->load->view('templates/header_administrator_restaurant', $data);
	$this->load->view('restaurant/'.$page, $data);
        $this->load->view('templates/footer_administrator_restaurant', $data);
        return TRUE;
    }
    
    public function add_food_kind(){
        $new_kind = array(
            'kind_name' => $this->input->get('value'),
            'kind_owner' => $this->input->get('id'),
            'kind_type' => $this->input->get('type')
        );
        
        $insert = $this->menu_admin_res_model->add_food_kind($new_kind);
        if($insert === TRUE){
            $result = $this->menu_admin_res_model->get_food_kind($new_kind);
            if($result->hasNext()){
                if($new_kind['kind_type'] == 'food'){
                    echo '<select id="cbo_food" name="cbo_food" class="input-large">';
                    while($result->hasNext()){
                        $field = $result->getNext();               
                        echo '
                            <option value="'.$field['kind_name'].'">'.$field['kind_name'].'</option>
                        ';
                    }
                    echo '</select>';
                }else{
                    echo '<select id="cbo_drink" name="cbo_drink" class="input-large">';
                    while($result->hasNext()){
                        $field = $result->getNext();               
                        echo '
                            <option value="'.$field['kind_name'].'">'.$field['kind_name'].'</option>
                        ';
                    }
                    echo '</select>';
                }                
            }
        }else{
            echo 'false';
        }
    }

    public function load_edit_value(){
        if($this->session->userdata('email') != ''){
            $res_id = $this->session->userdata('id');
        }else{
            redirect(base_url().'index.php/restaurant');
            return FALSE;
        }

        $res_id = (string)$res_id;
        $id = $this->input->get('id');
        $type = $this->input->get('type');
        $kind = $this->input->get('kind');
        
        $dk = array(
            'kind_owner' => $res_id,
            'kind_type' => $type
        );
        $result = $this->menu_admin_res_model->get_food_kind($dk);
        if($result->hasNext()){
            $cbo_type = '<select id="cbo_kind" name="cbo_'.$type.'" class="input-large">';
            while($result->hasNext()){
                $field = $result->getNext();
                if($field['kind_name'] == $kind){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                $cbo_type .= '
                    <option value="'.$field['kind_name'].'" '.$selected.'>'.$field['kind_name'].'</option>
                ';
            }
            $cbo_type .= '</select>';             
        }else{
            $cbo_type = 'underfined';
        }
        
        $image = array();
        $result = $this->menu_admin_res_model->get_food_image($res_id);
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                $field_id = (string)$field['_id'];
                $image[$field_id] = $field['image_url'];
            }
        }else{
            $image['error'] = 'No result image';
        }
        
        $result = $this->menu_admin_res_model->get_by_id($id);   
        if($result->hasNext()){
            echo '<form class="form-horizontal">';
            $field = $result->getNext();               
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_name"><b>Tên món</b></label>
                    <div class="controls">
                        <input type="text" id="txt_edit_food_name" value="'.$field['food_name'].'">
                    </div>
                </div>
            ';
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_name"><b>Phân loại</b></label>
                    <div class="controls">'.
                        $cbo_type
                    .'</div>
                </div>
            ';
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_price"><b>Giá</b></label>
                    <div class="controls">
                        <input type="text" id="txt_edit_food_price" value="'.$field['food_price'].'">
                    </div>
                </div>
            ';
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_sale"><b>Khuyến mãi</b></label>
                    <div class="controls">
                        <div class="input-append">
                            <input type="text" id="txt_edit_food_sale" class="text-center text-warning input-mini" value="'.$field['food_sale'].'">
                            <span class="add-on">%</span>
                        </div>
                    </div>
                </div>
            ';
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_note"><b>Ghi chú</b></label>
                    <div class="controls">
                        <input type="text" id="txt_edit_food_note" value="'.$field['food_note'].'">
                    </div>
                </div>
            ';
            if($field['food_status'] == 2){
                $checked = 'checked="checked"';
            }else{
                $checked = '';
            }
            echo '
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input type="checkbox" '.$checked.' id="chk_edit_food_hot"> Món Hot
                        </label>
                    </div>
                </div>
            ';
            echo '
                <div class="control-group">
                    <label class="control-label" for="txt_edit_food_note"><b>Hình ảnh</b></label>
                    <div class="controls">
                        <img src="'.base_url().'images/'.$res_id.'/'.$field['food_image'].'" class="img_view" id="img_edit_food_view" data-image="'.$field['food_image'].'">
                        <button type="button" class="btn btn-warning btn-mini" id="btn_edit_food_change_image">Thay đổi</button>
                    </div>
                </div>
            ';
            echo '</form>';
            echo '<div class="text-center text-error" id="lbl_edit_food_error"></div>';
            echo '<input type="hidden" id="hid_edit_food_id" value="'.$id.'">';
            echo '<div id="box_food_image">';
            echo '
                <form method="post" enctype="multipart/form-data" action="" id="frm_edit_food_upload_image">
                    <b>Thêm mới:</b> <input type="file" id="file_edit_food_new_image" name="file_edit_food_new_image">
                    <button type="submit" class="btn btn-warning btn-mini" id="btn_edit_food_upload">Thêm</button>
                    <img src="'.base_url().'images/loading.gif" id="img_edit_food_add_image_loading" width="20px" height="30px">
                    <br>
                </form>
                <div id="box_edit_food_image">
            ';
            foreach($image as $food_image){
                echo '<img src="'.base_url().'images/'.$res_id.'/'.$food_image.'" data-food_image="'.$food_image.'">';
            }
           echo '</div></div>';
            
        }
    }
    
    public function update_food(){
        if($this->session->userdata('email') != ''){
            $res_id = $this->session->userdata('id');
        }else{
            redirect(base_url().'index.php/restaurant');
            return FALSE;
        }
        
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $value = array(
            'food_name' => $this->input->get('name'),
            'food_kind' => $this->input->get('kind'),
            'food_price' => $this->input->get('price'),
            'food_sale' => $this->input->get('sale'),
            'food_note' => $this->input->get('note'),
            'food_status' => $this->input->get('status'),
            'food_image' => $this->input->get('image'),
            'food_update_date' => $mongo_date
        );
        $food_id = $this->input->get('id');
        $result = $this->menu_admin_res_model->update_food($food_id, $value);
        echo $result;
    }
    
    public function get_image(){
        if($this->session->userdata('email') != ''){
            $res_id = $this->session->userdata('id');
        }else{
            redirect(base_url().'index.php/restaurant');
            return FALSE;
        }
        $result = $this->menu_admin_res_model->get_food_image($res_id);
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                echo '<img src="'.base_url().'images/'.$res_id.'/'.$field['image_url'].'" data-food_image="'.$field['image_url'].'">';
            }
        }else{
            echo 'No result image';
        }
    }

    public function add_image(){
        if($this->session->userdata('email') != ''){
            $res_id = $this->session->userdata('id');
        }else{
            redirect(base_url().'index.php/restaurant');
            return FALSE;
        }
        
        $config = array();
        $config['upload_path'] = './images/'.$res_id.'/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '2048';
        $config['max_width']  = '1000';
        $config['max_height']  = '300';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_edit_food_new_image'))
        {
            $upload_error = $this->upload->display_errors();
        }
        else
        {
            $file = array();
            $arr = $this->upload->data();
            $file['name'] = $arr['file_name'];
            $file['owner'] = $res_id;
            $this->menu_admin_res_model->add_new_image($file);
            $upload_error = '';
        }
        echo json_encode(array('status' => true, 'msg' => 'complete'));
    }
}
