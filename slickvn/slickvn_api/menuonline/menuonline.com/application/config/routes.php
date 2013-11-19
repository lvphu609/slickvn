<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "index_control";
$route['/'] = "index_control";
$route['nha_hang_dang_ky'] = 'restaurant_register_control';
$route['administrator'] = 'administrator/index_administrator_control';
$route['administrator/banner'] = 'administrator/index_administrator_control';
$route['administrator/slide_show'] = 'administrator/slide_show_administrator_control';
$route['administrator/top_food'] = 'administrator/top_food_administrator_control';
$route['administrator/top_restaurant'] = 'administrator/top_restaurant_administrator_control';
$route['administrator/restaurant'] = 'administrator/restaurant_administrator_control';
$route['administrator/user'] = 'administrator/user_administrator_control';
$route['administrator/report'] = 'administrator/report_administrator_control';
$route['mobile'] = 'mobile/index_mobile_control';

/*$route['restaurant'] = 'restaurant/menu_admin_res_control';
$route['restaurant/menu'] = 'restaurant/menu_admin_res_control';*/
$route['restaurant'] = 'restaurant/login_admin_res_control';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */