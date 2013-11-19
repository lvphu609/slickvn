<html>
<?php $url = base_url(); ?>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/default.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/menu.css" rel="stylesheet" />  
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/form_signup_login.css" rel="stylesheet" /> 
    <link type="text/css" href="<?php echo $url; ?>/includes/css/common/footer_content.css" rel="stylesheet" />
    
    <script src="<?php echo $url; ?>includes/js/carousel/jquery-1.7.min.js" type="text/javascript" charset="utf-8"></script>

    <!--back to top-->
    <style type="text/css">
        #top {
            width: 50px; height: 50px;
            position: fixed; bottom: 10px; right: 10px;
            text-indent: -99999px;
            cursor: pointer;
            background: url(<?php echo $url;?>includes/images/icon/go_top.png) no-repeat 0 0;
        }

     </style>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#back_to_top').append('<div id="top">Back to Top</div>');
            $('#top').fadeOut();
           $(window).scroll(function() {
            if($(window).scrollTop() != 0) {
                $('#top').fadeIn();
            } else {
                $('#top').fadeOut();
            }
           });
           $('#top').click(function() {
            $('html, body').animate({scrollTop:0},500);
           });
        });
     </script>
    <!--end back to top-->
    
    
    <!--sub banner more, nimble_style-->
   <link type="text/css" href="<?php echo $url; ?>/includes/css/css_nimble_style_custom/style.css" rel="stylesheet" />
    <!--end sub banner more, nimble_style -->
    
    <!--menu select search-->
    <script src="<?php echo $url;?>includes/plugins/select_custom/js/jquery.sparkbox-select.js"></script>
    <script src="<?php echo $url;?>includes/plugins/select_custom/js/script.js"></script>
    <link rel="stylesheet" href="<?php echo $url;?>includes/plugins/select_custom/css/sparkbox-select.css">
    <script src="<?php echo $url;?>includes/plugins/select_custom/js/modernizr-1.7.min.js"></script>
    <!--end menu select search-->
    
    
</head>

<body>

<div id="container_main">