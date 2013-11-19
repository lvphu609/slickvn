<?php
class Restaurant_administrator_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->restaurant_info;
    }

    public function get_new(){
        $dk = array('restaurant_status' => 0);
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function get_old(){
        $dk = array('restaurant_status' => 1);
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function get_lock(){
        $dk = array('restaurant_status' => 2);
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function get_by_id($id){
        $dk = array('_id' => new MongoId($id));
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function lock_by_id($id){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $dk = array('_id' => new MongoId($id));
        $new = array(
            '$set' => array(
                'restaurant_status' => 2,
                'restaurant_update_date' => $mongo_date
            )
        );
        $doc = $this->db->update($dk, $new);
        return $doc;
    }
    public function unlock_by_id($id){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $dk = array('_id' => new MongoId($id));
        $new = array(
            '$set' => array(
                'restaurant_status' => 1,
                'restaurant_update_date' => $mongo_date
            )
        );
        $doc = $this->db->update($dk, $new);
        return $doc;
    }
    public function update_by_id($value){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $arr_val = explode(';', $value);
        $id = $arr_val[0];
        $dk = array('_id' => new MongoId($id));
        $new = array(
            '$set' => array(
                'restaurant_name' => $arr_val[1],
                'restaurant_province' => $arr_val[2],
                'restaurant_address' => $arr_val[3],
                'restaurant_owner' => $arr_val[4],
                'restaurant_email' => $arr_val[5],
                'restaurant_pass' => $arr_val[6],
                'restaurant_phone' => $arr_val[7],
                'restaurant_note' => $arr_val[8],
                'restaurant_update_date' => $mongo_date
            )
        );
        return $this->db->update($dk, $new);
    }
    public function delete_by_id($id){
        $dk = array('_id' => new MongoId($id));
        $doc = $this->db->remove($dk);
        return $doc;
    }

    
    public function commit(){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $str_id_yes = $this->input->post('hid_id_yes');
        $str_id_no = $this->input->post('hid_id_no');
        if($str_id_yes != ''){
            $arr_id_yes = explode(';', $str_id_yes);
            foreach($arr_id_yes as $id){
                if($id != ''){
                    $dk = array('_id' => new MongoId($id));
                    $value = array(
                        '$set' => array(
                            'restaurant_status' => 1,
                            'restaurant_update_date' => $mongo_date
                         )
                    );
                    $this->db->update($dk, $value);
                }               
            }
        }
        if($str_id_no != ''){
            $arr_id_no = explode(';', $str_id_no);
            foreach($arr_id_no as $id){
                if($id != ''){
                    $dk = array('_id' => new MongoId($id));
                    $this->db->remove($dk);
                }               
            }
        }
    }
    
}