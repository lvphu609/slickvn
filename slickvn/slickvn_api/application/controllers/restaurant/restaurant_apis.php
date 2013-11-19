<?php

require APPPATH.'/libraries/REST_Controller.php';
/**
 * 
 * This class support APIs Restaurant for client
 *
 * @author Huynh Xinh
 * Date: 8/11/2013
 * 
 */
class restaurant_apis extends REST_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //  Load model RESTAURANT
        $this->load->model('restaurant/RestaurantModel');
        $this->load->model('restaurant/RestaurantEnum');
        $this->load->model('restaurant/CouponEnum');
        $this->load->model('restaurant/PostEnum');
        $this->load->model('restaurant/SubscribedEmailEnum');
        $this->load->model('restaurant/ClosedMemberEnum');
        $this->load->model('restaurant/MenuDishEnum');
        
        //  Load model COMMON
        $this->load->model('common/CommonModel');
        $this->load->model('common/CommonEnum');
        
        //  Load model USER
        $this->load->model('user/UserModel');
        $this->load->model('user/UserEnum');
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Assessment                                   //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     * Get Assessment by Id Restaurant
     * 
     * @param int $limit
     * @param int $page
     * @param String $id_restaurant
     * 
     * Response: JSONObject
     * 
     */
    public function get_assessment_by_id_restaurant_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
        
        $id_restaurant = $this->get('id_restaurant');
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection Assessment
        $list_assessment    = $this->RestaurantModel->getAssessmentByIdRestaurant($id_restaurant);
        
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        
        foreach ($list_assessment as $assessment){

            $approval = $assessment['approval'];
            
            if( strcmp(strtoupper($approval), AssessmentEnum::APPROVAL_YES) == 0){
            
                $count ++ ;

                if(($count) >= $position_start_get && ($count) <= $position_end_get){

                    //  Get User of Assessment
                    $user = $this->UserModel->getUserById($assessment['id_user']);
                    
                    //  Create JSONObject Restaurant
                    $jsonobject = array( 

                        AssessmentEnum::ID                          => $assessment['_id']->{'$id'},
                        AssessmentEnum::ID_USER                     => $assessment['id_user'],
                        AssessmentEnum::ID_RESTAURANT               => $assessment['id_restaurant'],
                        UserEnum::FULL_NAME                         => $user[$assessment['id_user']]['full_name'],
                        UserEnum::AVATAR                            => $user[$assessment['id_user']]['avatar'],
                        UserEnum::NUMBER_ASSESSMENT                 => $this->RestaurantModel->countAssessmentForUser($assessment['id_user']),
                        AssessmentEnum::CONTENT                     => $assessment['content'],

                        AssessmentEnum::RATE_SERVICE                => $assessment['rate_service'],
                        AssessmentEnum::RATE_LANDSCAPE              => $assessment['rate_landscape'],
                        AssessmentEnum::RATE_TASTE                  => $assessment['rate_taste'],
                        AssessmentEnum::RATE_PRICE                  => $assessment['rate_price'],
                                
                        //  Number LIKE of Assessment
                        AssessmentEnum::NUMBER_LIKE                 => $this->UserModel->countUserLogByAction(array ( 
                                                                                                                        UserLogEnum::ID_ASSESSMENT => $assessment['_id']->{'$id'}, 
                                                                                                                        UserLogEnum::ACTION        => CommonEnum::LIKE_ASSESSMENT
                                                                                                                        )),
                        //  Number SHARE of Assessment
                        AssessmentEnum::NUMBER_SHARE                => $this->UserModel->countUserLogByAction(array ( 
                                                                                                                        UserLogEnum::ID_ASSESSMENT => $assessment['_id']->{'$id'}, 
                                                                                                                        UserLogEnum::ACTION        => CommonEnum::SHARE_ASSESSMENT
                                                                                                                        )),
                        AssessmentEnum::COMMENT_LIST                =>  $this->RestaurantModel->getCommentByIdAssessment($assessment['_id']->{'$id'}),
                                
                        CommonEnum::CREATED_DATE                    => $assessment['created_date']
                                

                    );

                    $results[] = $jsonobject;

                }
            }
        }
        //  Response
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>  sizeof($results),
               'Results'    =>$results
        );
        $this->response($data);
        
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Menu Dish                                    //
    //                                                    //
    //----------------------------------------------------//
    
    /**
     * 
     *  API get all Menu Dish
     * 
     *  Menthod: GET
     * 
     *  Response: JSONObject
     * 
     */
    public function get_all_menu_dish_get() {
        
        $list_menu_dish = $this->RestaurantModel->getMenuDish();
        
        $results = array();
        
        foreach ($list_menu_dish as $menu_dish) {
            
            $jsonobject = array(
                
                    MenuDishEnum::ID                => $menu_dish['_id']->{'$id'},
                    MenuDishEnum::ID_RESTAURANT     => $menu_dish['id_restaurant'],
                    MenuDishEnum::DISH_LIST         => $menu_dish['dish_list'],        
//                    MenuDishEnum::NAME              => $menu_dish['name'],
//                    MenuDishEnum::DESC              => $menu_dish['desc'],
//                    MenuDishEnum::PRICE             => $menu_dish['price'],
//                    MenuDishEnum::SIGNATURE_DISH    => $menu_dish['signature_dish'],
//                    MenuDishEnum::LINK_IMAGE        => $menu_dish['link_image'],
                
                    CommonEnum::CREATED_DATE        => $menu_dish['created_date']
                );
            $results [] = $jsonobject;
                    
        }
        
        //  Response
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>  sizeof($results),
               'Results'    =>$results
        );
        $this->response($data);
        
    }
    
    //----------------------------------------------------//
    //                                                    //
    //  APIs Restaurant                                   //
    //                                                    //
    //----------------------------------------------------//

    /**
     * 
     *  API search Restaurant by Name
     * 
     *  Menthod: GET
     * 
     *  @param int    $limit
     *  @param int    $page
     *  @param String $key
     * 
     *  Response: JSONObject
     * 
     */
    public function search_restaurant_by_name_get() {
        
        //  Get param from client
        $limit = $this->get("limit");
        $page = $this->get("page");

        //  Key search
        $key = $this->get('key');
        
        //  Query
        $where = array(RestaurantEnum::NAME => new MongoRegex('/'.$key.'/i'));
        $list_restaurant = $this->RestaurantModel->searchRestaurant($where);
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        if (sizeof($list_restaurant) > 0){
            
            foreach ($list_restaurant as $restaurant){
                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];
                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                if($interval_expired >=0 && $is_delete == 0){

                    $count ++;

                    if(($count) >= $position_start_get && ($count) <= $position_end_get){

                        //  Create JSONObject Restaurant
                        $jsonobject = array( 

                            RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                            RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                            RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                            RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],
                            RestaurantEnum::NAME                       => $restaurant['name'],
							RestaurantEnum::AVATAR                     => $restaurant['avatar'],

                            RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],
                            RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($restaurant['_id']->{'$id'}),
                            RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),

							RestaurantEnum::FAVOURITE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::FAVOURITE_TYPE,   $restaurant['favourite_list']),
							RestaurantEnum::PRICE_PERSON_LIST      		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PRICE_PERSON,   $restaurant['price_person_list']),
							RestaurantEnum::CULINARY_STYLE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::CULINARY_STYLE,   $restaurant['culinary_style_list']),
							
                            RestaurantEnum::NUMBER_LIKE                => 0,
                            RestaurantEnum::NUMBER_SHARE               => 0,

                            RestaurantEnum::RATE_SERVICE               => $this->RestaurantModel->getRateService(),
                            RestaurantEnum::RATE_LANDSCAPE             => $this->RestaurantModel->getRateLandscape(),
                            RestaurantEnum::RATE_TASTE                 => $this->RestaurantModel->getRateTaste(),
                            RestaurantEnum::RATE_PRICE                 => $this->RestaurantModel->getRatePrice(),

                            RestaurantEnum::ADDRESS                    => $restaurant['address'],
                            RestaurantEnum::CITY                       => $restaurant['city'],
                            RestaurantEnum::DISTRICT                   => $restaurant['district'],
                            RestaurantEnum::EMAIL                      => $restaurant['email'],
                            RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'] 

                        );

                        $results[] = $jsonobject;
                    }
                }
            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
    }
    
    /**
     * 
     *  API search Restaurant by Id of Base colleciont
     * 
     *  Menthod: GET
     * 
     *  @param int    $limit
     *  @param int    $page
     *  @param String $key: id of FAVOURITE, PRICE_PERSON, MODE_USE, PAYMENT_TYPE, LANDSCAPE_LIST, OTHER_CRITERIA
     * 
     *  Response: JSONObject
     * 
     */
    public function search_restaurant_by_id_base_collection_get() {
        
        //  Get param from client
        $limit = $this->get("limit");
        $page  = $this->get("page");

        //  Field search
        $field = $this->get('field');
        //  Key search
        $key  = $this->get('key');
        
        //  Query
        $where = array($field => array('$in' => array($key)) );
        $list_restaurant = $this->RestaurantModel->searchRestaurant($where);
        
        //  End
        $position_end_get   = ($page == 1) ? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1) ? $page : ( $position_end_get - ($limit - 1) );
        
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        if (sizeof($list_restaurant) > 0){
            
            foreach ($list_restaurant as $restaurant){
                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];
                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                if($interval_expired >=0 && $is_delete == 0){

                    $count ++;

                    if(($count) >= $position_start_get && ($count) <= $position_end_get){

                        //  Create JSONObject Restaurant
                        $jsonobject = array( 

                            RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                            RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                            RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                            RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],
                            RestaurantEnum::NAME                       => $restaurant['name'],
							RestaurantEnum::AVATAR                     => $restaurant['avatar'],

                            RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],
                            RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($restaurant['_id']->{'$id'}),
                            RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),

							RestaurantEnum::FAVOURITE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::FAVOURITE_TYPE,   $restaurant['favourite_list']),
							RestaurantEnum::PRICE_PERSON_LIST      		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PRICE_PERSON,   $restaurant['price_person_list']),
							RestaurantEnum::CULINARY_STYLE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::CULINARY_STYLE,   $restaurant['culinary_style_list']),
							
                            RestaurantEnum::NUMBER_LIKE                => 0,
                            RestaurantEnum::NUMBER_SHARE               => 0,

                            RestaurantEnum::RATE_SERVICE               => $this->RestaurantModel->getRateService(),
                            RestaurantEnum::RATE_LANDSCAPE             => $this->RestaurantModel->getRateLandscape(),
                            RestaurantEnum::RATE_TASTE                 => $this->RestaurantModel->getRateTaste(),
                            RestaurantEnum::RATE_PRICE                 => $this->RestaurantModel->getRatePrice(),

                            RestaurantEnum::ADDRESS                    => $restaurant['address'],
                            RestaurantEnum::CITY                       => $restaurant['city'],
                            RestaurantEnum::DISTRICT                   => $restaurant['district'],
                            RestaurantEnum::EMAIL                      => $restaurant['email'],
                            RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],

                        );

                        $results[] = $jsonobject;
                    }
                }
            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
    }
    
    /**
     * 
     *  API search Restaurant by Coupon
     * 
     *  Menthod: GET
     * 
     *  @param int    $limit
     *  @param int    $page
     *  @param String $key
     * 
     *  Response: JSONObject
     * 
     */
    public function search_restaurant_by_coupon_get() {
        
        //  Get param from client
        $limit = $this->get("limit");
        $page = $this->get("page");

        //  Key search
        $key = $this->get('key');
        
        //  Query
        $where = array(RestaurantEnum::NAME => new MongoRegex('/'.$key.'/i'));
        $list_restaurant = $this->RestaurantModel->searchRestaurant($where);
        
        //  End
        $position_end_get   = ($page == 1) ? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1) ? $page : ( $position_end_get - ($limit - 1) );
        
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        if (sizeof($list_restaurant) > 0){
            
            foreach ($list_restaurant as $restaurant){
                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];
                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                //  Is coupon
                $is_coupon = ($restaurant['id_coupon'] == null) ? 0 : 1;
                
                if($interval_expired >=0 && $is_delete == 0 && $is_coupon == 1){

                    $count ++;

                    if(($count) >= $position_start_get && ($count) <= $position_end_get){

                        //  Create JSONObject Restaurant
                        $jsonobject = array( 

                            RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                            RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                            RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                            RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],

                            RestaurantEnum::NAME                       => $restaurant['name'],
                            RestaurantEnum::RATE_POINT                 => $restaurant['rate_point'],
                            RestaurantEnum::ADDRESS                    => $restaurant['address'],
                            RestaurantEnum::CITY                       => $restaurant['city'],
                            RestaurantEnum::DISTRICT                   => $restaurant['district'],
                            RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],
                            RestaurantEnum::LINK_TO                    => $restaurant['link_to'],
                            RestaurantEnum::PHONE_NUMBER               => $restaurant['phone_number'],
                            RestaurantEnum::WORKING_TIME               => $restaurant['working_time'],
                            RestaurantEnum::STATUS_ACTIVE              => $restaurant['status_active'],
                            RestaurantEnum::FAVOURITE_LIST             => $restaurant['favourite_list'],
                            RestaurantEnum::PRICE_PERSON_LIST          => $restaurant['price_person_list'],
                            RestaurantEnum::CULINARY_STYLE_LIST        => $restaurant['culinary_style_list'],
                            RestaurantEnum::MODE_USE_LIST              => $restaurant['mode_use_list'],
                            RestaurantEnum::PAYMENT_TYPE_LIST          => $restaurant['payment_type_list'],
                            RestaurantEnum::LANDSCAPE_LIST             => $restaurant['landscape_list'],
                            RestaurantEnum::OTHER_CRITERIA_LIST        => $restaurant['other_criteria_list'],
                            RestaurantEnum::INTRODUCE                  => $restaurant['introduce'],
                            RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],

                            RestaurantEnum::START_DATE                 => $restaurant['start_date'],
                            RestaurantEnum::END_DATE                   => $restaurant['end_date'],

                            CommonEnum::CREATED_DATE                   => $restaurant['created_date'] 

                        );

                        $results[] = $jsonobject;
                    }
                }
            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
    }
    
    /**
     * 
     *  API search Restaurant by Meal type
     * 
     *  Menthod: GET
     * 
     *  @param int    $limit
     *  @param int    $page
     *  @param String $key
     * 
     *  Response: JSONObject
     * 
     */
    public function search_restaurant_by_meal_get() {
        
        //  Get param from client
        $limit = $this->get("limit");
        $page = $this->get("page");

		//
        //  Edit field number_view: +1
        //
        
		
        //  Key search
        $key = $this->get('key');
        
        //  Query find collection Menu Dish by name
        $where = array(MenuDishEnum::DISH_LIST.'.'.MenuDishEnum::NAME => new MongoRegex('/'.$key.'/i'));
        $list_menu_dish = $this->RestaurantModel->searchMenuDish($where);
        
        //  List restaurant
        $list_restaurant = array();
        
        if (sizeof($list_menu_dish) > 0){
            
            foreach ($list_menu_dish as $menu_dish){

                $restaurant = $this->RestaurantModel->getRestaurantById($menu_dish['id_restaurant']);
                
                if($restaurant != null){
                    $list_restaurant[] = $restaurant;
                }
            }
        }
        
        //  End
        $position_end_get   = ($page == 1) ? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1) ? $page : ( $position_end_get - ($limit - 1) );
        
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        if (sizeof($list_restaurant) > 0){
            
            //  Current date
            $current_date = $this->CommonModel->getCurrentDate();
            
            foreach ($list_restaurant as $array_restaurant){
                
                foreach ($array_restaurant as $restaurant){
                    //  End date
                    $end_date = $restaurant['end_date'];
                    //  Get interval expired
                    $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                    //  Is delete
                    $is_delete = $restaurant['is_delete'];

                    if($interval_expired >=0 && $is_delete == 0){

                        $count ++;

                        if(($count) >= $position_start_get && ($count) <= $position_end_get){

                            //  Create JSONObject Restaurant
                            $jsonobject = array( 

                                RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                                RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                                RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                                RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],
								RestaurantEnum::AVATAR					   => $restaurant['avatar'],
                                RestaurantEnum::NAME                       => $restaurant['name'],
                                RestaurantEnum::ADDRESS                    => $restaurant['address'],
                                RestaurantEnum::CITY                       => $restaurant['city'],
                                RestaurantEnum::DISTRICT                   => $restaurant['district'],
                                RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                                RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],
                                RestaurantEnum::LINK_TO                    => $restaurant['link_to'],
                                RestaurantEnum::PHONE_NUMBER               => $restaurant['phone_number'],
                                RestaurantEnum::WORKING_TIME               => $restaurant['working_time'],
								
                                RestaurantEnum::STATUS_ACTIVE              => $restaurant['status_active'],
								
                                //RestaurantEnum::FAVOURITE_LIST             => $restaurant['favourite_list'],
                                //RestaurantEnum::PRICE_PERSON_LIST          => $restaurant['price_person_list'],
                                //RestaurantEnum::CULINARY_STYLE_LIST        => $restaurant['culinary_style_list'],
								
								RestaurantEnum::FAVOURITE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::FAVOURITE_TYPE,   $restaurant['favourite_list']),
							    RestaurantEnum::PRICE_PERSON_LIST      		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PRICE_PERSON,   $restaurant['price_person_list']),
							    RestaurantEnum::CULINARY_STYLE_LIST    		   => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::CULINARY_STYLE,   $restaurant['culinary_style_list']),
								
								
                                RestaurantEnum::MODE_USE_LIST              => $restaurant['mode_use_list'],
                                RestaurantEnum::PAYMENT_TYPE_LIST          => $restaurant['payment_type_list'],
                                RestaurantEnum::LANDSCAPE_LIST             => $restaurant['landscape_list'],
                                RestaurantEnum::OTHER_CRITERIA_LIST        => $restaurant['other_criteria_list'],
                                RestaurantEnum::INTRODUCE                  => $restaurant['introduce'],
								
                                RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],
								RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($restaurant['_id']->{'$id'}),
								RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),
										
								RestaurantEnum::NUMBER_LIKE                => 0,
								RestaurantEnum::NUMBER_SHARE               => 0,
										
								RestaurantEnum::RATE_SERVICE               => $this->RestaurantModel->getRateService(),
								RestaurantEnum::RATE_LANDSCAPE             => $this->RestaurantModel->getRateLandscape(),
								RestaurantEnum::RATE_TASTE                 => $this->RestaurantModel->getRateTaste(),
								RestaurantEnum::RATE_PRICE                 => $this->RestaurantModel->getRatePrice(),

                                RestaurantEnum::START_DATE                 => $restaurant['start_date'],
                                RestaurantEnum::END_DATE                   => $restaurant['end_date'],

                                CommonEnum::CREATED_DATE                   => $restaurant['created_date'] 

                            );

                            $results[] = $jsonobject;
                        }
                    }
                }
                
            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
    }
    
    /**
     * API Get Restaurant by Id
     * 
     * Menthod: GET
     * 
     * @param String $id
     * 
     * Response: JSONObject
     * 
     */
    public function get_detail_restaurant_get() {
        
        //  Get param from client
        $id = $this->get('id');
        
        //
        //  Edit field number_view: +1
        //
        $this->CommonModel->editSpecialField(RestaurantEnum::COLLECTION_RESTAURANT, $id, array('$inc' => array('number_view' => 1) ) );
        
        //  Get collection 
        $get_collection = $this->RestaurantModel->getRestaurantById($id);
        
        $error = $this->RestaurantModel->getError();

        if($error == null){
            //  Array object restaurant
            $results = array();

            foreach ($get_collection as $restaurant){

                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];

                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                if($interval_expired >= 0 && $is_delete == 0){


                    //  Create JSONObject Restaurant
                    $jsonobject = array( 

                        RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                        RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                        RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                        RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],
                        RestaurantEnum::NAME                       => $restaurant['name'],
                                
                        RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],
                        RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($id),
                        RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),
                                
                        RestaurantEnum::NUMBER_LIKE                => 0,
                        RestaurantEnum::NUMBER_SHARE               => 0,
                                
                        RestaurantEnum::RATE_SERVICE               => $this->RestaurantModel->getRateService(),
                        RestaurantEnum::RATE_LANDSCAPE             => $this->RestaurantModel->getRateLandscape(),
                        RestaurantEnum::RATE_TASTE                 => $this->RestaurantModel->getRateTaste(),
                        RestaurantEnum::RATE_PRICE                 => $this->RestaurantModel->getRatePrice(),
                                
                        RestaurantEnum::ADDRESS                    => $restaurant['address'],
                        RestaurantEnum::CITY                       => $restaurant['city'],
                        RestaurantEnum::DISTRICT                   => $restaurant['district'],
                        RestaurantEnum::EMAIL                      => $restaurant['email'],
                        RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                        RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],
                        RestaurantEnum::LINK_TO                    => $restaurant['link_to'],
                        RestaurantEnum::PHONE_NUMBER               => $restaurant['phone_number'],
                        RestaurantEnum::WORKING_TIME               => $restaurant['working_time'],
                        RestaurantEnum::STATUS_ACTIVE              => $restaurant['status_active'],
                        RestaurantEnum::FAVOURITE_LIST             => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::FAVOURITE_TYPE,   $restaurant['favourite_list']),
                        RestaurantEnum::PRICE_PERSON_LIST          => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PRICE_PERSON,     $restaurant['price_person_list']),
                        RestaurantEnum::CULINARY_STYLE_LIST        => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::CULINARY_STYLE,   $restaurant['culinary_style_list']),
                        RestaurantEnum::MODE_USE_LIST              => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::MODE_USE,         $restaurant['mode_use_list']),
                        RestaurantEnum::PAYMENT_TYPE_LIST          => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PAYMENT_TYPE,     $restaurant['payment_type_list']),
                        RestaurantEnum::LANDSCAPE_LIST             => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::LANDSCAPE,        $restaurant['landscape_list']),
                        RestaurantEnum::OTHER_CRITERIA_LIST        => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::OTHER_CRITERIA,   $restaurant['other_criteria_list']),
                        RestaurantEnum::INTRODUCE                  => $restaurant['introduce'],
                        RestaurantEnum::START_DATE                 => $restaurant['start_date'],
                        RestaurantEnum::END_DATE                   => $restaurant['end_date'],
                        RestaurantEnum::DESC                       => $restaurant['desc'],        
                        CommonEnum::CREATED_DATE                   => $restaurant['created_date'] 

                    );

                    $results[] = $jsonobject;


                }


            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );
            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>  $error
            );
            $this->response($data);
        }
        
    }
    
    /**
     * 
     *  API get All Restaurant approval show carousel
     * 
     *  Menthod: GET
     * 
     *  @param int $limit
     *  @param int $page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_all_restaurant_approval_show_carousel_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        $list_order_by_restaurant = $this->RestaurantModel->orderByRestaurant( -1 );
        $error = $this->RestaurantModel->getError();
        if($error == null){

            //  Array object restaurant
            $results = array();

            //  Count object restaurant
            $count = 0;

            foreach ($list_order_by_restaurant as $restaurant){
                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];

                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                $approval_show_carousel = $restaurant['approval_show_carousel'];
                
                if( ($interval_expired >= 0 && $is_delete == 0) && $approval_show_carousel == 1){

                    $count ++;

                    if(($count) >= $position_start_get && ($count) <= $position_end_get){

                        //  Create JSONObject Restaurant
                        $jsonobject = array( 

                            RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                            RestaurantEnum::NAME                       => $restaurant['name'],
                            RestaurantEnum::ADDRESS                    => $restaurant['address'].', '.$restaurant['district'].', '.$restaurant['city'],
                            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],
                            RestaurantEnum::LINK_TO                    => $restaurant['link_to'],

                        );

                        $results[] = $jsonobject;

                    }

                }


            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );


            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error,
            );
            $this->response($data);
        }
        
    }
    
    /**
     * 
     *  API get Order By DESC Restaurant
     * 
     *  Menthod: GET
     * 
     *  @param int $limit
     *  @param int $page
     *  @param int $order_by
     * 
     *  Response: JSONObject
     * 
     */
    public function get_order_by_restaurant_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
        
        $order_by = ($this->get("order_by") == null)? 1 : (int)$this->get("order_by");
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        $list_order_by_restaurant = $this->RestaurantModel->orderByRestaurant( $order_by );
        $error = $this->RestaurantModel->getError();
        if($error == null){

            //  Array object restaurant
            $results = array();

            //  Count object restaurant
            $count = 0;

            foreach ($list_order_by_restaurant as $restaurant){
                //  Current date
                $current_date = $this->CommonModel->getCurrentDate();

                //  End date
                $end_date = $restaurant['end_date'];

                //  Get interval expired
                $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

                //  Is delete
                $is_delete = $restaurant['is_delete'];

                if($interval_expired >= 0 && $is_delete == 0){

                    $count ++;

                    if(($count) >= $position_start_get && ($count) <= $position_end_get){

                        //  Create JSONObject Restaurant
                        $jsonobject = array( 

                            RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                            RestaurantEnum::ID_USER                    => $restaurant['id_user'],
                            RestaurantEnum::ID_MENU_DISH               => $restaurant['id_menu_dish'],
                            RestaurantEnum::ID_COUPON                  => $restaurant['id_coupon'],

                            RestaurantEnum::NAME                       => $restaurant['name'],
                            RestaurantEnum::RATE_POINT                 => $restaurant['rate_point'],
                            RestaurantEnum::ADDRESS                    => $restaurant['address'],
                            RestaurantEnum::CITY                       => $restaurant['city'],
                            RestaurantEnum::DISTRICT                   => $restaurant['district'],
                            RestaurantEnum::IMAGE_INTRODUCE_LINK       => $restaurant['image_introduce_link'],
                            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $restaurant['image_carousel_link'],
                            RestaurantEnum::LINK_TO                    => $restaurant['link_to'],
                            RestaurantEnum::PHONE_NUMBER               => $restaurant['phone_number'],
                            RestaurantEnum::WORKING_TIME               => $restaurant['working_time'],
                            RestaurantEnum::STATUS_ACTIVE              => $restaurant['status_active'],
                            RestaurantEnum::FAVOURITE_LIST             => $restaurant['favourite_list'],
                            RestaurantEnum::PRICE_PERSON_LIST          => $restaurant['price_person_list'],
                            RestaurantEnum::CULINARY_STYLE_LIST        => $restaurant['culinary_style_list'],
                            RestaurantEnum::MODE_USE_LIST              => $restaurant['mode_use_list'],
                            RestaurantEnum::PAYMENT_TYPE_LIST          => $restaurant['payment_type_list'],
                            RestaurantEnum::LANDSCAPE_LIST             => $restaurant['landscape_list'],
                            RestaurantEnum::OTHER_CRITERIA_LIST        => $restaurant['other_criteria_list'],
                            RestaurantEnum::INTRODUCE                  => $restaurant['introduce'],
                            RestaurantEnum::NUMBER_VIEW                => $restaurant['number_view'],

                            RestaurantEnum::START_DATE                 => $restaurant['start_date'],
                            RestaurantEnum::END_DATE                   => $restaurant['end_date'],

                            CommonEnum::CREATED_DATE                   => $restaurant['created_date'] 

                        );

                        $results[] = $jsonobject;

                    }

                }


            }
            //  Response
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Total'      =>  sizeof($results),
                   'Results'    =>$results
            );


            $this->response($data);
        }
        else{
            //  Response
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error,
            );
            $this->response($data);
        }
        
    }
    
    /**
     * 
     *  API get Newest Restaurant
     * 
     *  Menthod: GET
     * 
     *  @param int $limit
     *  @param int $page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_newest_restaurant_list_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection restaurant
        $collection_name = RestaurantEnum::COLLECTION_RESTAURANT;
        $list_restaurant = $this->CommonModel->getCollection($collection_name);
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        
        foreach ($list_restaurant as $restaurant){
            //  Get created date
            $created_date = $restaurant['created_date'];

            //  Current date
            $current_date = $this->CommonModel->getCurrentDate();

            //  End date
            $end_date = $restaurant['end_date'];

            //  Get interval expired
            $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

            //  Is delete
            $is_delete = $restaurant['is_delete'];
            
            //  Get interval
            $interval = $this->CommonModel->getInterval($created_date, $current_date);
//            var_dump($created_date);
//            var_dump($current_date);
//            var_dump($interval);
            if( (($interval <= CommonEnum::INTERVAL_NEWST_RESTAURANT) && $interval >=0) && ($interval_expired >=0 && $is_delete == 0) ){
                
                $count ++ ;
                
                if(($count) >= $position_start_get && ($count) <= $position_end_get){
                    
                    //  Create JSONObject Restaurant
                    $jsonobject = array( 

                        RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                        RestaurantEnum::NAME                       => $restaurant['name'],
                        RestaurantEnum::DESC                       => $restaurant['desc'],
                        RestaurantEnum::AVATAR                     => $restaurant['avatar'],
                        RestaurantEnum::ADDRESS                    => $restaurant['address'].', '.$restaurant['district'].', '.$restaurant['city'],
                        RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($restaurant['_id']->{'$id'}),
                        RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),
                        RestaurantEnum::NUMBER_LIKE                => 0


                    );
                
                    $results[] = $jsonobject;
                    
                    $this->RestaurantModel->setRateService(0);
                    $this->RestaurantModel->setRateLandscape(0);
                    $this->RestaurantModel->setRateTaste(0);
                    $this->RestaurantModel->setRatePrice(0);
                    
                }
            }
            
        }
        //  Response
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>  sizeof($results),
               'Results'    =>$results
        );
        $this->response($data);
    }
    
    /**
     * 
     *  API get Order Restaurant
     * 
     *  Menthod: GET
     * 
     *  @param int $limit
     *  @param int $page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_orther_restaurant_list_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
                
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection restaurant
        $collection_name = RestaurantEnum::COLLECTION_RESTAURANT;
        $list_restaurant = $this->CommonModel->getCollection($collection_name);
        //  Array object restaurant
        $results = array();
        
        //  Count object restaurant
        $count = 0;
        
        //  Count result
        $count_result = 0;
        
        foreach ($list_restaurant as $restaurant){
            //  Get created date
            $created_date = $restaurant['created_date'];

            //  Current date
            $current_date = $this->CommonModel->getCurrentDate();

            //  End date
            $end_date = $restaurant['end_date'];

            //  Get interval expired
            $interval_expired = $this->CommonModel->getInterval($current_date, $end_date);

            //  Is delete
            $is_delete = $restaurant['is_delete'];
            
            //  Get interval
            $interval = $this->CommonModel->getInterval($created_date, $current_date);
            
            if( ($interval > CommonEnum::INTERVAL_NEWST_RESTAURANT) && ($interval_expired >=0 && $is_delete == 0) ){
                
                $count++;
                
                
                
                if(($count) >= $position_start_get && ($count) <= $position_end_get){
                    
                    $count_result ++ ;
                
                    //  Create JSONObject Restaurant
                    $jsonobject = array( 

                        RestaurantEnum::ID                         => $restaurant['_id']->{'$id'},
                        RestaurantEnum::NAME                       => $restaurant['name'],
                        RestaurantEnum::DESC                       => $restaurant['desc'],
                        RestaurantEnum::AVATAR                     => $restaurant['avatar'],
                        RestaurantEnum::ADDRESS                    => $restaurant['address'].', '.$restaurant['district'].', '.$restaurant['city'],
                        RestaurantEnum::NUMBER_ASSESSMENT          => $this->RestaurantModel->countAssessmentForRestaurant($restaurant['_id']->{'$id'}),
                        RestaurantEnum::RATE_POINT                 => $this->RestaurantModel->getRatePoint(),
                        RestaurantEnum::NUMBER_LIKE                => 0


                    );
                
                    $results[] = $jsonobject;
                    
                    $this->RestaurantModel->setRateService(0);
                    $this->RestaurantModel->setRateLandscape(0);
                    $this->RestaurantModel->setRateTaste(0);
                    $this->RestaurantModel->setRatePrice(0);
                    
                }
            }
            
        }
        
        //  Response
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>sizeof($results),
               'Results'    =>$results
        );

        $this->response($data);
    }
    
    
    /**
     * 
     * API update Restaurant
     * 
     * Menthod: POST
     * 
     * $action: insert | edit | delete
        
     * @param String $id
     * @param String $id_user
     * @param String $id_menu_dish
     * @param String $id_coupon
     * @param String $name
     * @param int    $rate_point
     * @param String $address
     * @param String $city
     * @param String $district
     * @param String $image_introduce_link
     * @param String $image_carousel_link
     * @param String $link_to
     * @param String $phone_number
     * @param String $working_time
     * @param String $status_active
     * @param String $favourite_list
     * @param String $price_person_list
     * @param String $culinary_style_list
     * @param String $mode_use_list
     * @param String $payment_type_list
     * @param String $landscape_list
     * @param String $other_criteria_list
     * @param String $introduce
     * @param int    $number_view
     * @param String $start_date
     * @param String $end_date
     * @param String $created_date
     * @param int    $is_delete
     * 
     *  Response: JSONObject
     * 
     */
    public function update_restaurant_post(){
        
        //  Get param from client
        $action                  = $this->post('action'); 
        
        $id                      = $this->post('id'); 
        $id_user                 = $this->post('id_user');
        $id_menu_dish            = $this->post('id_menu_dish');
        $id_coupon               = $this->post('id_coupon');
        $name                    = $this->post('name');
        $rate_point              = $this->post('rate_point');
        $address                 = $this->post('address');
        $city                    = $this->post('city');
        $district                = $this->post('district');
        $image_introduce_link    = $this->post('image_introduce_link');
        $image_carousel_link     = $this->post('image_carousel_link');
        $link_to                 = $this->post('link_to');
        $phone_number            = $this->post('phone_number');
        $working_time            = $this->post('working_time');
        $status_active           = $this->post('status_active');
        $favourite_list          = $this->post('favourite_list');
        $price_person_list       = $this->post('price_person_list');
        $culinary_style_list     = $this->post('culinary_style_list');
        $mode_use_list           = $this->post('mode_use_list');
        $payment_type_list       = $this->post('payment_type_list');
        $landscape_list          = $this->post('landscape_list');
        $other_criteria_list      = $this->post('other_criteria');
        $introduce               = $this->post('introduce');
        $number_view             = $this->post('number_view');
        $start_date              = $this->post('start_date');
        $end_date                = $this->post('end_date');
        $created_date            = $this->post('created_date');
        $is_delete               = $this->post('is_delete');
        
        (int)$is_insert = strcmp( strtolower($action), CommonEnum::INSERT );
        
        $array_value = array( 

            RestaurantEnum::ID                         => $id,
            RestaurantEnum::ID_USER                    => $id_user,
            RestaurantEnum::ID_MENU_DISH               => $id_menu_dish,
            RestaurantEnum::ID_COUPON                  => $id_coupon,

            RestaurantEnum::NAME                       => $name,
            RestaurantEnum::RATE_POINT                 => (int)$rate_point,
            RestaurantEnum::ADDRESS                    => $address,
            RestaurantEnum::CITY                       => $city,
            RestaurantEnum::DISTRICT                   => $district,
            RestaurantEnum::IMAGE_INTRODUCE_LINK       => ($image_introduce_link != null ) ? explode(CommonEnum::MARK, $image_introduce_link): array(),
            RestaurantEnum::IMAGE_CAROUSEL_LINK        => $image_carousel_link,
            RestaurantEnum::LINK_TO                    => $link_to,
            RestaurantEnum::PHONE_NUMBER               => $phone_number,
            RestaurantEnum::WORKING_TIME               => $working_time,
            RestaurantEnum::STATUS_ACTIVE              => $status_active,
            RestaurantEnum::FAVOURITE_LIST             => ($favourite_list != null ) ? explode(CommonEnum::MARK, $favourite_list): array(),
            RestaurantEnum::PRICE_PERSON_LIST          => ($price_person_list != null ) ? explode(CommonEnum::MARK, $price_person_list): array(),
            RestaurantEnum::CULINARY_STYLE_LIST        => ($culinary_style_list != null ) ? explode(CommonEnum::MARK, $culinary_style_list): array(),
            
            RestaurantEnum::MODE_USE_LIST              => ($mode_use_list != null ) ? explode(CommonEnum::MARK, $mode_use_list): array(),
            RestaurantEnum::PAYMENT_TYPE_LIST          => ($payment_type_list != null ) ? explode(CommonEnum::MARK, $payment_type_list): array(),
            RestaurantEnum::LANDSCAPE_LIST             => ($landscape_list != null ) ? explode(CommonEnum::MARK, $landscape_list): array(),
            RestaurantEnum::OTHER_CRITERIA_LIST        => ($other_criteria_list != null ) ? explode(CommonEnum::MARK, $other_criteria_list): array(),
            
            RestaurantEnum::INTRODUCE                  => $introduce,
            RestaurantEnum::NUMBER_VIEW                => (int)$number_view,

            RestaurantEnum::START_DATE                 => $start_date,
            RestaurantEnum::END_DATE                   => $end_date,

            CommonEnum::CREATED_DATE                   => ($is_insert == 0 ) ? $this->CommonModel->getCurrentDate(): $created_date,
            RestaurantEnum::IS_DELETE                  => ($is_insert == 0 ) ? RestaurantEnum::DEFAULT_IS_DELETE : (int)$is_delete
                
        );
        
        $this->RestaurantModel->updateRestaurant($action, $id, $array_value);
        $error = $this->RestaurantModel->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
            );
            $this->response($data);
        }
        else{
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error
            );
            $this->response($data);
        }
        
    }
    
    
    
    //------------------------------------------------------
    //                                                     /
    //  APIs Coupon                                        /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     *  API get Coupon
     * 
     *  Menthod: GET
     * 
     *  @param $limit
     *  @param $page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_coupon_list_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
                
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection coupon
        $collection_name = CouponEnum::COLLECTION_NAME;
        $list_coupon = $this->CommonModel->getCollection($collection_name);
        
        //  Array object coupon
        $results = array();
        
        //  Count object coupon
        $count = 0;
        
        //  Count result
        $count_result = 0;
        
        foreach ($list_coupon as $coupon){
            
            //  Get deal to date
            $deal_to_date = $coupon['deal_to_date'];

            //  Get now date
            $now_date = new DateTime();

            //  Get interval
            $interval = $this->CommonModel->getInterval($now_date->format('d-m-Y H:i:s'), $deal_to_date);
            
            if($interval >= 0){
                
                $count++;
                
                if(($count) >= $position_start_get && ($count) <= $position_end_get){
                    
                    $count_result ++ ;
                
                    //  Create JSONObject Coupon
                    $jsonobject = array( 

                               CouponEnum::ID               => $coupon['_id']->{'$id'},
                               CouponEnum::COUPON_VALUE     => $coupon['coupon_value'],
                               CouponEnum::DEAL_TO_DATE     => $coupon['deal_to_date'],
                               CouponEnum::RESTAURANT_NAME  => $coupon['restaurant_name'],
                               CouponEnum::CONTENT          => $coupon['content'],
                               CouponEnum::IMAGE_LINK       => CouponEnum::BASE_IMAGE_LINK.$coupon['image_link'],
                               CouponEnum::LINK_TO          => $coupon['link_to']
                                       
                               );

                    $results[] = $jsonobject;
                    
                }
            }
            
        }
        
        //  Response
//        $data = array();
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>$count_result,
               'Results'    =>$results
        );

        $this->response($data);
    }
    
    /**
     * 
     * API insert Coupon
     * 
     * Menthod: POST
     * 
     * @param int $coupon_value
     * @param String $deal_to_date
     * @param String $restaurant_name
     * @param String $content
     * @param String $image_link
     * @param String $link_to
     * 
     *  Response: JSONObject
     * 
     */
    public function insert_coupon_post(){
        
        //  Get param from client;
         $coupon_value          = $this->post('coupon_value');
         $deal_to_date          = $this->post('deal_to_date');
         $restaurant_name       = $this->post('restaurant_name');
         $content               = $this->post('content');
         $image_link            = $this->post('image_link');
         $link_to               = $this->post('link_to');
         
        //  Resulte
        $resulte = array();
        
        if($coupon_value == null || $deal_to_date == null || $restaurant_name == null || 
           $content == null || $image_link == null || $link_to == null){
           
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      => 'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->insertCoupon($coupon_value, $deal_to_date, $restaurant_name, 
                                                           $content, $image_link, $link_to);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
     * 
     * API upadate Coupon
     * 
     * Menthod: POST
     * 
     * @param String $id
     * @param int $coupon_value
     * @param String $deal_to_date
     * @param String $restaurant_name
     * @param String $content
     * @param String $image_link
     * @param String $link_to
     * 
     *  Response: JSONObject
     * 
     */
    public function update_coupon_post(){
        
        //  Get param from client
         $id                    = $this->post('id');
         $coupon_value          = $this->post('coupon_value');
         $deal_to_date          = $this->post('deal_to_date');
         $restaurant_name       = $this->post('restaurant_name');
         $content               = $this->post('content');
         $image_link            = $this->post('image_link');
         $link_to               = $this->post('link_to');
        
        //  Resulte
        $resulte = array();
        
        if($id == null || $coupon_value == null || $deal_to_date == null || $restaurant_name == null || 
           $content == null || $image_link == null || $link_to == null){
           
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      => 'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->updateCoupon($id, $coupon_value, $deal_to_date, $restaurant_name, 
                                                           $content, $image_link, $link_to);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
     * 
     * API delete Coupon
     * 
     * Menthod: POST
     * 
     * @param $id
     * 
     *  Response: JSONObject
     * 
     */
    public function delete_coupon_post(){
        
        //  Get param from client
        $id  = $this->post('id');
        
        //  Resulte
        $resulte = array();
        
        if($id == null){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      => 'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->deleteCoupon($id);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    //------------------------------------------------------
    //                                                     /
    //  APIs Post                                          /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     *  API search Post
     * 
     *  Menthod: GET
     * 
     *  @param int $limit
     *  @param int $page
     *  @param String $key
     * 
     *  Response: JSONObject
     * 
     */    
    public function search_post_get(){
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
        
        //  Key search
        $key = $this->get('key');
        
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        //  Query
        $where = array(PostEnum::TITLE => new MongoRegex('/'.$key.'/i'));
        $list_post = $this->RestaurantModel->searchPost($where);
        
        //  Array object post
        $results = array();
        
        //  Count object post
        $count = 0;
        
        //  Count resulte
        $count_resulte = 0;
        
        foreach ($list_post as $post){
            
            $count++;

            if(($count) >= $position_start_get && ($count) <= $position_end_get){

                $count_resulte ++;

                //  Create JSONObject Post
                $jsonobject = array( 
                    
                           PostEnum::ID                     => $post['_id']->{'$id'},
                           PostEnum::ID_USER                => $post['id_user'],
                           PostEnum::TITLE                  => $post['title'],
                           PostEnum::AVATAR                 => $post['avatar'],
                           PostEnum::ADDRESS                => $post['address'],
                           PostEnum::FAVOURITE_TYPE_LIST    => $post['favourite_type_list'],
                           PostEnum::PRICE_PERSON_LIST      => $post['price_person_list'],
                           PostEnum::CULINARY_STYLE_LIST    => $post['culinary_style'],
                           PostEnum::CONTENT                => $post['content'],
                           PostEnum::NUMBER_VIEW            => $post['number_view'],
                           PostEnum::NOTE                   => $post['note'],
                           PostEnum::AUTHORS                => $post['authors'],
                           CommonEnum::CREATED_DATE         => $post['created_date'],
                           
                           );

                $results[] = $jsonobject;

            }
            
        }
        
        //  Response
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>$count_resulte,
               'Results'    =>$results
        );

        $this->response($data);
    }
    
    /**
     * 
     *  API get Post
     * 
     *  Menthod: GET
     * 
     *  @param $limit
     *  @param $page
     * 
     *  Response: JSONObject
     * 
     */    
    public function get_post_list_get(){
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
                
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        $list_post = $this->RestaurantModel->getAllPost();
//        
        //  Array object post
        $results = array();
        
        //  Count object post
        $count = 0;
        
        //  Count resulte
        $count_resulte = 0;
        
        foreach ($list_post as $post_){
            
			
			
            $count++;

            if(($count) >= $position_start_get && ($count) <= $position_end_get){

                $count_resulte ++;
             
                //  Create JSONObject Post
                $jsonobject = array( 
                    
                           PostEnum::ID                     => $post_['_id']->{'$id'},
                           PostEnum::ID_USER                => $post_['id_user'],
                           PostEnum::TITLE                  => $post_['title'],
                           PostEnum::AVATAR                 => $post_['avatar'],
                           PostEnum::ADDRESS                => $post_['address'],
                           PostEnum::FAVOURITE_TYPE_LIST    => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::FAVOURITE_TYPE,   $post_['favourite_type_list']),
                           PostEnum::PRICE_PERSON_LIST      => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::PRICE_PERSON,   $post_['price_person_list']),
                           PostEnum::CULINARY_STYLE_LIST    => $this->CommonModel->getValueFeildNameBaseCollectionById(CommonEnum::CULINARY_STYLE,   $post_['culinary_style_list']),
                           PostEnum::CONTENT                => $post_['content'],
                           //PostEnum::NUMBER_VIEW            => $post['number_view'],
                           PostEnum::NOTE                   => $post_['note'],
                           PostEnum::AUTHORS                => $post_['authors'],
                           CommonEnum::CREATED_DATE         => $post_['created_date'],
                           
                           );

                $results[] = $jsonobject;

            }
            
        }
        
        //  Response
//        $data = array();
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>$count_resulte,
               'Results'    =>$results
        );

        $this->response($data);
    }
    
    /**
     * 
     * API Update Post
     * 
     * Menthod: POST
     * 
     * @param String $action
     * @param String $id
     * @param String $id_user
     * @param String $title
     * @param String $content
     * @param String $number_view
     * @param String $note
     * @param String $authors
     * 
     * Response: JSONObject
     * 
     */
   public function update_post_post(){
        
        //  Get param from client
        $action                 = $this->post('action');
        
        $id                     = $this->post('id');
        
        $id_user                = $this->post('id_user');
        $title                  = $this->post('title');
        $address                = $this->post('address');
        $favourite_type_list    = $this->post('favourite_type_list');
        $price_person_list      = $this->post('price_person_list');
        $culinary_style_list    = $this->post('culinary_style_list');
		
        $content                = $this->post('content');
        $note                   = $this->post('note');
        $authors                = $this->post('authors');
        
        //  More
        $str_image_post = $this->post('array_image');                   //  image.jpg,image2.png,...
        $array_image_post = explode(CommonEnum::MARK, $str_image_post); //  ['image.jpg', 'image2.png' ,...]
        
        $file_avatar;
        
        $base_path_post = CommonEnum::ROOT.CommonEnum::DIR_POST.$id_user.'/';
        
        //  Create directory $path
        if(!file_exists($base_path_post)){
            mkdir($base_path_post, 0, true);
        }
        
        for($i=0; $i<sizeof($array_image_post); $i++) {
            
            $file_temp = CommonEnum::ROOT.CommonEnum::PATH_TEMP.$array_image_post[$i];
           // var_dump('temp ['.$i.'] = '.$file_temp);
			
            if (file_exists($file_temp)) {
                
                $path_image_post = $base_path_post.$array_image_post[$i];
                
                //  Move file from directory post
                $move_file = $this->CommonModel->moveFileToDirectory($file_temp, $path_image_post);
                
                if($move_file){
					
                    if($i==0){
                        //$file_avatar = str_replace(CommonEnum::ROOT,'' ,$path_image_post);
						$file_avatar=$id_user."/".$array_image_post[$i];
                    }
					else{
					
						var_dump('Temp :'.str_replace(CommonEnum::ROOT, CommonEnum::LOCALHOST ,$file_temp));
						var_dump('Final :'.str_replace(CommonEnum::ROOT, CommonEnum::LOCALHOST ,$path_image_post));
						var_dump('Content :'.$content);
						
						$content=str_replace(str_replace(CommonEnum::ROOT, CommonEnum::LOCALHOST ,$file_temp), 
								str_replace(CommonEnum::ROOT, CommonEnum::LOCALHOST ,$path_image_post),
								$content);
						
					
					}
                    
                }
                
            }
            
        }
        
       (int)$is_insert = strcmp( strtolower($action), CommonEnum::INSERT );
       (int)$is_delete = strcmp( strtolower($action), CommonEnum::DELETE );
        
        $array_value = ($is_delete != 0) ? array(
                        PostEnum::ID_USER               => $id_user,
                        PostEnum::TITLE                 => $title,     
            
                        PostEnum::AVATAR                => $file_avatar,
                        PostEnum::ADDRESS               => $address,
                        PostEnum::FAVOURITE_TYPE_LIST   => explode(CommonEnum::MARK, $favourite_type_list),
                        PostEnum::PRICE_PERSON_LIST     => explode(CommonEnum::MARK, $price_person_list),
                        PostEnum::CULINARY_STYLE_LIST   => explode(CommonEnum::MARK, $culinary_style_list),
            
                        PostEnum::CONTENT               => $content,
                        //PostEnum::NUMBER_VIEW           => ($is_insert == 0) ? PostEnum::DEFAULT_NUMBER_VIEW : (int)$number_view,
                        PostEnum::NOTE                  => $note,
                        PostEnum::AUTHORS               => $authors,
                        CommonEnum::CREATED_DATE        => $this->CommonModel->getCurrentDate()
                ) : array();
        
        $this->RestaurantModel->updatePost($action, $id, $array_value);
        $error = $this->RestaurantModel->getError();
        
        if($error == null){
            $data =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
            );
            $this->response($data);
        }
        else{
            $data =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>$error
            );
            $this->response($data);
        }
        
        
    }
    //------------------------------------------------------
    //                                                     /
    //  APIs Subscribed Email                              /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     *  API get Subscribed Email
     * 
     *  Menthod: GET
     *  @param limit
     *  @param page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_email_list_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
                
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection subscribed_email
        $collection_name = SubscribedEmailEnum::COLLECTION_NAME;
        $list_subscribed_email = $this->RestaurantModel->getCollection($collection_name);
        
        //  Array object subscribed_email
        $results = array();
        
        //  Count object subscribed_email
        $count = 0;
        
        //  Count resulte
        $count_resulte = 0;
        
        foreach ($list_subscribed_email as $subscribed_email){
            
            $count++;

            if(($count) >= $position_start_get && ($count) <= $position_end_get){

                $count_resulte ++;

                //  Create JSONObject Post
                $jsonobject = array( 
                    
                           SubscribedEmailEnum::ID        => $subscribed_email['_id']->{'$id'},
                           SubscribedEmailEnum::EMAIL     => $subscribed_email['email'],
                           
                           );

                $results[] = $jsonobject;

            }
            
        }
        
        //  Response
