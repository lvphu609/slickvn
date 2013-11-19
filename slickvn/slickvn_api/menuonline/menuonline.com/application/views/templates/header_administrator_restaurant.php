<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>includes/css/ui-1.10.3/jquery-ui.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>includes/css/bootstrap.css" > 
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>includes/css/layout_administrator_restaurant_default.css" > 
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>includes/css/<?php echo $layout; ?>.css" >        
        <script src="<?php echo $url; ?>includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>includes/js/jquery-ui.js"></script>
        <script src="<?php echo $url; ?>includes/js/bootstrap.js"></script>
        <script src="<?php echo $url; ?>includes/js/jshashtable-2.1.js"></script>
        <script src="<?php echo $url; ?>includes/js/jquery.numberformatter-1.2.3.js"></script>
        <script src="<?php echo $url; ?>includes/js/ajaxfileupload.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.numeric.js"></script>
        <script src="<?php echo $url; ?>includes/js/<?php echo $control; ?>.js"></script>
    </head>
    <body>
        <input type="hidden" value="<?php echo $url; ?>" id="hid_url">
        <input type="hidden" value="<?php echo $id; ?>" id="hid_res_id">
        <div id="nav_bar">
            <div id="nav_title">Administrator Restaurant</div>

            <div id="nav_login">
                <img src="<?php echo $url; ?>/images/user.png">
                <span><?php echo $login; ?></span>
            </div>
        </div>
        <div id="header_content">
            <a href="#" class="menu_item">
                <img src="<?php echo $url.'includes/img/menu1.png' ?>">
                <div>Menu</div>
            </a>   
            <a href="#" class="menu_item menu_active">
                <img src="<?php echo $url.'includes/img/table.png' ?>">
                <div>Table</div>
            </a>
            <a href="#" class="menu_item">
                <img src="<?php echo $url.'includes/img/employee.png' ?>">
                <div>Employee</div>
            </a>
            <a href="#" class="menu_item">
                <img src="<?php echo $url.'includes/img/about1.png' ?>">
                <div>About</div>
            </a>
        </div>
        <div id="content">