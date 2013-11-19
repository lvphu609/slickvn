<!DOCTYPE html>
<?php $url=  base_url();?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Slickvn APIs</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
    
<div id="container">
    
	<h1>Slickvn APIs</h1>
        
	<div id="body">
	
            <p>APIs Common</p>
            <code><a href="<?php echo $url?>index.php/common/common_apis/get_base_collection/format/json">Get common collection</a></code>
            <code><a href="<?php echo $url?>index.php/common/common_apis/update_base_collection/format/json">Update common collection</a></code>
            <code><a href="<?php echo $url?>index.php/common/common_apis/get_base_collection_by_id/format/json">Get common collection by id</a></code>
            <code><a href="<?php echo $url?>index.php/common/common_apis/check_exist_value/format/json">Check exist value in a collection</a></code>
            <code><a href="<?php echo $url?>index.php/common/common_apis/upload_image/format/json">Upload Image</a></code>
            
            <br/>
            
            <p>APIs Restaurant</p>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/search_restaurant_by_id_base_collection/format/json">Search Restaurant by id base collection (favourite, price_person, mode_use, payment_type, landscape, other_cretiari)</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/search_restaurant_by_name/format/json">Search Restaurant by name</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_detail_restaurant/format/json">Get Detail Restaurant</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_order_by_restaurant/format/json">Order by Restaurant by Creadted Date</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_newest_restaurant_list/format/json">Get newest Restaurant</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_orther_restaurant_list/format/json">Get orther Restaurant</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_all_restaurant_approval_show_carousel/format/json">get_all_restaurant_approval_show_carousel_get</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/update_restaurant/format/json">Update Restaurant</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_assessment_by_id_restaurant/format/json">Get Assessment by Id Restaurant</a></code>
            
            <br/>
            
            <p>APIs Coupon Restaurant</p>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_coupon_list/format/json">Danh sách nhà hàng quyến mãi</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/insert_coupon/format/json">Thêm nhà hàng quyến mãi</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/update_coupon/format/json">Sửa nhà hàng quyến mãi</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/delete_coupon/format/json">Xóa nhà hàng quyến mãi</a></code>
            
            <br/>
            
            <p>APIs Post</p>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/search_post/format/json">Search Post by title</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_post_list/format/json">Danh sách bài đăng</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/update_post/format/json">Thêm bài đăng</a></code>
            
            <p>APIs Subscribed Email</p>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_email_list/format/json">Danh sách Email</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/insert_email/format/json">Thêm Email</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/update_email/format/json">Sửa Email</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/delete_email/format/json">Xóa Email</a></code>
            
            <p>APIs Closed Member</p>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/get_closed_member_list/format/json">Danh sách thành viên tích cực</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/insert_closed_member/format/json">Thêm thành viên tích cực</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/update_closed_member/format/json">Sửa thành viên tích cực</a></code>
            <code><a href="<?php echo $url?>index.php/restaurant/restaurant_apis/delete_closed_member/format/json">Xóa thành viên tích cực</a></code>

	</div>
        
        <div id="body">
	
            <p>APIs User</p>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_all_user/format/json">Get All User</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_user_by_id/format/json">Get User by Id</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/update_user/format/json">Update User</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/check_valid_email/format/json">Check email</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/login/format/json">Login</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_all_role/format/json">Get All Role</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_role_by_id/format/json">Get All Role</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/update_role/format/json">Update Role</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/update_role/format/json">Update Role</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_all_function/format/json">Get All Function</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/get_function_by_id/format/json">Get Function by Id</a></code>
            <code><a href="<?php echo $url?>index.php/user/user_apis/update_function_by_id/format/json">Update Function</a></code>
            

	</div>
        
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        
</div>

</body>
</html>