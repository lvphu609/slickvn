<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API_Link_Enum
 *
 * @author phucnguyen
 *///http://192.168.1.147:8181/slickvn/index.php/slick_apis/format/json
class API_Link_Enum { 
  const DOMAIN_NAME = "http://localhost";
  const PORT = "/"; //":8181/";
  const SUB_DOMAIN = "slickvn/index.php/";
  const SUB_DOMAIN_COMMON ="common/common_apis/";
  const SUB_DOMAIN_USER ="user/user_apis/";
  const SUB_DOMAIN_RESTAURANT ="restaurant/restaurant_apis/";
  const FORMAT_JSON = "/format/json";
  const NEWEST_RESTAURANT_API = "get_newest_restaurant_list";
  const ORTHER_RESTAURANT_API = "get_orther_restaurant_list";
  const MEAL_TYPE_LIST_API = "get_base_collection";
  const FAVOURITE_TYPE_API = "get_base_collection";
  const CAROUSEL_API = "get_all_restaurant_approval_show_carousel";
  const PROMOTION_API = "get_coupon_list";
  const POST_API = "get_post_list";
  const DETAIL_RESTAURANT_API="get_detail_restaurant";
  const PRICE_PERSION_API="get_base_collection";
  const CULINARY_STYLE_API="get_base_collection";
  const LINK_RESTAURANT_PROFILE = "slickvn/restaurant_profile/";
  const LINK_IMAGE_POST = "slickvn/posts/";
  




  /*search---------*/
  const SEARCH_MEAL_API="search_restaurant_by_meal";
  
  /*end search----------*/


  //link API restaurant all
   const RESTAURANT_API = "get_order_by_restaurant";
  //link login 
    
   
   
   
   
   /*name collection*/
   const COLLECTION_NAME="?collection_name=";
   const COLLECTION_MEAL_TYPE = "meal_type";
   const COLLECTION_FAVOURITE = "favourite_type";
   const COLLECTION_PRICE_PERSION = "price_person";
   const COLLECTION_CULINARY_STYLE= "culinary_style";
   /*end name collection*/
   
   
    
    
    public static $BASE_API_URL;
    public static $NEWEST_RESTAURANT_URL;
    public static $ORTHER_RESTAURANT_URL;
    public static $MEAL_TYPE_LIST_URL;
    public static $FAVOURITE_TYPE_URL;
    public static $CAROUSEL_URL;
    public static $PROMOTION_URL;
    public static $POST_URL;
    public static $RESTAURANT_URL;
    public static $BASE_API_COMMON_URL;
    public static $BASE_API_USER_URL;
    public static $BASE_API_RESTAURANT_URL;
    public static $DETAIL_RESTAURANT_URL;
    public static $SEARCH_MEAL_URL;
    public static $PRICE_PERSION_URL; 
    public static $CULINARY_STYLE_URL;
    public static $BASE_PROFILE_RESTAURANT_URL;
    public static $BASE_IMAGE_POST_URL;
    
    public static function initialize()
    {  
      /*url*/
      self::$BASE_API_COMMON_URL = self::DOMAIN_NAME.self::PORT.self::SUB_DOMAIN.self::SUB_DOMAIN_COMMON;
      self::$BASE_API_USER_URL = self::DOMAIN_NAME.self::PORT.self::SUB_DOMAIN.self::SUB_DOMAIN_USER;
      self::$BASE_API_RESTAURANT_URL = self::DOMAIN_NAME.self::PORT.self::SUB_DOMAIN.self::SUB_DOMAIN_RESTAURANT;
      self::$BASE_PROFILE_RESTAURANT_URL = self::DOMAIN_NAME.self::PORT.self::LINK_RESTAURANT_PROFILE;
      self::$BASE_IMAGE_POST_URL=self::DOMAIN_NAME.self::PORT.self::LINK_IMAGE_POST;
      /*
       * end url*/
      
      self::$NEWEST_RESTAURANT_URL = self::$BASE_API_RESTAURANT_URL.self::NEWEST_RESTAURANT_API.self::FORMAT_JSON ;              
      self::$ORTHER_RESTAURANT_URL = self::$BASE_API_RESTAURANT_URL.self::ORTHER_RESTAURANT_API.self::FORMAT_JSON ;
      self::$MEAL_TYPE_LIST_URL = self::$BASE_API_COMMON_URL.self::MEAL_TYPE_LIST_API.self::FORMAT_JSON ;
      self::$FAVOURITE_TYPE_URL = self::$BASE_API_COMMON_URL.self::FAVOURITE_TYPE_API.self::FORMAT_JSON ;
      self::$CAROUSEL_URL = self::$BASE_API_RESTAURANT_URL.self::CAROUSEL_API.self::FORMAT_JSON ;
      self::$PROMOTION_URL = self::$BASE_API_RESTAURANT_URL.self::PROMOTION_API.self::FORMAT_JSON ;
      self::$POST_URL = self::$BASE_API_RESTAURANT_URL.self::POST_API.self::FORMAT_JSON ;
      self::$RESTAURANT_URL = self::$BASE_API_RESTAURANT_URL.self::RESTAURANT_API.self::FORMAT_JSON ;
      self::$DETAIL_RESTAURANT_URL = self::$BASE_API_RESTAURANT_URL.self::DETAIL_RESTAURANT_API.self::FORMAT_JSON ;
      self::$PRICE_PERSION_URL = self::$BASE_API_COMMON_URL.self::PRICE_PERSION_API.self::FORMAT_JSON ;
      self::$CULINARY_STYLE_URL = self::$BASE_API_COMMON_URL.self::CULINARY_STYLE_API.self::FORMAT_JSON ;
      
      
      /*search*/
      self::$SEARCH_MEAL_URL = self::$BASE_API_RESTAURANT_URL.self::SEARCH_MEAL_API.self::FORMAT_JSON ;
      
      /*end search*/
       
      
      
      
      
    }
    
    
}



?>
