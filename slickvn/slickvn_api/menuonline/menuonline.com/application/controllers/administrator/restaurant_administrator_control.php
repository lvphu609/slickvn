<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant_administrator_control extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('administrator/restaurant_administrator_model');
    }
    public function index($page = 'restaurant'){
        if( ! file_exists('application/views/administrator/'.$page.'.php')){
            show_404();
	}
        $data = array();
        $data['url'] = base_url();
        $data['title'] = 'Administrator of MenuOnline';
        $data['content_title'] = 'Quản lý nhà hàng';
        
        $result = $this->restaurant_administrator_model->get_new();
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                $data['result_new'][] = $field;
            }
        }else{
            $data['result_new'] = false;
        }
        $result = $this->restaurant_administrator_model->get_old();
        if($result->hasNext()){
            while($result->hasNext()){
                $field = $result->getNext();
                $data['result_old'][] = $field;
            }
        }else{
            $data['result_old'] = false;
        }
        
        $this->load->view('templates/header_administrator', $data);
	$this->load->view('administrator/'.$page, $data);
        $this->load->view('templates/footer_administrator', $data);
    }
    
    public function commit(){
        $this->restaurant_administrator_model->commit();
        $this->index();
    }
    
    public function list_restaurant_old(){
        $result = $this->restaurant_administrator_model->get_old();
        if($result->hasNext()){
            echo '
                <table border="0" cellpadding="0" cellspacing="0" width="820px" align="center">
                    <thead>
                        <tr valign="midle" height="30px" align="center">
                            <td width="40">STT</td>
                            <td width="250">Tên nhà hàng</td>
                            <td width="450">Địa chỉ</td>
                            <td width="60"></td>
                        </tr>
                    </thead>
                    <tbody>
            ';
            $n = 0;
            while($result->hasNext()){
                $field = $result->getNext();
                $n++;                
                echo '
                    <tr id="'.$field['_id'].'">
                        <td align="center"><b>'.$n.'</b></td>
                        <td>'.$field['restaurant_name'].'</td>
                        <td>'.$field['restaurant_address'].'</td>
                        <td>
                            <div class="control" data-name="'.$field['restaurant_name'].'">
                                <span class="ui-icon ui-icon-comment" title="Xem thông tin" data-action="btn_view" data-id="'.$field['_id'].'"></span>
                                <span class="ui-icon ui-icon-wrench" title="Cập nhật thông tin" data-action="btn_edit" data-id="'.$field['_id'].'"></span>
                                <span class="ui-icon ui-icon-locked" title="Khóa nhà hàng"  data-action="btn_lock" data-id="'.$field['_id'].'"></span>
                            </div>                                
                        </td>
                    </tr>
                ';
            }
            echo '
                    </tbody>
                </table>
            </div>
            ';
        }else{
            echo '<div class="error">Không có nhà hàng nào!</div>';
        }
    }
    
    public function list_restaurant_lock(){
        $result = $this->restaurant_administrator_model->get_lock();
        if($result->hasNext()){
            echo '
                <table border="0" cellpadding="0" cellspacing="0" width="900px" align="center">
                    <thead>
                        <tr valign="midle" height="30px" align="center">
                            <td width="40">STT</td>
                            <td width="180">Tên nhà hàng</td>
                            <td width="360">Địa chỉ</td>
                            <td width="100">Điện thoại</td>
                            <td width="160">Ngày khóa</td>
                            <td width="60"></td>
                        </tr>
                    </thead>
                    <tbody>
            ';
            $n = 0;
            while($result->hasNext()){
                $field = $result->getNext();
                $n++;
                $date_mongo = $field['restaurant_update_date'];
                $date_arr = explode(' ', $date_mongo);
                $date_lock = date("Y-m-d H:i:s", $date_arr[1]);
                echo '
                    <tr id="'.$field['_id'].'">
                        <td align="center"><b>'.$n.'</b></td>
                        <td>'.$field['restaurant_name'].'</td>
                        <td>'.$field['restaurant_address'].'</td>
                        <td align="center">'.$field['restaurant_phone'].'</td>
                        <td align="center">'.$date_lock.'</td>
                        <td align="right">
                            <div class="control_unlock" data-name="'.$field['restaurant_name'].'">
                                <a href="mailto:'.$field['restaurant_email'].'" target="new"><span class="ui-icon ui-icon-mail-closed" title="Gửi email cho nhà hàng"  data-action="btn_email" data-id="'.$field['_id'].'"></span></a>
                                <span class="ui-icon ui-icon-trash" title="Xóa nhà hàng khỏi danh sách"  data-action="btn_delete" data-id="'.$field['_id'].'"></span>
                                <span class="ui-icon ui-icon-locked" title="Mở khóa nhà hàng"  data-action="btn_unlock" data-id="'.$field['_id'].'"></span>
                            </div>
                            <span id="'.$field['_id'].'_icon"><span class="ui-icon ui-icon-locked"></span></span>
                        </td>
                    </tr>
                ';
            }
            echo '
                    </tbody>
                </table>
            </div>
            ';
        }else{
            echo '<div class="error">Không có nhà hàng nào!</div>';
        }
    }

    public function view(){
        $id = $this->input->get('id');
        $result = $this->restaurant_administrator_model->get_by_id($id);
        $field = $result->getNext();
        echo '<table border="0" width="100%">';
        echo '
            <tr>
                <td width="200" align="right">Tên nhà hàng:</td>
                <td width="400">'.$field['restaurant_name'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Tỉnh/Thành phố:</td>
                <td width="400">'.$field['restaurant_province'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Địa chỉ:</td>
                <td width="400">'.$field['restaurant_address'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Người đăng ký:</td>
                <td width="400">'.$field['restaurant_owner'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Email:</td>
                <td width="400">'.$field['restaurant_email'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Số điện thoại:</td>
                <td width="400">'.$field['restaurant_phone'].'</td>
            </tr>
            <tr>
                <td width="200" align="right">Thông tin khác:</td>
                <td width="400">'.$field['restaurant_note'].'</td>
            </tr>
        ';
        echo '</table>';
    }
    
    public function edit(){
        $id = $this->input->get('id');
        $result = $this->restaurant_administrator_model->get_by_id($id);
        $field = $result->getNext();
        echo '<input type="hidden" id="hid_edit_id" value="'.$id.'">';
        echo '<table border="0" width="100%">';
        echo '
            <tr>
                <td width="200" align="right">Tên nhà hàng:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_name" value="'.$field['restaurant_name'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Tỉnh/Thành phố:</td>
                <td width="400">
                    <input type="hidden" id="hid_curr_province" value="'.$field['restaurant_province'].'">
                    <select type="text" id="cbo_restaurant_edit_province" >
                        <option value="none">Chọn Tỉnh/Thành phố</option>
                        <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                        <option value="Cần Thơ">Cần Thơ</option>
                        <option value="An Giang">An Giang</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="200" align="right">Địa chỉ:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_address" value="'.$field['restaurant_address'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Người đăng ký:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_owner" value="'.$field['restaurant_owner'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Email:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_email" value="'.$field['restaurant_email'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Mật khẩu:</td>
                <td width="400"><input type="password" id="txt_restaurant_edit_pass" value="'.$field['restaurant_pass'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Số điện thoại:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_phone" value="'.$field['restaurant_phone'].'"></td>
            </tr>
            <tr>
                <td width="200" align="right">Thông tin khác:</td>
                <td width="400"><input type="text" id="txt_restaurant_edit_note" value="'.$field['restaurant_note'].'"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="lbl_edit_error" class="error"></td>
            </tr>
        ';
        echo '</table>';
    }
    
    public function edit_save(){
        $value = $this->input->get('value');
        $result = $this->restaurant_administrator_model->update_by_id($value);
        if($result){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    public function lock(){
        $id = $this->input->get('id');
        $result = $this->restaurant_administrator_model->lock_by_id($id);
        if($result){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function unlock(){
        $id = $this->input->get('id');
        $result = $this->restaurant_administrator_model->unlock_by_id($id);
        if($result){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function delete(){
        $id = $this->input->get('id');
        $result = $this->restaurant_administrator_model->delete_by_id($id);
        if($result){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}
