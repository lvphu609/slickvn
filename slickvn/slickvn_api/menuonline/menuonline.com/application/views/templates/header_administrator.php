<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/ui-1.10.3/jquery-ui.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/layout_administrator.css" >     
        <script src="<?php echo $url; ?>/includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery-ui.js"></script>
        <script src="<?php echo $url; ?>/includes/js/layout_administrator.js"></script>
    </head>
    <body>
        <input type="hidden" value="<?php echo $url; ?>" id="hid_url">
        <div id="header">
            <div id="nav_bar">
                <div id="nav_title">Administrator MenuOnline</div>
                
                <div id="nav_login">
                    <img src="<?php echo $url; ?>/images/user.png">
                    <span><a href="<?php echo $url; ?>" target="new">View Site</a> | <a href="#">Logout</a></span>
                </div>
            </div>
            <div id="header_content">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr valign="midle">
                        <td align="center">
                            <a id="btn_banner" href="<?php echo $url; ?>index.php/administrator/banner">Đặt banner</a>
                        </td>
                        <td align="center">
                            <a id="btn_top_food" href="<?php echo $url; ?>index.php/administrator/top_food">Đặt Top món ăn</a>
                        </td>
                        <td align="center">
                            <a id="btn_restaurant" href="<?php echo $url; ?>index.php/administrator/restaurant">Nhà hàng</a>
                        </td>
                        <td align="center">
                            <a id="btn_report" href="<?php echo $url; ?>index.php/administrator/report">Report</a>
                        </td>
                    </tr>
                    <tr valign="midle">
                        <td align="center">
                            <a id="btn_slide_show" href="<?php echo $url; ?>index.php/administrator/slide_show">Đặt slide show</a>
                        </td>
                        <td align="center">
                            <a id="btn_top_restaurant" href="<?php echo $url; ?>index.php/administrator/top_restaurant">Đặt Top nhà hàng</a>
                        </td>
                        <td align="center">
                            <a id="btn_user" href="<?php echo $url; ?>index.php/administrator/user">Người dùng</a>
                        </td>
                        <td align="center">
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="content">
            <p id="content_title" class="content_title">
                <?php echo $content_title; ?>
            </p>