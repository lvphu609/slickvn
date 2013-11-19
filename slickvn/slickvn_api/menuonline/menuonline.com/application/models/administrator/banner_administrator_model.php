<?php
class Banner_administrator_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->image_info;
    }

    public function get_all(){
        $dk = array(
            'image_type' => 'banner',
            'image_owner' => 'admin'
        );
        $sort = array(
            'image_status' => -1
        );
        $doc = $this->db->find($dk)->sort($sort);
        return $doc;
    }
    public function upload($file){
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $new = array(
            'image_url' => $file,
            'image_type' => 'banner',
            'image_owner' => 'admin',
            'image_status' => 0,
            'image_create_date' => $mongo_date
        );
        $doc = $this->db->insert($new);
        return $doc;
    }
    public function delete($id){
        $dk = array(
            '_id' => new MongoId($id)
        );        
        $this->db->remove($dk);
    }

    public function set_default($id){
        $dk = array(
            'image_status' => 1
        );
        $new = array(
            '$set' => array(
                'image_status' => 0
            )
        );
        $this->db->update($dk, $new);
        
        $curr_date = date("Y-m-d H:i:s");
        $mongo_date = new MongoDate(strtotime($curr_date));
        $dk = array(
            '_id' => new MongoId($id)
        );
        $new = array(
            '$set' => array(
                'image_status' => 1,
                'image_update_date' => $mongo_date
            )
        );
        $this->db->update($dk, $new);
    }
}