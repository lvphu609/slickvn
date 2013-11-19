<?php

/**
 * 
 * This class connect and hands collection Base
 *                                          
 */
class CommonModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        $this->error = null;
        
        try{
            //  Connect to MogoDB
            $this->connect = new MongoClient();

            //  Connect to Restaurant DB
            $this->slickvn_db = $this->connect->slickvn;
            
        }catch ( MongoConnectionException $e ){
                
            $this->error  = $e->getMessage();
                
        }catch ( MongoException $e ){
            
            $this->error  = $e->getMessage();
                
        }
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                          COMMON FUNCTON                              //
    //                                                                      //
    //----------------------------------------------------------------------//
    
	
	/**
     * 
     * Move file to new directory
     * 
     * @param type $ol_dir
     * @param type $new_dir
     * 
     * @return boolean
     * 
     */
    public function moveFileToDirectory($ol_dir, $new_dir) {
        return rename($ol_dir, $new_dir);
    }
	
	
    /**
     * 
     * Get Error
     * 
     * @return String $error
     */
    public function getError() {
        return $this->error;
    }
    
    /**
     * 
     * Set Error
     * 
     * @return void
     */
    public function setError($e) {
        $this->error = $e;
    }
    
    /**
     * 
     * Get Connect Data Base
     * 
     * @return database slickvn
     * 
     */
    public function getConnectDataBase() {
        return $this->slickvn_db;
    }
    
    /**
     * 
     * Remove Element Array Null
     * 
     * @param array $array
     * 
     * @return array
     * 
     */
    public function removeElementArrayNull(array $array) {
        
        for($i=0; sizeof($array); $i++) {
            
            if($array[$i] == null){
                unset($array[$i]);
            }
            
        }
        return $array;
        
    }
    
    public function countAverage(array $array) {
        
        if( ($array == null) || (sizeof($array) == 0) ) return 0;

        $size_array = sizeof($array);
        $count = 0;
        
        
        foreach ($array as $value) {

            $count = $count + $value;

        }
        return ($count/$size_array);
    }
    
    /**
     * 
     * Check Type - Extension Imgage
     * 
     * @param String $file_type
     * @param String $extension
     * 
     * @return boolean
     * 
     */
    public function checkExtensionImage($file_type, $extension) {
        
        $extension = strtolower($extension);

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        
        if ( (  ( $file_type == "image/gif")   || 
                ( $file_type == "image/jpeg")  || 
                ( $file_type == "image/jpg")   || 
                ( $file_type == "image/pjpeg") || 
                ( $file_type == "image/x-png") || 
                ( $file_type == "image/png") )

            && in_array($extension, $allowedExts)){
            
              return true;
        }
        else{
            $this->setError('File type NOT support');
            return false;
        }
        
    }
    
    /**
     * 
     * Upload Image
     * 
     * @param String $type: user_profile | carousel | dish | introduce | restaurant
     * @param type $file_name
     * 
     */
    public function uploadImage($type, $name_retaurant){
        
        /*** the maximum filesize from php.ini ***/
        $ini_max = str_replace('M', '', ini_get('upload_max_filesize'));
        $upload_max = $ini_max;//  MB
        
        //  Path
        $path = CommonEnum::ROOT;
        
        if( strcmp( strtolower($type), CommonEnum::DIR_USER_PROFILE ) == 0  ){
            $path = $path.CommonEnum::TYPE_USER_PROFILE;
        }
        else{
            $path = $path.CommonEnum::DIR_RESTAURANT.$name_retaurant.'/'.$type.'/';
        }
        
        //  Create directory $path
        if(!file_exists($path)){
            mkdir($path, 0, true);
        }
        
        if( isset($_FILES["image"]["name"]) ){
            
            for($i=0;$i<count($_FILES["image"]["name"]);$i++){

                //  File type
                $file_type = $_FILES["image"]['type'][$i];
                //  Extension
                $extension = end ( explode(".", $_FILES["image"]["name"][$i]) );
                
                $check_type = $this->checkExtensionImage($file_type, $extension);
                
                if($check_type){
                    
                    // MB
                    $file_size = ($_FILES["image"]["size"][$i]) / 1024 / 1024;
                    
                    if( $file_size > $upload_max ){
                        $this->setError('File size exceeds '.$file_size.' limit');
                        return;
                    }
                    
                    $upload = move_uploaded_file($_FILES["image"]["tmp_name"][$i], $path.$_FILES["image"]["name"][$i]);
                    
                    if(!$upload){
                        $this->setError($_FILES['image']['error'][$i]);
                        return;
                    }
                    
                }
            } 
        }
    }
    
      /**
     * 
     * Search Collection
     * 
     * @param array $where
     * @param array $key
     * 
     * @return Array Restaurant
     * 
     */
    public function searchCollection($collection_name, array $where) {
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else{
                $this->collection = $this->slickvn_db->$collection_name;
        
                $list_restaurant_found = $this->collection->find($where);

                return iterator_to_array($list_restaurant_found);
            }
            
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
        
    }
      
    /**
     * 
     * Get Collection
     * 
     * @param String $collection_name
     * 
     * 
     */
    public function getCollection($collection_name){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select all collection_name
                $select_collection = $this->collection->find(array());

                $array=iterator_to_array($select_collection);
                return $array;
            }
            
        }catch ( MongoConnectionException $e ){
            $this->setError($e->getMessage());
        }catch ( MongoException $e ){
            $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Get Collection by Id
     * 
     * @param String $collection_name
     * @param String $id
     * 
     * @return a document
     * 
     */
    public function getCollectionById($collection_name, $id){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($id == null){
                $this->setError('Id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select collection_name by id
                $select_collection = $this->collection->find(array(CommonEnum::_ID => new MongoId($id)));

                $array = iterator_to_array($select_collection);
                return $array;
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Get Collection by Special Field
     * 
     * @param String $collection_name
     * @param Array $value
     * 
     * @return a document
     * 
     */
    public function getCollectionByField($collection_name, array $value){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($value == null){
                $this->setError('Arry id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select collection_name by id
                $select_collection = $this->collection->find( $value );

                $array = iterator_to_array($select_collection);
                return $array;
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Get Value Feild Name Base Collection by Id
     * 
     * @param String $collection_name
     * @param String $array_id
     * 
     * @return array document
     * 
     */
    public function getValueFeildNameBaseCollectionById($collection_name, array $array_id){
        
        try{
        
            if($collection_name == null){ 
                $this->setError('Collection name is null');
            }
            else if($array_id == null){
                $this->setError('Id is null');
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;
                
                $str_doc="";
                
                foreach ($array_id as $id) {
                    
                    //  Query select collection_name by id
                    $select_collection = $this->collection->find(array(CommonEnum::_ID => new MongoId($id)));
					
                    $array_ = iterator_to_array($select_collection);
					
                    if(sizeof($array_) > 0){
						$str_doc = $str_doc.', '.$array_[$id][CommonEnum::NAME];
					}
                
                }
                
                return $str_doc;
                
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
    }
    
    /**
     * 
     * Update Collection
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updateCollection($collection_name, $action, $id, array $array_value) {
        
        try{
            if($action == null){ 
                $this->setError('Action is null'); return;
            }
            else if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                
                //  Action insert
                if( strcmp( strtolower($action), CommonEnum::INSERT ) == 0 ) {
                    
                    $this->collection ->insert( $array_value );
                    
                }

                //  Action edit
                else if( strcmp( strtolower($action), CommonEnum::EDIT ) == 0 ){

                    if($id == null){$this->setError('Is is null'); return;}
                    
                    $where = array(
                                    CommonEnum::_ID => new MongoId($id)
                                );
                    
                    $this->collection ->update($where, array('$set' => $array_value) );
                }

                //  Action delete
                else if( strcmp( strtolower($action), CommonEnum::DELETE ) == 0 ){
                    
                    if($id == null){$this->setError('Is is null'); return;}
                    
                    
                    
                    $where = array(
                                    CommonEnum::_ID => new MongoId($id)
                                );
                    
                    $this->collection ->remove( $where );
                }
                else{
                    $this->setError('Action '.$action.' NOT support');
                }
                
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     * 
     * Edit Special Field Collection
     * 
     * @param String $collection_name
     * @param String $id
     * @param Array $array_value
     * 
     * 
     **/
    public function editSpecialField($collection_name, $id, array $array_value) {
        
        try{
            if($collection_name == null){
                $this->setError('Collection name is null'); return;
            }
            else{
                
                // Connect collection $collection_name
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;
                

                    if($id == null){$this->setError('Is is null'); return;}
                    
                    $where = array( CommonEnum::_ID => new MongoId($id) );
                    
                    $this->collection ->update($where, $array_value );
                
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
    }
    
    /**
     *
     * Get Interval
     * 
     * @param String $d1
     * @param String $d2
     * 
     * @return int
     */
    public function getInterval($d1, $d2) {

        $start  = strtotime($d1);
        $end    = strtotime($d2);

        $days_between = ceil(( $end - $start) / 86400);
        
        return $days_between;
        
    }
    
    public function getCurrentDate() {
        
        $UTC = new DateTimeZone("UTC");
        $newTZ = new DateTimeZone("Asia/Ho_Chi_Minh");
        $date = new DateTime( date("d-m-Y H:i:s"), $UTC );
        $date->setTimezone( $newTZ );
        return $date->format('d-m-Y H:i:s');
        
    }
    
    /**
     * 
     * Order By Collection
     * 
     * @param String $collection_name
     * @param String $field_name
     * @param int $order_by_key
     * 
     * Return: Array
     * 
     */
    public function orderByCollection($collection_name, 
                                      /* Feild need to sort */
                                      $field_name,
                                      /* order_by_key: 1 <=> ASC ? -1 <=> DESC */
                                      $order_by_key) {

        try{
        
            if($collection_name == null){
                $this->setError('Collection is null');
            }
            else if($field_name == null){
                $this->setError('Field is null');
            }
            else if($order_by_key == null){
                $order_by_key = 1;
            }
            else{
                //  Connect to $collection_name
                $this->collection = $this->slickvn_db->$collection_name;

                //  Query select all collection_name
                $select_collection = $this->collection->find()->sort( array($field_name => $order_by_key) );

                $array=iterator_to_array($select_collection);
                return $array;
            }
            
        }catch ( MongoConnectionException $e ){
                
            $this->setError($e->getMessage());
                
        }catch ( MongoException $e ){
            
            $this->setError($e->getMessage());
                
        }
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                      FUNCTION FOR COLLECTION BASE                    //
    //                                                                      //
    //                      1. meal_type                                    //
    //                      2. favourite                                    //
    //                      3. payment_type                                 //
    //                      4. other_criteria                               //
    //                      5. mode_use                                     //
    //                      6. price_person                                 //
    //                      7. landscape                                    //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Update Collection Base
     * 
     * @param String $collection_name
     * @param String $id
     * @param String $name
     * @param String $action:  insert | edit | delete
     * 
     * 
     */
    public function updateBaseCollection($action, $collection_name, $id, array $array_value) {
        
        try{
            
            if($action == null){ 
                $this->setError('Action is null'); return;
            }
            else if($collection_name == null){ 
                $this->setError('Collection name is null'); return;
            }
            else{
                // Connect collection 
                $collection = $collection_name;
                $this->collection = $this->slickvn_db->$collection;

                //  Action insert
                if( strcmp( strtolower($action), CommonEnum::INSERT  ) == 0 ) {

//                    if($name == null){ $this->setError('Name is null');}

//                    $new = array(
//                                    CommonEnum::NAME => $name
//                            );

                    $this->collection ->insert( $array_value );
                }

                //  Action edit
                else if( strcmp( strtolower($action), CommonEnum::EDIT  ) == 0 ){

                    if($id == null){ 
                        $this->setError('Id is null');
                        return;
                    }

                    $where = array(
                                    CommonEnum::_ID => new MongoId($id)
                                );
                    
                    $this->collection ->update($where, array( '$set' => $array_value ));
                }

                //  Action delete
                else if( strcmp( strtolower($action), CommonEnum::DELETE  ) == 0 ){

                    if($id == null){ 
                        $this->setError('Id is null');
                        return;
                    }

                    $where = array(
                                    CommonEnum::_ID => new MongoId($id)
                                );

                    $this->collection ->remove( $where );
                }
                else{
                    $this->setError('Action '.$action.' NOT support');return;
                }
            }
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        
    }
    
    /**
     * 
     * Check Exist Value in a collecstion by $field => $value
     * 
     * @param String $collection_name
     * @param Array $array_value
     * 
     * @return Array collection
     * 
     **/
    public function checkExistValue($collection_name, array $array_value) {
        
        try{
            // Connect collection 
            $collection = $collection_name;
            $this->collection = $this->slickvn_db->$collection;
            
            $result = iterator_to_array( $this->collection->find($array_value) );

            return $result;
            
        }catch ( MongoConnectionException $e ){
                $this->setError($e->getMessage());
        }catch ( MongoException $e ){
                $this->setError($e->getMessage());
        }
        
    }
    
}

?>
