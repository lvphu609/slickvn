<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index_tablet_pc_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('tablet_pc/tablet_pc_model');
    }
    
    public function index($page = 'index'){
        if( ! file_exists('application/views/tablet_pc/'.$page.'.php')){
            show_404();
	}
        /*if($this->input->get('res_id')){
            $res_id = $this->input->get('res_id');
        }else{
            show_error('Restaurant id can not find!');
        }*/
        $res_id = '51c3c74c6b2bf51008000000';
        if($this->input->get('table')){
            $table_number = $this->input->get('table');
        }else{
            show_error('Table number can not find!');
        }
        $url = base_url();
        $data = array();
        $data['url'] = $url;
        $data['title'] = 'Hot';
        $data['res_id'] = $res_id;
        $data['table_number'] = $table_number;
        $data['btn_view_sort'] = '<img src="'.$url.'includes/img/sort.png" id="btn_view_sort">';
        
        //tao menu left
        $data['left_menu'] = '
            <div class="left_menu left_menu_active" data-url="'.$url.'index.php/tablet_pc/index_tablet_pc_control?res_id='.$res_id.'&table='.$table_number.'&type=all&kind=all&hot=all&search=">
                <div class="left_menu_callout"></div>
                <img src="'.$url.'includes/img/home.png">
                <div class="left_menu_content">
                    <div>Menu Online</div>
                    <div>Món ngon thật dễ dàng...</div>
                </div>               
            </div>
            <div class="left_menu" data-url="'.$url.'index.php/tablet_pc/sale_tablet_pc_control?res_id='.$res_id.'&table='.$table_number.'&type=all&kind=all&hot=2&search=">
                <img src="'.$url.'includes/img/hot_black.png">
                <div class="left_menu_content">
                    <div>Khuyến mãi</div>
                    <div>Nhiều món ngon hơn với giá rẻ bất ngờ...</div>
                </div>               
            </div>
            <div class="left_menu" data-url="'.$url.'index.php/tablet_pc/food_tablet_pc_control?table='.$table_number.'&type=food&kind=all&hot=all&search=">
                <img src="'.$url.'includes/img/food_black.png">
                <div class="left_menu_content">
                    <div>Thức ăn</div>
                    <div>Nhiều món ngon và hấp dẫn hơn...</div>
                </div>
            </div>
            <div class="left_menu" data-url="'.$url.'index.php/tablet_pc/drink_tablet_pc_control?table='.$table_number.'&type=drink&kind=all&hot=all&search=">
                <img src="'.$url.'includes/img/drink_black.png">
                <div class="left_menu_content">
                    <div>Thức uống</div>
                    <div>Các loại thức uống bổ dưỡng, hấp dẫn...</div>
                </div>
            </div>
        ';
        
        //lay thong tin nha hang
        $result = $this->tablet_pc_model->get_res_info($res_id);
        if($result == NULL){
            show_error('Restaurant id can not find!');
        }
        $data['res_name'] = $result['restaurant_name'];
        
        //lay thong tin phan loai san pham
        $data['food_kind'] = '
            <table class="table table-hover">
                <tr>
                    <td><a href="'.$url.'index.php/tablet_pc/index_tablet_pc_control?res_id='.$res_id.'&table='.$table_number.'&type=all&kind=all&hot=all&search=">Tất cả</a></td>
                </tr>
        ';
        $result = $this->tablet_pc_model->get_food_kind($res_id);
        if($result->hasNext()){          
            while($result->hasNext()){
                $field = $result->getNext();
                $data['food_kind'] .= '
                    <tr>
                        <td><a href="'.$url.'index.php/tablet_pc/index_tablet_pc_control?res_id='.$res_id.'&table='.$table_number.'&type='.$field['kind_type'].'&kind='.$field['kind_name'].'&hot=all&search=">'.$field['kind_name'].'</a></td>
                    </tr>
                ';                
            }
            $data['food_kind'] .= '</table>';
        }else{
            $data['food_kind'] = '<p class="text-error text-left">None</p>';
        }
        
        //Lay thong tin cac mon an 
        if($this->input->get('type')){
            $type = $this->input->get('type');
        }else{
            show_error('Food type can not find!');
        }
        if($this->input->get('kind')){
            $kind = $this->input->get('kind');
        }else{
            show_error('An error in iuput data!');
        }
        if($this->input->get('hot')){
            $hot = $this->input->get('hot');
        }else{
            show_error('An error in iuput data!');
        }
        if($this->input->get('search')){
            $search = $this->input->get('search');
        }else{
            $search = '';
        }
        $data['search'] = $search;
        $result = $this->tablet_pc_model->get_food($res_id, $type, $kind, $hot, $search);
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();               
                $data['result'][] = $field;
            }
        }else{
            $data['result'] = false;
        }
        
        
        $this->load->view('templates/header_tablet_pc', $data);
	$this->load->view('tablet_pc/'.$page, $data);
        $this->load->view('templates/footer_tablet_pc', $data);
        return TRUE;
    }
}