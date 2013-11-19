<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/ui-1.10.3/jquery-ui.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/layout.css" >     
        <script src="<?php echo $url; ?>/includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery-ui.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.infinitecarousel2.js"></script>
        <script src="<?php echo $url; ?>/includes/js/layout.js"></script>
    </head>
    <body>
        <input type="hidden" id="hid_url" value="<?php echo $url; ?>">
        <div id="header">
            <div id="nav_bar">
                <div id="nav_phone">Điện thoại: 01644564404</div>
                <div id="nav_menu">
                    <ul>
                        <li><a href="#">Hướng dẫn</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="<?php echo $url; ?>index.php/nha_hang_dang_ky">Nhà hàng đăng ký</a></li>
                    </ul>
                </div>
                <div id="nav_login">
                    <img src="<?php echo $url; ?>/images/user.png">
                    <span><?php echo $user_name ?></span>
                </div>
            </div>
            <div id="header_content">
                <a href="<?php echo $url; ?>">
                    <img src="<?php echo $url; ?>/images/logo.png">
                </a>
                <img id="banner" src="<?php echo $url; ?>/images/banner.png">
                <img id="favorite" src="<?php echo $url; ?>/images/favorite.png">
            </div>
        </div>