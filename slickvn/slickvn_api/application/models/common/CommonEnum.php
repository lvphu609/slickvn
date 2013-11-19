<?php

/**
 * 
 *
 * @author Huynh Xinh
 * 
 * 
 */
class CommonEnum {
    
    const _ID                       = '_id';
    const ID                        = 'id';
    const NAME                      = 'name';
    const CREATED_DATE              = 'created_date';
    
    //  NAME BASE COLLECTION
    const MEAL_TYPE                 = 'meal_type';
    const FAVOURITE_TYPE            = 'favourite_type';
    const PAYMENT_TYPE              = 'payment_type';
    const OTHER_CRITERIA            = 'other_criteria';
    const MODE_USE                  = 'mode_use';
    const PRICE_PERSON              = 'price_person';
    const LANDSCAPE                 = 'landscape';
    const CULINARY_STYLE       		= 'culinary_style';
    
    //  ACTION
    const SELECT                    = 'select';
    const INSERT                    = 'insert';
    const EDIT                      = 'edit';
    const DELETE                    = 'delete';
    
    //  MORE
    const INTERVAL_NEWST_RESTAURANT = 7;
    const DOMAIN_NAME               = 'http://localhost/slickvn/slickvn_api/';
    const URL_USER_PROFILE          = 'users_profile/';
    const URL_RESTAURANT_PROFILE    = 'restaurant_profile/';
    
    //  TYPE UPLOAD IMAGE
    const DIR_USER_PROFILE          = 'user_profile/';
    const TYPE_USER_PROFILE         = 'USER_PROFILE';
    
    const DIR_POST                  = 'posts/';
    const TYPE_POST                 = 'POST';
    
    const DIR_RESTAURANT            = 'restaurant_profile/';
    const TYPE_RESTAURANT           = 'RESTAURANT';
    const TYPE_CAROUSEL             = 'carousel/';
    const TYPE_DISH                 = 'dish/';
    const TYPE_INTRODUCE            = 'introduce/';
    
    //  ROOT
    const ROOT                      = './';
    
    const MARK                      = ',';
    
    //  UPLOAD
    const FILE                      = 'file';
    
    //  ACTION OF USER: LOGIN | VISIT | LIKE | SHARE | ASSESSMENT | COMMENT
    const LOGIN                     = 'LOGIN';
    const ASSESSMENT                = 'ASSESSMENT';
    const COMMENT                   = 'COMMENT';
    const VISIT_RESTAURANT          = 'VISIT_RESTAURANT';
    const LIKE_RESTAURANT           = 'LIKE_RESTAURANT';
    const LIKE_ASSESSMENT           = 'LIKE_ASSESSMENT';
    const LIKE_COMMENT              = 'LIKE_COMMENT';
    const SHARE_RESTAURANT          = 'SHARE_RESTAURANT';
    const SHARE_ASSESSMENT          = 'SHARE_ASSESSMENT';
    const SHARE_COMMENT             = 'SHARE_COMMENT';
    
    const LOCALHOST                 = 'http://localhost/slickvn/slickvn_api/';
    const PATH_TEMP                 = 'include/modul_upload/upload_temp/';
    
}

?>