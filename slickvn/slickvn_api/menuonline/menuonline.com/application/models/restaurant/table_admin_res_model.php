<?php
class Table_admin_res_model extends CI_Model{
    public function __construct() {
        parent::__construct();       
    }

    
    public function get_room_by_id($res_id){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->room_info;
        //$id = new MongoId($res_id);
        $dk = array(
            'room_owner' => (string)$res_id
        );
        $result = array(
            'room_name' => true,
            'room_table' => true
        );
        $doc = $this->db->find($dk, $result);
        return $doc;
    }
    
    public function add_room($res_id, $room, $table){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->room_info;
        
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $new_room = array(
            'room_name' => $room,
            'room_table' => $table,
            'room_owner' => $res_id,
            'room_status' => 1,
            'room_create_date' => $mongo_date,
            'room_update_date' => $mongo_date
        );
        $this->db->insert($new_room);
        return TRUE;
    }
    
    public function change_table_status($res_id, $room, $table, $stutus){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;       
        $this->db = $this->dbs->table_info;
        
        $dk = array(
            'table_restaurant' => $res_id,
            'table_room' => $room,
            'table_end_date' => array(
                '$ne' => 0
            )
        );
        
        $result = $this->db->count($dk);
        if($result > 0){
            $dk = array(
                'table_restaurant' => $res_id,
                'table_room' => $room,
                'table_end_date' => array(
                    '$ne' => 0
                )
            );
            $val = array(
                'table_status' => $stutus
            );
            
            $this->db->update($dk, $val);
        }else{
            $curr_date = date("Y-m-d H:i:s");
            $mongo_date = new MongoDate(strtotime($curr_date));
            $new = array(
                'table_restaurant' => $res_id,
                'table_room' => $room,
                'table_status' => $stutus,
                'table_item' => '',
                'table_begin_date' => $mongo_date,
                'table_end_date' => 0
            );
            $this->db->insert($new);
        }
    }
}