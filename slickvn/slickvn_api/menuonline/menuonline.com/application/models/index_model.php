<?php
class Index_model extends CI_Model{
    public function __construct() {
        parent::__construct();        
    }

    public function get_banner(){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->image_info;
        $dk = array(
            'image_type' => 'banner',
            'image_owner' => 'admin',
            'image_status' => 1
        );
        $doc = $this->db->find($dk);
        return $doc;
    }
    public function check_user($email, $pass){
        $this->mongo = new MongoClient();
        $this->dbs = $this->mongo->menuonline;
        $this->db = $this->dbs->restaurant_info;
        $dk = array(
            'restaurant_email' => $email,
            'restaurant_pass' => $pass
        );
        $doc = $this->db->find($dk);
        return $doc;
    }
}