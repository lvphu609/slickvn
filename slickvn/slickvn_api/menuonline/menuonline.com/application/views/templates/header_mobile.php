<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/bootstrap.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/bootstrap-responsive.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/layout_mobile.css" > 
        <script src="<?php echo $url; ?>/includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.cookie.js"></script>
        <script src="<?php echo $url; ?>/includes/js/bootstrap.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jshashtable-2.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.numberformatter-1.2.3.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery-hammer.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery.numeric.js"></script>
        <script src="<?php echo $url; ?>/includes/js/layout_mobile.js"></script>
    </head>
    <body>
        <input type="hidden" id="hid_url" value="<?php echo $url; ?>">
        <input type="hidden" id="hid_res_id" value="<?php echo $res_id; ?>">
        <input type="hidden" id="hid_table_number" value="<?php echo $table_number; ?>">

        <div id="header">
            <a href="<?php echo $url.'index.php/mobile/index_mobile_control?res_id='.$res_id.'&table='.$table_number.'&type=all&kind=all&hot=2'; ?>">
                <button class="btn btn-warning btn_menu" id="btn_head_control"><span class="icon icon-home"></span></button>
            </a>
            <div>Nhà hàng <?php echo $res_name; ?></div>
            <div>_<?php echo $title; ?>_</div>
        </div>
        <div id="content">