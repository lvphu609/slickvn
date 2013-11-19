<?php
class Menu_admin_res_model extends CI_Model{
    public function __construct() {
        parent::__construct();       
    }

    public function get_all($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_info;
               
        if($this->input->get('type')){
            $type = $this->input->get('type');
        }else{
            $type = 'food';
        }
        $dk = array(
            'food_restaurant' => $res_id,
            'food_type' => $type
        );
        $sort = array(
            'food_status' => -1,
            'food_update_date' => 1,
            'food_name' => 1
        );
        $data = array();
        $limit = 5;
        if($this->input->get('page')){
            $page = $this->input->get('page');
        }else{
            $page = 1;
        }
        
        $num = $this->db->count($dk);
        $d = $num%$limit;
        if($d == 0){
            $sum = $num/$limit;
        }else{
            $sum = ((($num - ($num%$limit))/$limit) + 1);
        }
        $doc = $this->db->find($dk)->sort($sort)->skip(($page-1)*$limit)->limit($limit);
        $data['type'] = $type;
        $data['page'] = $page;
        $data['sum'] = $sum;
        $data['limit'] = $limit;
        $data['doc'] = $doc;
        return $data;
    }
    public function get_by_id($id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_info;
        $id = new MongoId($id);
        $dk = array(
            '_id' => $id
        );
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function get_food_image($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->image_info;
        $res_id = new MongoId($res_id);
        $dk = array(
            'image_owner' => $res_id,
            'image_type' => 'food'
        );
        $col = array(
            '_id' => true,
            'image_url' => true
        );
        $doc = $this->db->find($dk, $col);
        return $doc;
    }
    public function upload($file){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->image_info;
        
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $new_img = array(
            'image_url' => $file['name'],
            'image_type' => 'food',
            'image_owner' => $file['owner'],
            'image_status' => 1,
            'image_create_date' => $mongo_date
        );
        $this->db->insert($new_img);
        
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_info;
        if($this->input->post('rdo_food_kind') == 'food'){
            $phan_loai = $this->input->post('cbo_food');
        }else{
            $phan_loai = $this->input->post('cbo_drink');
        }
        if($this->input->post('txt_food_sale') > 0){
            $food_status = 2;
        }else{
            $food_status = 1;
        }
        $new_food = array(
            'food_restaurant' => $this->input->post('hid_restaurant_id'),
            'food_name' => $this->input->post('txt_food_name'),
            'food_price' => $this->input->post('txt_food_price'),
            'food_type' => $this->input->post('rdo_food_kind'),
            'food_kind' => $phan_loai,
            'food_image' => $file['name'],
            'food_sale' => $this->input->post('txt_food_sale'),
            'food_status' => $food_status,
            'food_note' => $this->input->post('txt_food_note'),
            'food_create_date' => $mongo_date,
            'food_update_date' => $mongo_date
        );
        $doc = $this->db->insert($new_food);
        return $doc;
    }
    
    public function add_new_image($file){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->image_info;
        
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $new_img = array(
            'image_url' => $file['name'],
            'image_type' => 'food',
            'image_owner' => $file['owner'],
            'image_status' => 1,
            'image_create_date' => $mongo_date
        );
        $this->db->insert($new_img);
    }


    public function add_food_kind($new){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_kind_info;    
        
        $num = 0;
        $dk = array(
            'kind_owner' => $new['kind_owner'],
            'kind_name' => $new['kind_name']
        );
        $num = $this->db->count($dk);
        if($num > 0){
            return FALSE;
        }
        $doc = $this->db->insert($new);
        return TRUE;
    }
    
    public function get_food_kind($new){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_kind_info;

        $dk = array(
            'kind_owner' => $new['kind_owner'],
            'kind_type' => $new['kind_type']
        );
        $doc = $this->db->find($dk);
        return $doc;
    }

    public function delete($id){
        $dk = array(
            '_id' => new MongoId($id)
        );        
        $this->db->remove($dk);
    }

    public function update_food($food_id, $value){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->food_info;
        
        $id = new MongoId($food_id);
        $dk = array(
            '_id' => $id
        );
        $new = array(
            '$set' => $value
        );
        $this->db->update($dk, $new);
        return TRUE;       
    }
}