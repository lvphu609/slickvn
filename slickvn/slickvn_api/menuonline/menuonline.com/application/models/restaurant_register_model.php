<?php
class Restaurant_register_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->restaurant_info;
    }
    
    public function get_address_val(){
        $val = $this->input->get('txt');
        return $val;
    }
    
    public function getAll(){
        $dk = array();
        $doc = $this->db->findOne();
        return $doc;
    }

    public function restaurant_register($data_post){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $data = array();
        $data = $data_post;
        $data['restaurant_status'] = 0;
        $data['restaurant_create_date'] = $mongo_date;
        $data['restaurant_update_date'] = $mongo_date;
        return $this->db->insert($data);
    }
}