//        $data = array();
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>$count_resulte,
               'Results'    =>$results
        );

        $this->response($data);
    }
    
     /**
     * 
     *  API insert Subcribed Email
     * 
     *  Menthod: POST
     * 
     *  @param String $email
     * 
     *  Response: JSONObject
     * 
     */
    public function insert_email_post(){
        
        //  Get param from client
        $email = $this->post('email');
        
        //  Resulte
        $resulte = array();
        
        if($email == null){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      => SubscribedEmailEnum::EMAIL.' is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->insertEmail($email);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
     * 
     *  API update Subcribed Email
     * 
     *  Menthod: POST
     * 
     *  @param String $id
     *  @param String $email
     * 
     *  Response: JSONObject
     * 
     */
    public function update_email_post(){
        
        //  Get param from client
        $id = $this->post('id');
        $email = $this->post('email');
        
        //  Resulte
        $resulte = array();
        
        if( $id == null ||$email == null){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->updateEmail($id, $email);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
     * 
     *  API delete Subcribed Email
     * 
     *  Menthod: POST
     * 
     *  @param String $id
     * 
     *  Response: JSONObject
     * 
     */
    public function delete_email_post(){
        
        //  Get param from client
        $id = $this->post('id');
        
        //  Resulte
        $resulte = array();
        
        if( $id == null ){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->deleteEmail($id);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    //------------------------------------------------------
    //                                                     /
    //  APIs Closed Member                                 /
    //                                                     /
    //------------------------------------------------------
    
    /**
     * 
     *  API get Closed Member
     * 
     *  Menthod: GET
     * 
     *  @param limit
     *  @param page
     * 
     *  Response: JSONObject
     * 
     */
    public function get_closed_member_list_get() {
        
        //  Get limit from client
        $limit = $this->get("limit");
        
        //  Get page from client
        $page = $this->get("page");
                
        //  End
        $position_end_get   = ($page == 1)? $limit : ($limit * $page);
        
        //  Start
        $position_start_get = ($page == 1)? $page : ( $position_end_get - ($limit - 1) );
        
        // Get collection subscribed_email
        $collection_name = "closed_member";
        $list_closed_member = $this->RestaurantModel->getCollection($collection_name);
        
        //  Array object closed_member
        $results = array();
        
        //  Count object closed_member
        $count = 0;
        
        //  Count resulte
        $count_resulte = 0;
        
        foreach ($list_closed_member as $closed_member){
            
            $count++;

            if(($count) >= $position_start_get && ($count) <= $position_end_get){

                $count_resulte ++;

                //  Create JSONObject Post
                $jsonobject = array( 
                    
                           ClosedMemberEnum::ID                    => $closed_member['_id']->{'$id'},
                           ClosedMemberEnum::NAME                  => $closed_member['name'],
                           ClosedMemberEnum::IMAGE_LINK            => ClosedMemberEnum::BASE_IMAGE_LINK.$closed_member['image_link'], 
                           ClosedMemberEnum::MEMBER_OF_COMMENTS    => $closed_member['member_of_comments'],
                           ClosedMemberEnum::LINK_TO               => $closed_member['link_to']
                           
                           );

                $results[] = $jsonobject;

            }
            
        }
        
        //  Response
//        $data = array();
        $data =  array(
               'Status'     =>'SUCCESSFUL',
               'Total'      =>$count_resulte,
               'Results'    =>$results
        );

        $this->response($data);
    }
    
    /**
    * 
    *  API insert Closed Member
    * 
    *  Menthod: POST
    * 
    * @param String $name
    * @param String $image_link
    * @param String $member_of_comments
    * @param String $link_to
    * 
    *  Response: JSONObject
    * 
    */
    public function insert_closed_member_post(){
        
        //  Get param from client        
        $name                   = $this->post('name');
        $image_link             = $this->post('image_link');
        $member_of_comments     = $this->post('member_of_comments');
        $link_to                = $this->post('link_to');

        //  Resulte
        $resulte = array();
        
        if( $name == null || $image_link == null || $member_of_comments == null || $link_to == null ){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->insertClosedMember($name, $image_link, $member_of_comments, $link_to);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
    * 
    *  API update Closed Member
    * 
    *  Menthod: POST
    * 
    * @param String $id
    * @param String $name
    * @param String $image_link
    * @param String $member_of_comments
    * @param String $link_to
    * 
    *  Response: JSONObject
    * 
    */
    public function update_closed_member_post(){
        
        //  Get param from client        
        $id                     = $this->post('id');
        $name                   = $this->post('name');
        $image_link             = $this->post('image_link');
        $member_of_comments     = $this->post('member_of_comments');
        $link_to                = $this->post('link_to');
        
        //  Resulte
        $resulte = array();
        
        if( $id == null || $name == null || $image_link == null || $member_of_comments == null || $link_to == null ){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->updateClosedMember($id, $name, $image_link, $member_of_comments, $link_to);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
    /**
     * 
     *  API delete Closed Member
     * 
     *  Menthod: POST
     * 
     *  @param String $id
     * 
     *  Response: JSONObject
     * 
     */
    public function delete_closed_member_post(){
        
        //  Get param from client
        $id = $this->post('id');
        
        //  Resulte
        $resulte = array();
        
        if( $id == null ){
            
            //  Response error
            $resulte =  array(
                   'Status'     =>'FALSE',
                   'Error'      =>'Param is NULL'
            );

            $this->response($resulte);
            
        }else{
            
            $error = $this->RestaurantModel->deleteClosedMember($id);
            
            //  If insert successful
            if( is_null($error) ){
                
                //  Response
                $resulte =  array(
                   'Status'     =>'SUCCESSFUL',
                   'Error'      =>$error
                );

                $this->response($resulte);

            }
            else{
                //  Response error
                $resulte =  array(
                       'Status'     =>'FALSE',
                       'Error'      =>$error
                );

                $this->response($resulte);

            }
        }
        
    }
    
}

?>
