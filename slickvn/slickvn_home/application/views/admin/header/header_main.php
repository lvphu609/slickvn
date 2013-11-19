<?php $url=  base_url();?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/default.css">
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/taskbar_top.css">
    <link rel="stylesheet" href="<?php echo $url;?>includes/css/admin/menu_main.css">
    
    <?php 
    //<!--css main page-->
     if($chosed=="main_page"){       
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/main_page.css">';
     }    
    ?>
    
    
    <?php 
    //<!--css member page-->
     if($chosed=="member_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/member_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/create_new_member.css">';
     }
     
    ?>
    
    <?php 
    //<!--css user page-->
     if($chosed=="user_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/user_page.css">';
     }    
    ?>
    
    <?php 
    //<!--css restaurant page-->
     if($chosed=="restaurant_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/restaurant_page.css">';
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/create_new_restaurant.css">';
     }    
    ?>
    
    <?php 
    //<!--css coupon page-->
     if($chosed=="coupon_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/coupon_page.css">';
     }    
    ?>
    
    <?php 
    //<!--css post page-->
     if($chosed=="post_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/post_page.css">';
     }    
    ?>
    
    <?php 
    //<!--css custom page-->
     if($chosed=="custom_page"){
       echo'<link rel="stylesheet" href="'.$url.'includes/css/admin/custom_page.css">';
     }    
    ?>
    
    
    <script src="<?php echo $url; ?>includes/js/admin/jquery-1.7.min.js" type="text/javascript" charset="utf-8"></script>
  </head>

<body>
<div id="container_main">
  
