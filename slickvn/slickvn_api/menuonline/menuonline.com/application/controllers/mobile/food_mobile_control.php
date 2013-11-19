<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Food_mobile_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('mobile/mobile_model');
    }
    
    public function index($page = 'food'){
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
        $data['title'] = 'Thức ăn';
        $data['res_id'] = $res_id;
        $data['table_number'] = $table_number;
        
        $n = 0;
        $total = 0;
        if($this->session->userdata('item')){
            $list_item = $this->session->userdata('item');
                foreach($list_item as $item){
                if($item['table'] == $table_number){
                    $n += $item['count'];
                    $total += $item['price'];
                }           
            }
        }       
        $data['item_number'] = $n;
        $data['total_price'] = $total;
        
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
                    <td><a href="'.$url.'index.php/mobile/drink_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=drink&kind=all&hot=all">Tất cả</a></td>
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
        
        //lay danh sach cac mon an trong menu
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
        $search = '';
        $data['search'] = $search;
        $result = $this->mobile_model->get_food($res_id, $type, $kind, $hot, $search);
        if($result->hasNext()){
            $data['food'] = '';
            while($result->hasNext()){
                $field = $result->getNext();
                if($field['food_sale'] != ''){
                    $sale = '<div>-'.$field['food_sale'].'</div>';
                    $star = '
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                    ';
                }else if($field['food_status'] == 2){
                    $sale = '<div>Hot</div>';
                    $star = '
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                    ';
                }else{
                    $sale = '';
                    $star = '
                        <span class="icon icon-white icon-star"></span>
                        <span class="icon icon-white icon-star"></span>
                    ';
                }
                $data['food'] .= '
                    <tr>
                        <td valign="middle" align="right" width="60px">
                            <div class="img_view">
                                <img src="'.$url.'images/'.$res_id.'/'.$field['food_image'].'">
                                '.$sale.'
                            </div>           
                        </td>
                        <td>      
                            <div class="item">               
                                <div>
                                    <div>'.$field['food_name'].'</div>
                                    <div>'.$field['food_note'].'</div>
                                    <div>
                                        Giá: <span class="money">'.$field['food_price'].'</span><br>
                                        '.$star.'
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-mini btn-warning btn_select" data-id="'.$field['_id'].'" data-price="'.$field['food_price'].'" data-sale="'.$field['food_sale'].'">Chọn</button>
                                    </div>
                                </div>
                                <div id="curr_'.$field['_id'].'" class="curr_count" data-id="'.$field['_id'].'" data-name="'.$field['food_name'].'" data-image="'.$field['food_image'].'"></div>
                            </div>
                        </td>
                    </tr>
                ';
            }
        }else{
            $data['food'] = '
                <tr>
                    <td align="center"><p class="text-error text-left">Không món nào!</p></td>
                </tr>
            ';
        }
        
        
        $this->load->view('templates/header_mobile', $data);
	$this->load->view('mobile/'.$page, $data);
        $this->load->view('templates/footer_mobile', $data);
        return TRUE;
    }
}