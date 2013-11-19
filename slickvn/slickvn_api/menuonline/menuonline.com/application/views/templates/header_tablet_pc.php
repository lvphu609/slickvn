<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/bootstrap.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/bootstrap-responsive.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/layout_tablet_pc.css" > 
        <script src="<?php echo $url; ?>/includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.cookie.js"></script>
        <script src="<?php echo $url; ?>/includes/js/bootstrap.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jshashtable-2.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.numberformatter-1.2.3.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery-hammer.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.numeric.js"></script>
        <script src="<?php echo $url; ?>/includes/js/layout_tablet_pc.js"></script>
    </head>
    <body>
        <input type="hidden" id="hid_url" value="<?php echo $url; ?>">
        <input type="hidden" id="hid_res_id" value="<?php echo $res_id; ?>">
        <input type="hidden" id="hid_table_number" value="<?php echo $table_number; ?>">
        <div id="header">
            <div id="header_logo_area">
                <img src="<?php echo $url.'images/res_logo.png'; ?>">
                <span><?php echo $res_name; ?></span>
            </div>
            <div id="header_menu_area">
                <?php echo $btn_view_sort; ?>
                <a href="<?php echo $url.'index.php/tablet_pc/food_tablet_pc_control?table='.$table_number.'&type=food&kind=all&hot=all&search='; ?>">
                    <img src="<?php echo $url.'includes/img/menu_black.png'; ?>">
                </a>
                <a href="<?php echo $url.'index.php/tablet_pc/box_item_tablet_pc_control?table='.$table_number; ?>">
                    <img src="<?php echo $url.'includes/img/gio_hang_black.png'; ?>">
                </a>
                <img src="<?php echo $url.'includes/img/goi_mon_black.png'; ?>">
                <img src="<?php echo $url.'includes/img/chuc_nang_black.png'; ?>" id="btn_control">
                <div class="hidden_item total_item"></div>
            </div>           
        </div>
        <div id="left_column">            
            <?php echo $left_menu; ?>            
        </div>        
        <div id="right_column">
        