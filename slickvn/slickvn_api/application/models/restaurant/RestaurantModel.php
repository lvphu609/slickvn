<?php

/**
 * 
 * This class connect and hands database:
 *                                      1. Dish
 *                                      2. Menu_Dish
 *                                      3. Comment
 *                                      4. Coupon
 *                                      5. Post
 *                                      6. Restaurant
 * 
 */
class RestaurantModel extends CI_Model{
    
    public function __construct() {
        
        //  Load model COMMON
        $this->load->model('common/CommonEnum');
        $this->load->model('common/CommonModel');
        
        //  Load model RESTAURANT
        $this->load->model('restaurant/AssessmentEnum');
        $this->load->model('restaurant/CommentEnum');
        
        //  Load model USER
        $this->load->model('user/UserEnum');
        $this->load->model('user/UserModel');
        
        $this->rate_point       = 0;
        $this->rate_service     = 0;
        $this->rate_landscape   = 0;
        $this->rate_taste       = 0;
        $this->rate_price       = 0;
        
    }
    
    //  Get rate service
    public function getRateService() {
        return $this->rate_service;
    } 
    //  Set rate service
    public function setRateService($value) {
        $this->rate_service = $value;
    }
    
    //  Get rate landscape
    public function getRateLandscape() {
        return $this->rate_landscape;
    }
    
    //  Set rate landscape
    public function setRateLandscape($value) {
        $this->rate_landscape = $value;
    }
    
    //  Get rate taste
    public function getRateTaste() {
        return $this->rate_taste;
    }
    //  Set rate taste
    public function setRateTaste($value) {
        $this->rate_taste = $value;
    }
    
    //  Get rate price
    public function getRatePrice() {
        return $this->rate_price;
    }
    //  Set rate price
    public function setRatePrice($value) {
        $this->rate_price = $value;
    }
    
    //  Get rate point
    public function getRatePoint() {
        return ($this->rate_service + $this->rate_landscape + $this->rate_taste + $this->rate_price)/4 ;
    }
    
    /**
     * 
     * Get Error
     * 
     * @return String $error
     */
    public function getError() {
        return $this->CommonModel->getError();
    }
    
