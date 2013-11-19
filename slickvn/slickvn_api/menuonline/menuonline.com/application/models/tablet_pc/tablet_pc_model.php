<?php
class Tablet_pc_model extends CI_Model{
    public function __construct() {
        parent::__construct();        
    }
    
    public function get_res_info($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->restaurant_info;
        $dk = array(
            '_id' => new MongoId($res_id)
        );
        $result = array(
            'restaurant_name' => true
        );
        $doc = $this->db->findOne($dk, $result);
        return $doc;
    }

    public function get_food_kind($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->food_kind_info;
        $dk = array(
            'kind_owner' => $res_id
        );
        $doc = $this->db->find($dk);
        return $doc;
    }
    
    public function get_all_food($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->food_info;
        
        $dk = array(
            'food_restaurant' => $res_id,
            'food_status' => array(
                '$ne' => 0
            )
        );
        $sort = array(
            'food_status' => -1,
            'food_sale' => -1
        );
        $doc = $this->db->find($dk)->sort($sort);
        return $doc;
    }

    public function get_food($res_id, $type, $kind, $hot, $search){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->food_info;
        if($search == ''){
            if($type == 'all' && $hot == 'all'){
                $dk = array(
                    'food_restaurant' => $res_id,
                    'food_status' => array(
                        '$ne' => 0
                    )
                );
            }else if($type == 'all'){
                $dk = array(
                    'food_restaurant' => $res_id,
                    'food_status' => $hot
                );
            }else if($hot != 'all'){
                $dk = array(
                    'food_restaurant' => $res_id,
                    'food_type' => $type,
                    'food_status' => $hot
                );
            }else if($kind != 'all'){
                $dk = array(
                    'food_restaurant' => $res_id,
                    'food_type' => $type,
                    'food_kind' => $kind
                );
            }else{
                $dk = array(
                    'food_restaurant' => $res_id,
                    'food_type' => $type
                );
            }
        }else{
            $dk = array(
                'food_name' => array(
                    '$regex' => $search
                )
            );
        }
        
        $sort = array(
            'food_status' => -1,
            'food_sale' => -1
        );
        $doc = $this->db->find($dk)->sort($sort);
        return $doc;
    }
    
    public function get_by_id($food_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->food_info;
        $dk = array(
            '_id' => array(
                '$in' => $food_id
            )
        );
        $sort = array(
            'food_sale' => -1,
            'food_status' => -1
        );
        $doc = $this->db->find($dk)->sort($sort);
        return $doc;
    }
}