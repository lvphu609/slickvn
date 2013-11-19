<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Box_mobile_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('mobile/mobile_model');
    }
    
    public function index($page = 'box_item'){
        if( ! file_exists('application/views/mobile/'.$page.'.php')){
            show_404();
	}       
        
        if($this->input->get('res_id')){
            $res_id = $this->input->get('res_id');
        }else{
            show_error('Restaurant id can not find!');
        }
        if($this->input->get('table')){
            $table_number = $this->input->get('table');
        }else{
            show_error('Table number can not find!');
        }
        $url = base_url();
        $data = array();
        $data['url'] = $url;
        $data['title'] = 'Giỏ hàng';
        $data['res_id'] = $res_id;
        $data['table_number'] = $table_number;
           
        $result = $this->mobile_model->get_res_info($res_id);
        if($result == NULL){
            show_error('Restaurant id can not find!');
        }
        $data['res_name'] = $result['restaurant_name'];
        
        $data['food_kind'] = '
            <table class="table table-hover">
                <tr>
                    <td><a href="'.$url.'index.php/mobile/food_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind=all&hot=all">Tất cả</a></td>
                </tr>
        ';
        $data['drink_kind'] = '
            <table class="table table-hover">
                <tr>
                    <td><a href="'.$url.'index.php/mobile/food_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=drink&kind=all&hot=all">Tất cả</a></td>
                </tr>
        ';
        $result = $this->mobile_model->get_food_kind($res_id);
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                if($field['kind_type'] == 'food'){
                    $data['food_kind'] .= '
                        <tr>
                            <td><a href="'.$url.'index.php/mobile/food_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=food&kind='.$field['kind_name'].'&hot=all">'.$field['kind_name'].'</a></td>
                        </tr>
                    ';
                }else{
                    $data['drink_kind'] .= '
                        <tr>
                            <td><a href="'.$url.'index.php/mobile/drink_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=drink&kind='.$field['kind_name'].'&hot=all">'.$field['kind_name'].'</a></td>
                        </tr>
                    ';
                }
            }
            $data['food_kind'] .= '</table>';
            $data['drink_kind'] .= '</table>';
        }else{
            $data['food_kind'] = '<p class="text-error text-left">None</p>';
            $data['drink_kind'] = '<p class="text-error text-left">None</p>';
        }
        $search = '';
        $data['search'] = $search;
        
        //get box item value
        $list_food_id = array();
        $item_count = array();
        if($this->input->cookie('item')){
            $list_item = $this->input->cookie('item');
            $list_item = json_decode($list_item, true);
            foreach($list_item as $item){
                if($item['table'] == $table_number){
                    $list_food_id[] = new MongoId($item['id']);
                    $item_count[$item['id']] = $item['count'];
                }           
            }
        }
        if($list_food_id){
            $result = $this->mobile_model->get_by_id($list_food_id);
            if($result->hasNext()){
                while($result->hasNext()){
                    $field = $result->getNext();
                    $data['result'][] = $field;
                }
                $data['item_count'] = $item_count;
            }else{
                $data['result'] = false;
            }
        }else{
            $data['result'] = false;
        }
        
        
        $this->load->view('templates/header_mobile', $data);
	$this->load->view('mobile/'.$page, $data);
        $this->load->view('templates/footer_mobile', $data);
        return TRUE;
    }
    
}