    /**
     * 
     * Set Error
     * 
     * @return String $error
     */
    public function setError($e) {
        return $this->CommonModel->setError($e);
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION ASSESSMENT                  //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collection Assessment by $id_user
     * 
     * @param String $id_user
     * 
     * @return array collection Assessment
     * 
     */
    public function getAssessmentByIdUser($id_user) {
        
        return $this->CommonModel->getCollectionByField(AssessmentEnum::COLLECTION_ASSESSMENT, array(AssessmentEnum::ID_USER => $id_user) );
        
    }
    
    /**
     * 
     * Count Assessment for User
     * 
     * @param String $id_user
     * 
     * @return int
     * 
     */
    public function countAssessmentForUser($id_user){
        return sizeof( $this->getAssessmentByIdUser($id_user) );
    }
    
    /**
     * 
     * Get Collection Assessment by $id_restaurant
     * 
     * @param String $id_restaurant
     * 
     * @return array collection Assessment
     * 
     */
    public function getAssessmentByIdRestaurant($id_restaurant) {
        
        return $this->CommonModel->getCollectionByField(AssessmentEnum::COLLECTION_ASSESSMENT, array(AssessmentEnum::ID_RESTAURANT => $id_restaurant) );
        
    }
    
    /**
     * 
     * Count Assessment for Restaurant
     * 
     * @param String $id_restaurant
     * 
     * @return int
     * 
     */
    public function countAssessmentForRestaurant($id_restaurant) {
        $list_assessment = $this->getAssessmentByIdRestaurant($id_restaurant);
        
        foreach ($list_assessment as $assessment ) {
            
            $this->rate_service     = $this->rate_service   + $assessment['rate_service'];
            $this->rate_landscape   = $this->rate_landscape + $assessment['rate_landscape'];
            $this->rate_taste       = $this->rate_taste     + $assessment['rate_taste'];
            $this->rate_price       = $this->rate_price     + $assessment['rate_price'];
            
        }
        
        $count = sizeof($list_assessment);
        
        if($count > 0){
        
            $this->rate_service     = $this->rate_service   / $count;
            $this->rate_landscape   = $this->rate_landscape / $count;
            $this->rate_taste       = $this->rate_taste     / $count;
            $this->rate_price       = $this->rate_price     / $count;
            
        }
        
        return $count;
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION MENU DISH                   //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collectin Menu Dish
     * 
     * Return: Array Collection Menu Dish
     * 
     */
    public function getMenuDish() {
        
        return $this->CommonModel->getCollection(MenuDishEnum::COLLECTION_MENU_DISH);
        
    }
    
    /**
     * 
     * Get Collectin Menu Dish by Id
     * 
     * @param String $id
     * 
     * Return: Collection Menu Dish
     * 
     */
    public function getMenuDishtById($id) {
        
        return $this->CommonModel->getCollectionById(MenuDishEnum::COLLECTION_MENU_DISH, $id);
        
    }
    
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION RESTAULRANT                 //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Search Collection Restaurant
     * 
     * @param String $where
     * 
     * @return Array collection Restaurant
     * 
     */
    public function searchRestaurant($where) {
        
        //  Collection Restaurant
        $collection = RestaurantEnum::COLLECTION_RESTAURANT;
        $list_restaurant = $this->CommonModel->searchCollection($collection, $where );
        
        return $list_restaurant;
        
    }
    
    /**
     * 
     * Search Collection Menu Dish
     * 
     * @param String $where
     * 
     * @return Array collection Menu Dish
     * 
     */
    public function searchMenuDish($where) {
        
        //  Collection Restaurant
        $collection = MenuDishEnum::COLLECTION_MENU_DISH;
        $list_restaurant = $this->CommonModel->searchCollection($collection, $where );
        
        return $list_restaurant;
        
    }
    
    /**
     * 
     * Search Collection Post
     * 
     * @param String $where
     * 
     * @return Array collection Post
     * 
     */
    public function searchPost($where) {
        
        //  Collection Restaurant
        $collection = PostEnum::COLLECTION_POST;
        $list_post = $this->CommonModel->searchCollection($collection, $where );
        
        return $list_post;
        
    }
    
    /**
     * 
     * Get Collectin Restaurant by Id
     * 
     * @param String $id
     * 
     * Return: Collection Restaurant
     * 
     */
    public function getRestaurantById($id) {
        
        return $this->CommonModel->getCollectionById(RestaurantEnum::COLLECTION_RESTAURANT, $id);
        
    }
    
    /**
     * 
     * @param int $order_by: 1 = ASC | -1 = DESC 
     * @return Array
     * 
     */
    public function orderByRestaurant($order_by) {
        
        // Get collection restaurant
        $collection_name = RestaurantEnum::COLLECTION_RESTAURANT;
        
        //  Feild created_date
        $created_date = CommonEnum::CREATED_DATE;
        
        $list_order_by_restaurant = $this->CommonModel->orderByCollection(
                
                                                            $collection_name,
                                                            $created_date,
                                                            $order_by
                
                                                            );
        
        return $list_order_by_restaurant;
    }
    
    /**
     * 
     * Update Restaurant
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     * 
     */
    public function updateRestaurant($action, $id, $array_value) {
        
        $this->CommonModel->updateCollection(RestaurantEnum::COLLECTION_RESTAURANT, $action, $id, $array_value);
        
    }
    
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION POST                        //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Collectin Post
     * 
     * Return: Array Collection Post
     * 
     */
    public function getAllPost() {

        return $this->CommonModel->getCollection(PostEnum::COLLECTION_POST);
        
    }
    
    /**
     * 
     * Get Collectin Post by Id
     * 
     * @param String $id
     * 
     * Return: Array Collection Post
     * 
     */
    public function getPostById($id) {

        return $this->CommonModel->getCollectionById(PostEnum::COLLECTION_POST, $id);
        
    }
    
    /**
     * 
     * Update Collection Post
     * 
     * @param String $id
     * @param Array $array_value
     * 
     * @param String $action:  insert | edit | delete
     * 
     **/
    public function updatePost($action, $id, array $array_value) {
        
        $this->CommonModel->updateCollection(PostEnum::COLLECTION_POST, $action, $id, $array_value);
        
    }
    
    //------------------------------------------------------
    //                                                     /
    //  MENTHODS UDATE COLLECTION COUPON                   /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     * Insert Coupon
     *
     * @param int $coupon_value
     * @param String $deal_to_date
     * @param String $restaurant_name
     * @param String $content
     * @param String $image_link
     * @param String $link_to
     * 
     * @return error
     * 
     */
    public function insertCoupon($coupon_value, $deal_to_date, $restaurant_name, 
                                     $content, $image_link, $link_to) {
        
        $error = null;
        
        try{
            
            // Connect collection coupon
            $collection_name = CouponEnum::COLLECTION_NAME;
            $this->collection_coupon = $this->slickvn_db->$collection_name;
            
            $new = array(
                            
                            CouponEnum::COUPON_VALUE        => (int)$coupon_value,
                            CouponEnum::DEAL_TO_DATE        => $deal_to_date,
                            CouponEnum::RESTAURANT_NAME     => $restaurant_name,
                            CouponEnum::CONTENT             => $content,
                            CouponEnum::IMAGE_LINK          => $image_link,
                            CouponEnum::LINK_TO             => $link_to
                           
                        );
            
            $this->collection_coupon->insert( $new );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
    /**
     * 
     * Update Coupon
     *
     * @param String $id
     * @param int $coupon_value
     * @param String $deal_to_date
     * @param String $restaurant_name
     * @param String $content
     * @param String $image_link
     * @param String $link_to
     * 
     * @return error
     * 
     */
    public function updateCoupon($id, $coupon_value, $deal_to_date, $restaurant_name, 
                                     $content, $image_link, $link_to) {
        
        $error = null;
        
        try{
            
            // Connect collection coupon
            $collection_name = CouponEnum::COLLECTION_NAME;
            $this->collection_coupon = $this->slickvn_db->$collection_name;
            
            $update = array(
                
                            CommonEnum::_ID                 => new MongoId($id),
                            CouponEnum::COUPON_VALUE        => (int)$coupon_value,
                            CouponEnum::DEAL_TO_DATE        => $deal_to_date,
                            CouponEnum::RESTAURANT_NAME     => $restaurant_name,
                            CouponEnum::CONTENT             => $content,
                            CouponEnum::IMAGE_LINK          => $image_link,
                            CouponEnum::LINK_TO             => $link_to
                           
                        );
            
            $this->collection_coupon->save( $update );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
        /**
     * 
     * Delete Coupon
     * 
     * @param String $id
     * 
     * @return error
     * 
     */
    public function deleteCoupon($id){
        
        $error = null;
        
        try{
            
            // Connect collection restaurant
            $collection_name = CouponEnum::COLLECTION_NAME;
            $this->collection_coupon = $this->slickvn_db->$collection_name;
            
            $delete = array(
                
                            CommonEnum::_ID  => new MongoId($id),
                           
                        );
            
            $this->collection_coupon->remove( $delete );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
    //------------------------------------------------------
    //                                                     /
    //  MENTHODS UDATE COLLECTION SUBCRIBED_EMAIL          /
    //                                                     /
    //------------------------------------------------------
    
     /**
     * 
     * Insert Subscribed Email
     * 
     * @param String $email
     * 
     * @return error
     * 
     */
    public function insertEmail($email) {
        
        $error = null;
        
        try{
            
            // Connect collection subcribed_email
            $collection_name = SubscribedEmailEnum::COLLECTION_NAME;
            $this->collection_subcribed_email = $this->slickvn_db->$collection_name;
            
            $new = array(
                            SubscribedEmailEnum::EMAIL => $email
                        );
            
            $this->collection_subcribed_email ->insert( $new );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
    /**
     * 
     * Update Email
     * 
     * @param String $id
     * @param String $email
     * 
     * @return error
     * 
     */
    public function updateEmail($id, $email) {
        
        $error = null;
        
        try{
            
            // Connect collection subcribed_email
            $collection_name = SubscribedEmailEnum::COLLECTION_NAME;
            $this->collection_subcribed_email = $this->slickvn_db->$collection_name;
            
            $update = array(
                               CommonEnum::_ID     => new MongoId($id),
                               SubscribedEmailEnum::EMAIL     => $email
                            );
            
            $this->collection_subcribed_email ->save( $update );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
    /**
     * 
     * Delete Email
     * 
     * @param String $id
     * 
     * @return error
     * 
     */
    public function deleteEmail($id) {
        
        $error = null;
        
        try{
            
            // Connect collection subcribed_email
            $collection_name = SubscribedEmailEnum::COLLECTION_NAME;
            $this->collection_subcribed_email = $this->slickvn_db->$collection_name;
            
            $delete = array(
                                CommonEnum::_ID => new MongoId($id)
                           );
            
            $this->collection_subcribed_email ->remove( $delete );
            
        }catch ( MongoConnectionException $e ){
                
                return $error = ''.$e->getMessage();
                
        }catch ( MongoException $e ){
            
                return $error = ''.$e->getMessage();
                
        }
        
        return $error;
        
    }
    
    //----------------------------------------------------------------------//
    //                                                                      //
    //                  FUNCTION FOR COLLECTION COMMENT                     //
    //                                                                      //
    //----------------------------------------------------------------------//
    
    /**
     * 
     * Get Comment by Id Assessment
     * 
     * @param String $id_assessment
     * 
     * @return Array Comment
     * 
     */
    public function getCommentByIdAssessment($id_assessment) {
        $list_comment = $this->CommonModel->getCollectionByField(CommentEnum::COLLECTION_COMMENT, array (CommentEnum::ID_ASSESSMENT => $id_assessment ) );
        
        $list_comment_detail = array();
        
        foreach ($list_comment as $comment) {
            
            //  Get User of Assessment
            $user = $this->UserModel->getUserById($comment['id_user']);
            $comment_detail = array(
                
                                    CommentEnum::ID                 => $comment['_id']->{'$id'},
                                    //  Infor User
                                    CommentEnum::ID_USER            => $comment['id_user'],
                                    UserEnum::FULL_NAME             => $user[$comment['id_user']]['full_name'],
                                    UserEnum::AVATAR                => $user[$comment['id_user']]['avatar'],
                                    UserEnum::NUMBER_ASSESSMENT     => $this->countAssessmentForUser($comment['id_user']),
                
                                    CommentEnum::CONTENT            => $comment['content'],
                                    
                                    //  Number LIKE of Comment
                                    CommentEnum::NUMBER_LIKE        => $this->UserModel->countUserLogByAction(array ( 
                                                                                                                                    UserLogEnum::ID_ASSESSMENT => $comment['_id']->{'$id'}, 
                                                                                                                                    UserLogEnum::ACTION        => CommonEnum::LIKE_COMMENT
                                                                                                                                    )),
                                    //  Number SHARE of Comment
                                    CommentEnum::NUMBER_SHARE        => $this->UserModel->countUserLogByAction(array ( 
                                                                                                                        UserLogEnum::ID_ASSESSMENT => $comment['_id']->{'$id'}, 
                                                                                                                        UserLogEnum::ACTION        => CommonEnum::SHARE_COMMENT
                                                                                                                        )),
                                    CommonEnum::CREATED_DATE         => $comment['created_date']
                                    
                                    
            );
                    
            $list_comment_detail[] = $comment_detail;
        }
        
        return $list_comment_detail;
        
    }
    
}

?>
