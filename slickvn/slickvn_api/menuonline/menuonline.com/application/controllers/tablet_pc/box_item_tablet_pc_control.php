<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Box_item_tablet_pc_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('tablet_pc/tablet_pc_model');
    }
    
    public function index($page = 'box_item'){
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
        $data['btn_view_sort'] = '';
        
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
                <img src="'.$url.'includes/img/goi_mon_black1.png">
                <div class="left_menu_content">
                    <div>Gọi món</div>
                    <div>Thưởng thức món ngon ngay nào...</div>
                </div>               
            </div>
            <div class="box_info">
                <div class="box_info_title">Giỏ hàng bàn 10</div>
                <div class="box_info_content">
                    <table border="0" width="100%">
                        <tr>
                            <td align="right"><b>Đã gọi:</b></td>
                            <td align="center"><span class="total_item">0</span> món</td>
                        </tr>
                        <tr>
                            <td align="right"><b>Tổng tiền:</b></td>
                            <td align="right"><span class="total_price">0</span></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Khuyến mãi:</b></td>
                            <td align="right"><span class="total_sale">0</span></td>
                        </tr>
                        <tr>
                            <td align="right"><b>Thành tiền:</b></td>
                            <td align="right"><span class="pay money">0</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">                                
                                <br>
                                <i>Cảm ơn quý khách!</i>
                                <br>
                                <button type="button" class="btn btn-warning btn-mini btn_select"><span class="icon icon-fire"></span> Gọi món</button>
                            </td>
                        </tr>
                    </table> 
                </div>
            </div>
        ';
        
        //lay thong tin nha hang
        $result = $this->tablet_pc_model->get_res_info($res_id);
        if($result == NULL){
            show_error('Restaurant id can not find!');
        }
        $data['res_name'] = $result['restaurant_name'];
       
        $data['search'] = '';
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
            $result = $this->tablet_pc_model->get_by_id($list_food_id);
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
        
        
        $this->load->view('templates/header_tablet_pc', $data);
	$this->load->view('tablet_pc/'.$page, $data);
        $this->load->view('templates/footer_tablet_pc', $data);
        return TRUE;
    }
}