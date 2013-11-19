<?php
class Login_admin_res_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        
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